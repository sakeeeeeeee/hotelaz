<h2>Hi {{ $reservation->user->name }},</h2>
<p>Your reservation at <b>HotelAz</b> has been <b>confirmed</b>!</p>
<p>Here are your reservation details:</p>
<ul>
    <li><b>Booking Reference (Resi):</b> {{ $reservation->resi }}</li>
    <li><b>Room:</b> {{ $reservation->room->name }}</li>
    <li><b>Check In:</b> {{ $reservation->check_in_date->format('d M Y') }}</li>
    <li><b>Check Out:</b> {{ $reservation->check_out_date->format('d M Y') }}</li>
    <li><b>Guests:</b> {{ $reservation->total_guests }}</li>
    <li><b>Total Price:</b> {{ number_format($reservation->total_price, 0) }}</li>
    <li><b>Status:</b> {{ ucfirst(str_replace('_', ' ', $reservation->status)) }}</li>
</ul>
<p>We look forward to welcoming you. If you have any questions, please contact us.</p>
<p>Thank you,<br>HotelAz Team</p> 