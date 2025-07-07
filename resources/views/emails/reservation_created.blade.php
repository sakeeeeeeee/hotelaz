<h2>Hi {{ $reservation->user->name }},</h2>
<p>Thank you for booking at <b>HotelAz</b>!</p>
<p>Your reservation is being processed. Here are your reservation details:</p>
<ul>
    <li><b>Room:</b> {{ $reservation->room->name }}</li>
    <li><b>Check In:</b> {{ $reservation->check_in_date->format('d M Y') }}</li>
    <li><b>Check Out:</b> {{ $reservation->check_out_date->format('d M Y') }}</li>
    <li><b>Guests:</b> {{ $reservation->total_guests }}</li>
    <li><b>Total Price:</b> {{ number_format($reservation->total_price, 0) }}</li>
    <li><b>Status:</b> {{ ucfirst(str_replace('_', ' ', $reservation->status)) }}</li>
</ul>
<p>We will notify you once your reservation is confirmed by our admin.</p>
<p>Thank you,<br>HotelAz Team</p> 