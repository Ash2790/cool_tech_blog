{{-- resources/views/components/footer.blade.php --}}
<footer style="background: linear-gradient(135deg, #333, #555); color: white; padding: 30px; text-align: center; font-family: 'Arial', sans-serif;">
    <div style="margin-bottom: 20px;">
        <a href="{{ route('search.page') }}" style="color: white; margin-right: 15px; font-size: 18px; text-decoration: none; transition: color 0.3s ease;">Search</a>
        <a href="{{ url('legal/tos') }}" style="color: white; margin-right: 15px; font-size: 18px; text-decoration: none; transition: color 0.3s ease;">Terms of Service</a>
        <a href="{{ url('legal/privacy') }}" style="color: white; font-size: 18px; text-decoration: none; transition: color 0.3s ease;">Privacy Policy</a>
    </div>

    <p style="font-size: 16px; margin-top: 10px; color: #b0bec5;">
        &copy; {{ date('Y') }} Cool-Tech. All rights reserved.
    </p>

    <div style="margin-top: 20px; font-size: 14px; color: #90a4ae;">
        <p>Follow us:</p>
        <a href="#" style="color: white; margin-right: 10px; font-size: 20px; text-decoration: none; transition: color 0.3s ease;">Facebook</a>
        <a href="#" style="color: white; margin-right: 10px; font-size: 20px; text-decoration: none; transition: color 0.3s ease;">Twitter</a>
        <a href="#" style="color: white; font-size: 20px; text-decoration: none; transition: color 0.3s ease;">Instagram</a>
    </div>
</footer>
