<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PhoneMed - Loading...</title>
        <meta http-equiv="refresh" content="0;url={{ route('home') }}">
    </head>
    <body>
        <div class="flex items-center justify-center min-h-screen bg-gray-50">
            <div class="text-center">
                <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-primary mx-auto"></div>
                <p class="mt-4 text-gray-600">Redirecting to PhoneMed Store...</p>
            </div>
        </div>
    </body>
</html>