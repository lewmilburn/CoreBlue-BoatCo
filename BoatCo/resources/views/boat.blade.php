<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $boat->name }} - BoatCo</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        @include ('layout.navigation')

        <main class="main">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div>
                    <h1 class="infopage-header">
                        {{ $boat->name }}
                    </h1>
                    <p>
                        Manufactured by {{ $brands[($boat->brand_id - 1)]->name }}
                    </p>
                    <p class="mt-8 text-xl">
                        £{{ $boat->price }}
                    </p>
                </div>
                <div class="col-span-2">
                    <img src="{{ $boat->image }}" alt="{{ $boat->name }}" width="100%">
                </div>
            </div>
        </main>
    </body>
</html>
