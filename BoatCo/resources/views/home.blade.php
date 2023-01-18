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
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
                <div>
                    <h2 class="infopage-subheader mt-8">
                        Filter
                    </h2>
                    <div class="grid grid-cols-3 gap-2" id="btnContainer">
                        <p class="item-price mt-4">Price:</p>
                        <div class="col-span-2">
                            <button class="btn btn-blue w-full mt-4" onclick="filterSelection('price-vhigh')">£100,000+</button>
                            <button class="btn btn-blue w-full mt-4" onclick="filterSelection('price-high')">£50,000 - £99,999</button>
                            <button class="btn btn-blue w-full mt-4" onclick="filterSelection('price-med')">£25,000 - £49,999</button>
                            <button class="btn btn-blue w-full mt-4" onclick="filterSelection('price-low')">£10,000 - £24,999</button>
                            <button class="btn btn-blue w-full mt-4" onclick="filterSelection('price-vlow')">£0 - £9,999</button>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-2" id="btnContainer">
                        <p class="item-price mt-4">Age:</p>
                        <div class="col-span-2">
                            <button class="btn btn-blue w-full mt-4" onclick="filterSelection('year-vnew')">2020 - 2023</button>
                            <button class="btn btn-blue w-full mt-4" onclick="filterSelection('year-new')">2015 - 2019</button>
                            <button class="btn btn-blue w-full mt-4" onclick="filterSelection('year-med')">2010 - 2014</button>
                            <button class="btn btn-blue w-full mt-4" onclick="filterSelection('year-old')">2005 - 2009</button>
                            <button class="btn btn-blue w-full mt-4" onclick="filterSelection('year-vold')">2000 - 2004</button>
                        </div>
                    </div>
                    <button class="btn btn-blue w-full mt-4" onclick="filterSelection('all')">Clear Filters</button>
                </div>

                <div class="lg:col-span-3">
                    <div class="product-grid mb-8" id="boat-cards">
                    </div>

                    <button onclick="get()" class="hidden btn-blue" id="moreBoats">
                        Load more
                    </button>
                </div>
            </div>
        </main>

        <script src="{{ asset('js/homepage.js') }}"></script>
        <script src="{{ asset('js/sort.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html>
