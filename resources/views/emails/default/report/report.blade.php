@extends('emails.default.base')

@section('content')
    <div>{{ $displayName }} have reported <strong>{{ $itemName }}</strong></div>
    @if($emailMessage)
        <br>
        {{ $emailMessage }}
        <br>
    @endif
    <br>
    <div><a href="{{ $link }}" target="_blank">Click here to view</a>.</div>
@endsection