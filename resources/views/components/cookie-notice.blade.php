{{-- resources/views/components/cookie-notice.blade.php --}}
@if (!session('cookie_notice_accepted'))
    <div id="cookie-notice" style="position: fixed; bottom: 0; width: 100%; background-color: #000; color: white; text-align: center; padding: 10px;">
        <p>
            This website uses cookies to ensure you get the best experience on our website. 
            <a href="{{ url('legal/privacy') }}" style="color: #ffd700;">Learn more</a>.
        </p>
        <button onclick="acceptCookies()" style="background-color: #ffd700; color: #000; padding: 5px 10px; border: none; cursor: pointer;">
            Accept
        </button>
    </div>

    <script>
        function acceptCookies() {
            document.getElementById('cookie-notice').style.display = 'none';
            document.cookie = "cookie_notice_accepted=true; max-age=31536000; path=/"; // 1 year cookie duration
        }
    </script>
@endif
