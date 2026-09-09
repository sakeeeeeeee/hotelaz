<?php

namespace Tests\Feature;

use App\Mail\ReservationConfirmed;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_from_admin_dashboard(): void
    {
        $this->get(route('admin.dashboard'))->assertRedirect(route('login'));
    }

    public function test_regular_user_cannot_access_admin_dashboard(): void
    {
        $user = User::factory()->create(['is_admin' => false]);

        $this->actingAs($user)->get(route('admin.dashboard'))
            ->assertRedirect('/')
            ->assertSessionHas('error');
    }

    public function test_admin_can_access_dashboard_with_statistics(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $room = Room::factory()->create();
        Reservation::factory()->for($room)->for($admin)->create([
            'payment_status' => 'paid',
            'total_price' => 350,
        ]);

        $response = $this->actingAs($admin)->get(route('admin.dashboard'));

        $response->assertOk()->assertSee('Dashboard');
        $this->assertSame(1, Reservation::where('payment_status', 'paid')->count());
    }

    public function test_admin_can_create_room(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $payload = [
            'name' => 'Suite of the Seas',
            'type' => 'suite',
            'description' => 'A luxurious suite with ocean view.',
            'price_per_night' => 250.00,
            'capacity' => 3,
            'features' => ['wifi', 'ac', 'tv'],
            'status' => 'available',
            'quantity' => 4,
        ];

        $response = $this->actingAs($admin)->post(route('admin.rooms.store'), $payload);

        $response->assertRedirect();
        $this->assertDatabaseHas('rooms', ['name' => 'Suite of the Seas', 'quantity' => 4]);
    }

    public function test_admin_can_confirm_reservation_which_generates_resi_and_sends_email(): void
    {
        Mail::fake();
        $admin = User::factory()->create(['is_admin' => true]);
        $user = User::factory()->create();
        $room = Room::factory()->create();
        $reservation = Reservation::factory()->for($room)->for($user)->create(['status' => 'pending']);

        $response = $this->actingAs($admin)->patch(
            route('admin.reservations.update', $reservation),
            ['action' => 'update_status', 'status' => 'confirmed']
        );

        $response->assertRedirect();
        $reservation->refresh();
        $this->assertSame('confirmed', $reservation->status);
        $this->assertNotNull($reservation->resi);
        $this->assertStringStartsWith('HZ-', $reservation->resi);
        Mail::assertSent(ReservationConfirmed::class, 1);
    }
}
