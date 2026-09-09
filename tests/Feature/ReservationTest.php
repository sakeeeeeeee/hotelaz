<?php

namespace Tests\Feature;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    use RefreshDatabase;

    private function validPayload(Room $room, User $user, string $checkIn = '+10 days', string $checkOut = '+12 days'): array
    {
        return [
            'room_id' => $room->id,
            'check_in_date' => now()->modify($checkIn)->toDateString(),
            'check_out_date' => now()->modify($checkOut)->toDateString(),
            'total_guests' => 2,
            'total_price' => $room->price_per_night * 2,
            'special_requests' => 'Late check-in please',
            'payment_proof' => UploadedFile::fake()->image('payment.jpg'),
        ];
    }

    public function test_guest_cannot_store_reservation(): void
    {
        $room = Room::factory()->create();

        $response = $this->post(route('reservations.store'), [
            'room_id' => $room->id,
            'check_in_date' => now()->modify('+10 days')->toDateString(),
            'check_out_date' => now()->modify('+12 days')->toDateString(),
            'total_guests' => 2,
            'total_price' => 100,
        ]);

        $response->assertRedirect(route('login'));
        $this->assertDatabaseCount('reservations', 0);
    }

    public function test_authenticated_user_can_store_reservation_with_payment_proof(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();
        $room = Room::factory()->create();

        $response = $this->actingAs($user)->post(route('reservations.store'), $this->validPayload($room, $user));

        $response->assertRedirect();
        $this->assertDatabaseHas('reservations', [
            'user_id' => $user->id,
            'room_id' => $room->id,
            'status' => 'pending',
            'payment_status' => 'waiting_confirmation',
        ]);
        $reservation = Reservation::first();
        $this->assertNotNull($reservation->payment_proof);
        Storage::disk('public')->assertExists($reservation->payment_proof);
    }

    public function test_reservation_is_rejected_when_room_is_fully_booked_for_the_range(): void
    {
        $user = User::factory()->create();
        // quantity 1: a single overlapping booking fills the room
        $room = Room::factory()->create(['quantity' => 1]);

        $checkIn = now()->modify('+10 days')->toDateString();
        $checkOut = now()->modify('+12 days')->toDateString();

        // Existing confirmed booking overlapping the range
        Reservation::factory()->for($room)->for($user)->create([
            'check_in_date' => now()->modify('+9 days'),
            'check_out_date' => now()->modify('+11 days'),
            'status' => 'confirmed',
        ]);

        $payload = [
            'room_id' => $room->id,
            'check_in_date' => $checkIn,
            'check_out_date' => $checkOut,
            'total_guests' => 2,
            'total_price' => 100,
            'payment_proof' => UploadedFile::fake()->image('payment.jpg'),
        ];

        $response = $this->actingAs($user)->post(route('reservations.store'), $payload);

        $response->assertSessionHas('error');
        $this->assertDatabaseCount('reservations', 1); // only the pre-existing one
    }

    public function test_cancelled_bookings_do_not_block_availability(): void
    {
        $user = User::factory()->create();
        $room = Room::factory()->create(['quantity' => 1]);

        Reservation::factory()->for($room)->for($user)->create([
            'check_in_date' => now()->modify('+9 days'),
            'check_out_date' => now()->modify('+11 days'),
            'status' => 'cancelled',
        ]);

        $payload = [
            'room_id' => $room->id,
            'check_in_date' => now()->modify('+10 days')->toDateString(),
            'check_out_date' => now()->modify('+12 days')->toDateString(),
            'total_guests' => 2,
            'total_price' => 100,
            'payment_proof' => UploadedFile::fake()->image('payment.jpg'),
        ];

        $response = $this->actingAs($user)->post(route('reservations.store'), $payload);

        $response->assertRedirect();
        $this->assertDatabaseCount('reservations', 2);
    }

    public function test_store_validates_payment_proof_file_type(): void
    {
        $user = User::factory()->create();
        $room = Room::factory()->create();

        $payload = $this->validPayload($room, $user);
        $payload['payment_proof'] = UploadedFile::fake()->create('document.txt', 10);

        $response = $this->actingAs($user)->post(route('reservations.store'), $payload);

        $response->assertSessionHasErrors(['payment_proof']);
        $this->assertDatabaseCount('reservations', 0);
    }

    public function test_user_can_view_own_reservation(): void
    {
        $user = User::factory()->create();
        $room = Room::factory()->create();
        $reservation = Reservation::factory()->for($room)->for($user)->create();

        $response = $this->actingAs($user)->get(route('reservations.show', $reservation));

        $response->assertOk()->assertSee($room->name);
    }

    public function test_user_cannot_view_others_reservation(): void
    {
        $user = User::factory()->create();
        $other = User::factory()->create();
        $room = Room::factory()->create();
        $reservation = Reservation::factory()->for($room)->for($other)->create();

        $response = $this->actingAs($user)->get(route('reservations.show', $reservation));

        $this->assertNotSame($user->id, $reservation->user_id);
        $response->assertForbidden();
    }

    public function test_user_can_cancel_own_pending_reservation(): void
    {
        $user = User::factory()->create();
        $room = Room::factory()->create();
        $reservation = Reservation::factory()->for($room)->for($user)->create(['status' => 'pending']);

        $response = $this->actingAs($user)->patch(route('reservations.cancel', $reservation));

        $response->assertRedirect(route('reservations.index'));
        $this->assertDatabaseHas('reservations', ['id' => $reservation->id, 'status' => 'cancelled']);
    }
}
