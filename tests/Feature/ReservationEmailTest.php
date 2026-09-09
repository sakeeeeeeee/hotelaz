<?php

namespace Tests\Feature;

use App\Mail\ReservationCreated;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ReservationEmailTest extends TestCase
{
    use RefreshDatabase;

    public function test_reservation_created_email_is_sent_on_store(): void
    {
        Mail::fake();
        $user = User::factory()->create();
        $room = Room::factory()->create();

        $response = $this->actingAs($user)->post(route('reservations.store'), [
            'room_id' => $room->id,
            'check_in_date' => now()->modify('+10 days')->toDateString(),
            'check_out_date' => now()->modify('+12 days')->toDateString(),
            'total_guests' => 2,
            'total_price' => 200,
            'payment_proof' => UploadedFile::fake()->image('payment.jpg'),
        ]);

        $response->assertRedirect();
        Mail::assertSent(ReservationCreated::class, 1);
        Mail::assertSent(ReservationCreated::class, function (ReservationCreated $mail) use ($user) {
            return $mail->hasTo($user->email);
        });
    }
}
