var oldScrollY = window.scrollY;


var nav1 = document.querySelector('.nav');
var nava1 = document.getElementById('a1');
var nava2 = document.getElementById('a2');
var nava3 = document.getElementById('a3');
var nava4 = document.getElementById('a4');
var nava5 = document.getElementById('a5');
var li = document.querySelector('.haha')
var li1 = document.querySelector('.cmdilogo-position')
var text1 = document.querySelector('.cmdilogo-text1')
var text2 = document.querySelector('.cmdilogo-text2')

window.onscroll = function(e) {
    if (oldScrollY < window.scrollY) {
        nav1.style.visibility = "hidden";
        nav1.style.transition = ".5s";
        nav1.style.opacity = "0";
        modal.style.display = "none";


    } else {
        nav1.style.visibility = "visible";
        nav1.style.transition = ".5s";
        nav1.style.opacity = "100";
        nav1.style.height = "70px";
        nav1.style.lineHeight = "40px";
        // nav1.style.background = "#fff";
        // nava1.style.color = "black";
        // nava2.style.color = "black";
        // nava3.style.color = "black";
        // nava4.style.color = "black";
        // nava5.style.color = "black";
        // text1.style.color = "black";
        // text2.style.color = "black";
        li.style.top = "15px";
        li1.style.top = "3px";
        li.style.transition = "1s";
        li1.style.transition = "1s";
        modal.style.display = "none";


    }
    if (window.scrollY == 0 && window.scrollX == 0) {
        nav1.style.visibility = "visible";

        nav1.style.height = "100px";
        // nava1.style.color = "#fff";
        // nava2.style.color = "#fff";
        // nava3.style.color = "#fff";
        // nava4.style.color = "#fff";
        // nava5.style.color = "#fff";
        // nav1.style.background = "var(--blue)";
        // text1.style.color = "#fff";
        // text2.style.color = "#fff";
        nav1.style.lineHeight = "75px";
        li.style.top = "30px";
        li1.style.top = "15px";
        nav1.style.transition = " .7s";




    }


    oldScrollY = window.scrollY;


}

// document.body.scrollTop == 0; {
//     alert("Hello! I am an alert box!!");
// }