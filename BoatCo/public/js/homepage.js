let current = 0;
let boats = [];
let newBoats = [];
let brands = [];

// Load everything!
get();

/*
Loads the boats and brands from the API.
 */
function get()
{
    brands = [];
    newBoats = [];

    fetch('/api/brands/', {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    })
        .then(response =>
            response.json().then(data => ({
                    data: data,
                    status: response.status
                })
            ).then(res => {
                console.log('REQUESTED: '+'/api/brands');
                if (res.status !== 200) {
                    dataError(res.status);
                } else {
                    brands = res.data;
                    console.log('Data loaded!');
                    if (brands.length !== 0 && newBoats.length !== 0) {
                        dataLoaded();
                    }
                }
            }));

    fetch('/api/boats/?start='+current+'&end='+(current+16), {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    })
        .then(response =>
            response.json().then(data => ({
                    data: data,
                    status: response.status
                })
            ).then(res => {
                console.log('REQUESTED: '+'/api/boats/?start='+current+'&end='+(current+16));
                if (res.status !== 200 || res.data.status == 400) {
                    dataError(res.data.status);
                } else {
                    newBoats = res.data;
                    console.log('Data loaded!');
                    if (brands.length !== 0 && newBoats.length !== 0) {
                        current += newBoats.length;
                        dataLoaded();
                    }
                }
            }));
}

/*
Called when the data has been loaded.
 */
function dataLoaded() {
    console.log('Adding '+(current+1)+' boats...');

    for (let i = 0; i < current; i++) {
        addCard(newBoats[i]);
    }

    if (current === 16) {
        document.getElementById('moreBoats').classList.remove('hidden');
    } else {
        document.getElementById('moreBoats').classList.add('hidden');
    }
}

/*
Adds the boats to the screen.
 */
function addCard(boat) {
    let pricefilter;
    if (boat.price >= 100000) { pricefilter = 'price-vhigh'; }
    else if (boat.price >= 50000 && boat.price <= 99999) { pricefilter = 'price-high'; }
    else if (boat.price >= 25000 && boat.price <= 49999) { pricefilter = 'price-med'; }
    else if (boat.price >= 10000 && boat.price <= 24999) { pricefilter = 'price-low'; }
    else if (boat.price >= 0 && boat.price <= 9999) { pricefilter = 'price-vlow'; }

    let yearfilter;
    if (boat.year_manufactured >= 2020) { yearfilter = 'year-vnew'; }
    else if (boat.year_manufactured >= 2015) { yearfilter = 'year-new'; }
    else if (boat.year_manufactured >= 2010) { yearfilter = 'year-med'; }
    else if (boat.year_manufactured >= 2005) { yearfilter = 'year-old'; }
    else if (boat.year_manufactured >= 2000) { yearfilter = 'year-vold'; }

    document.getElementById('boat-cards').innerHTML += `<a href="/boat/`+boat.id+`" class="block product-item filterDiv `+pricefilter+` `+yearfilter+`">
                    <img class="w-full mb-4" src="`+boat.image+`" alt="`+boat.name+`">
                    <div class="flex space-x-2">
                        <h2 class="item-header flex-grow">`+boat.name+`</h2>
                        <p>`+brands[boat.brand_id-1].name+`</p>
                    </div>
                    <p class="item-price">£`+boat.price+`</p>
                    <p>Manufactured in `+boat.year_manufactured+`</p>
                    <p>
                        <i class="fa-solid fa-location-dot" aria-hidden="true"></i> `+boat.location+`
                    </p>
                </a>`;
}

/*
Alerts the user if there's an error.
 */
function dataError(status) {
    alert('Error loading: ' +status);
}
