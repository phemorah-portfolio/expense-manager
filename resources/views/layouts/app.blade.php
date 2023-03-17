<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Expense Manager</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/toastr.min.css')}}">


        @vite('resources/css/app.css')

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

        @livewireStyles

        @livewireScripts

        <wireui:scripts />

        <!-- Alpine v3 -->
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <!-- Focus plugin -->
        <script defer src="https://unpkg.com/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>

        <script src="//unpkg.com/alpinejs" defer></script>

    </head>

    <body class="flex flex-wrap justify-center_">
        <div class="flex w-full justify-between px-4 bg-purple-900 text-white">
            <a class="mx-2 py-4 text-white no-underline" href="/">Home</a>
            @auth
        <livewire:logout />
        @endauth
        @guest
            <div class="py-2">
                <a class="mx-1 text-white no-underline" href="/login">Login</a>
                <a class="mx-1 text-white no-underline" href="/register">register</a>
            </div>
            @endguest
        </div>

        <div class="my-10 w-full _flex justify-center_">
    {{ $slot }}
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script type="module">
    import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
</script>

<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbo-eval="false"></script>

        <script>
            window.addEventListener('close-modal', event => {
                $('#expenseModal').modal('hide');
                $('#importModal').modal('hide');
            })
        </script>

    </body>
</html>
