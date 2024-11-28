@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Consultation with {{ $appointment->patient->name }}</h2>
    
    <p>Scheduled at: {{ $appointment->scheduled_at }}</p>
    
    <div class="video-call">
        <!-- You can integrate a video conferencing tool like Zoom, WebRTC, or Twilio here -->
        <button class="btn btn-primary">Start Video Consultation</button>
    </div>

    <div class="chat">
        <h4>Chat with Patient</h4>
        <form method="POST" action="{{ route('doctor.sendMessage', $appointment->id) }}">
            @csrf
            <textarea name="message" rows="4" required></textarea>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>

        <!-- Display messages from doctor and patient -->
        <div class="messages">
            @foreach($appointment->messages as $message)
                <div class="{{ $message->user_type == 'doctor' ? 'doctor-message' : 'patient-message' }}">
                    <p>{{ $message->content }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
