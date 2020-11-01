/* Open when someone clicks on the span element */
function openNav() {
    document.getElementById("myNav").style.width = "70%";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var modal = document.getElementById('id01');
var modal = document.getElementById('id02');
var modal = document.getElementById('id03');