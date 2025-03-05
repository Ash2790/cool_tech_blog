<!-- resources/views/about.blade.php -->

@extends('layouts.app') <!-- Extend the layout that includes the footer -->

@section('title', 'About') <!-- Set the title of the page -->

@section('content') <!-- Content for the About page -->

    <h1>About Us!</h1>
    <a href="{{ url('/') }}">Home</a>
    <p>Today is {{ date('j F Y') }}.</p>

@endsection <!-- End of content section -->
