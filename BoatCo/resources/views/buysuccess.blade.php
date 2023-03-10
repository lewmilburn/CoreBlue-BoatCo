<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Payment Cancelled - Boat Co</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="dark:bg-neutral-800 dark:text-white">
        @include ('layout.navigation')

        <main class="main w-full">
            <h1 class="mt-4 infopage-header payment-result">
                Payment Successful.
            </h1>
            <p class="mt-8 payment-result">
                <i class="fa-regular fa-circle-check text-5xl text-green-500"></i>
            </p>
            <p class="mt-8 payment-result">
                Please check your emails for confirmation from Stripe.
            </p>
            <p class="mt-8 payment-result">
                <a href="/" class="btn-blue">Return to homepage</a>
            </p>
        </main>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html>
