@extends('layouts.welcome')
@section('content')
        @include('front.artist._segments.top_rated_artist', ['artist' => $artist])
@endsection