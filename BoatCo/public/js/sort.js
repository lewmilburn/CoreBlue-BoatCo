/*
    Searches for matching items that have the requested class attached.
 */
function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("filterDiv");
        if (c == "all") {
            for (i = 0; i < x.length; i++) {
                removeClass(x[i], "hidden");
            }
        } else {
            filterSelection("all");
            for (i = 0; i < x.length; i++) {
                if (!x[i].classList.contains(c)) addClass(x[i], "hidden");
            }
        }
    }

    /*
    Adds the requested class to the element.
     */
    function addClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
        }
    }

    /*
    Removes the requested class from the element.
     */
    function removeClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);
            }
        }
        element.className = arr1.join(" ");
    }

    function toggleFilterMenu() {
        let menu = document.getElementById('btnContainer').classList;
        if (menu.contains('hidden')) {
            menu.remove('hidden');
        } else {
            menu.add('hidden');
        }
    }
