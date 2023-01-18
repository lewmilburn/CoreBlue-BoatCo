<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BoatCo</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        @include ('layout.navigation');

        <main class="main">
            <div class="product-grid">
                <?php foreach($boats as $boat) { ?>
                <a href="/boat/{{ $boat->id }}" class="product-item">
                    <img class="w-full mb-4" src="{{ $boat->image }}" alt="{{ $boat->name }}">
                    <div class="flex space-x-2">
                        <h2 class="item-header flex-grow">{{ $boat->name }}</h2>
                        <p>{{ $brands[($boat->brand_id - 1)]->name }}</p>
                    </div>
                    <p class="item-price">£{{ $boat->price }}</p>
                </a>
                <?php } ?>
            </div>
        </main>
    </body>
</html>
