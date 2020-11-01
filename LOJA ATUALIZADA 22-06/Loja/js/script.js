var sidenav = document.getElementById('mySidenav');
//NAV

menuaberto = false;


function myFunction(x) {
    x.classList.toggle("change");
    if (menuaberto) {
        //
        document.getElementById("mySidenav").style.width = "0";
        document.body.style.backgroundColor = "#fff";
        menuaberto = false;

    } else {
        //
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("menu").style.zIndex = "1";
        menuaberto = true;

    }
}
// BTN TOP

window.onscroll = function () {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
/* MODAL FORMULARIO */
var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}