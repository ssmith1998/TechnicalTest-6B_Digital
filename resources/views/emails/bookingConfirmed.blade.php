@component('mail::message')
# Booking Confirmation

Hello {{$booking->name}} your booking has been confirmed for {{$booking->booking_date->format('d-m-Y')}}

Thanks,<br>
DJ Valeting
@endcomponent
