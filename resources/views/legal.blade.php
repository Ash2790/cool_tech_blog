<!-- resources/views/legal.blade.php -->

@extends('layouts.app') <!-- Extend the layout with the footer -->

@section('title', 'Legal - ' . ucfirst($subsection)) <!-- Set the title -->

@section('content')
    <h1>{{ ucfirst($subsection) }}</h1>

    @if ($subsection === 'tos')
        <h2>Terms of Service</h2>
        <p>Welcome to our website! These terms and conditions outline the rules and regulations for the use of our website.</p>
        <p>By accessing this website, we assume you accept these terms and conditions. Do not continue to use the website if you do not agree to all of the terms and conditions.</p>
        <p><strong>License to Use:</strong> Unless otherwise stated, we own the intellectual property rights for all material on the website. All rights are reserved. You may view and print pages from the website for personal use only, subject to the restrictions set in these terms and conditions.</p>
        <p><strong>Prohibited Uses:</strong> You must not use this website in any way that causes damage to the website or impairs its availability or accessibility. You must not use this website for fraudulent or unlawful activities.</p>
    @elseif ($subsection === 'privacy')
        <h2>Privacy Policy</h2>
        <p>We are committed to protecting your privacy. This privacy policy outlines how we collect, use, and protect your personal information.</p>
        <p><strong>Information Collection:</strong> We collect personal information when you visit our website or interact with our content. This may include your name, email address, and browsing information.</p>
        <p><strong>Use of Information:</strong> We use the information we collect to provide and improve our services, communicate with you, and comply with legal obligations.</p>
        <p><strong>Security:</strong> We take reasonable steps to protect your personal information, but no method of transmission over the internet is 100% secure.</p>
        <p><strong>Cookies:</strong> We use cookies to enhance your experience. By using our website, you consent to the use of cookies.</p>
    @else
        <p>Page not found.</p>
    @endif
@endsection
