let boats = [

]

fetch('/api/boats/', {
    method: 'GET',
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
    }
})
.then(response => boats = response.json())
.then(dataLoaded())

function dataLoaded() {
    //for (let i = 0; i >= boats.length; i++) {
    //    addCard(boats[i]);
    //}
}

function addCard(boat) {
    console.log(boat);
}
