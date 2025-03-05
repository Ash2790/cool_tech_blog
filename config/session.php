<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Session Driver
    |--------------------------------------------------------------------------
    |
    | This option controls the default session "driver" that will be used on
    | requests. By default, we will use the file driver, but you can specify
    | any of the other drivers available here.
    |
    | Supported: "file", "cookie", "database", "apc",
    |            "memcached", "redis", "dynamodb", "array"
    |
    */

    'driver' => env('SESSION_DRIVER', 'database'), // Set to 'database' for database-driven sessions

    /*
    |--------------------------------------------------------------------------
    | Session Lifetime
    |--------------------------------------------------------------------------
    |
    | Specify the number of minutes that you wish the session to remain idle
    | before it expires. If you want sessions to expire on browser close, set
    | 'expire_on_close' to true.
    |
    */

    'lifetime' => env('SESSION_LIFETIME', 120), // Duration in minutes (you can change the default)

    'expire_on_close' => false, // Set to true if you want the session to expire on browser close

    /*
    |--------------------------------------------------------------------------
    | Session Encryption
    |--------------------------------------------------------------------------
    |
    | You can encrypt your session data before storing it in the storage. By
    | default, this is turned off but you can enable it here.
    |
    */

    'encrypt' => false, // Set to true if you want to encrypt the session data

    /*
    |--------------------------------------------------------------------------
    | Session File Location
    |--------------------------------------------------------------------------
    |
    | When using the native file session driver, we need a location where
    | session files are stored. This is the default location but you can
    | specify a different path.
    |
    */

    'files' => storage_path('framework/sessions'), // This is for file sessions, no change needed here

    /*
    |--------------------------------------------------------------------------
    | Session Database Connection
    |--------------------------------------------------------------------------
    |
    | When using the database session driver, you may specify which database
    | connection to use for storing sessions. Leave blank for the default
    | connection.
    |
    */

    'connection' => env('SESSION_CONNECTION', null), // Ensure the correct connection is selected

    /*
    |--------------------------------------------------------------------------
    | Session Database Table
    |--------------------------------------------------------------------------
    |
    | The table used by the database session driver. By default, it uses 'sessions'
    | but you can change this to your own table name if required.
    |
    */

    'table' => 'sessions', // Default 'sessions' table name for database driver

    /*
    |--------------------------------------------------------------------------
    | Session Cache Store
    |--------------------------------------------------------------------------
    |
    | For cache-based session drivers like Redis, Memcached, etc., specify
    | the cache store to use. Leave empty for the default cache store.
    |
    */

    'store' => env('SESSION_STORE', null), // For cache-based sessions, specify a store

    /*
    |--------------------------------------------------------------------------
    | Session Sweeping Lottery
    |--------------------------------------------------------------------------
    |
    | Some session drivers must sweep their storage locations to clean up old
    | sessions. This option defines the odds of it happening on a given request.
    |
    | The default is 2 out of 100, meaning sessions will be swept 2% of the time.
    |
    */

    'lottery' => [2, 100], // This is generally fine; adjust if needed

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Name
    |--------------------------------------------------------------------------
    |
    | The name of the cookie used to identify a session instance by its ID.
    | This is the default name, but you can change it here.
    |
    */

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
    ), // Default cookie name for the session

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Path
    |--------------------------------------------------------------------------
    |
    | The path for which the session cookie will be valid.
    |
    */

    'path' => '/', // Default path for session cookie

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Domain
    |--------------------------------------------------------------------------
    |
    | The domain the session cookie is available to.
    |
    */

    'domain' => env('SESSION_DOMAIN', null), // Set the domain if required

    /*
    |--------------------------------------------------------------------------
    | Secure Cookies
    |--------------------------------------------------------------------------
    |
    | If true, the session cookie will only be sent over HTTPS.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE', false), // Set to true if using HTTPS

    /*
    |--------------------------------------------------------------------------
    | HTTP Only Cookies
    |--------------------------------------------------------------------------
    |
    | If true, JavaScript will not be able to access the session cookie.
    |
    */

    'http_only' => true, // Set to true for added security

    /*
    |--------------------------------------------------------------------------
    | Same-Site Cookies
    |--------------------------------------------------------------------------
    |
    | Defines how cookies behave on cross-site requests. This helps mitigate CSRF attacks.
    |
    | Supported: "lax", "strict", "none", null
    |
    */

    'same_site' => 'lax', // You can change this based on your application needs

    /*
    |--------------------------------------------------------------------------
    | Partitioned Cookies
    |--------------------------------------------------------------------------
    |
    | If true, the cookie will be tied to the top-level site in a cross-site context.
    | This is supported by browsers when "secure" and "SameSite" attributes are set.
    |
    */

    'partitioned' => false, // Typically, this is false unless needed for specific use cases

];
