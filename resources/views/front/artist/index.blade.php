@extends('layouts.welcome')
@section('content')
        @include('front.artist._segments.artist_detail', ['artist' => $artist])
@endsection