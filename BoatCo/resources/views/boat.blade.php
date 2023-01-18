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
                    <p class="mb-8">
                        Manufactured by {{ $brands[($boat->brand_id - 1)]->name }} in {{ $boat->year_manufactured }}
                    </p>
                    <p class="mb-8 text-xl">
                        £{{ $boat->price }}
                    </p>
                    <p class="mb-8 text-xl">
                        <i class="fa-solid fa-location-dot" aria-hidden="true"></i> {{ $boat->location }}
                    </p>
                    <p class="mb-8 text-xl">
                        <strong>About this boat</strong><br>
                        {{ $boat->description }}
                    </p>
                    <a href="/buy/{{$boat->id}}">
                        <div class="btn-blue">
                            Purchase
                        </div>
                    </a>
                </div>
                <div class="col-span-2">
                    <img src="{{ $boat->image }}" alt="{{ $boat->name }}" width="100%">
                </div>
            </div>
            <div>
                <h2 class="infopage-subheader mt-8">
                    Technical Specifications
                </h2>
                <table class="mt-4">
                    <tr>
                        <td class="th">Model</td>
                        <td class="td">{{ $details->model }}</td>
                    </tr>
                    <tr>
                        <td class="th">Class</td>
                        <td class="td">{{ $details->class }}</td>
                    </tr>
                    <tr>
                        <td class="th">Fuel Type</td>
                        <td class="td">{{ $details->fuel }}</td>
                    </tr>
                </table>

                <h2 class="infopage-subheader mt-8">
                    Similar Boats
                </h2>
            </div>
        </main>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html>
