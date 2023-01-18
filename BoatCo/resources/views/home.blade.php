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
                    <p>Manufactured in {{ $boat->year_manufactured }}</p>
                    <p>
                        <i class="fa-solid fa-location-dot" aria-hidden="true"></i> {{ $boat->location }}
                    </p>
                </a>
                <?php } ?>
            </div>
        </main>

        <script>
            let Boats = [

            ]

            fetch('/api/boats/', {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(response => console.log(JSON.stringify(response))
            )
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html>
