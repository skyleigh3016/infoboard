var oldScrollY = window.scrollY;


var nav1 = document.querySelector('.nav');
var lli  = document.querySelector('.cmdilogo-size');
var li = document.querySelector('.haha');
var li1 = document.querySelector('.cmdilogo-position');
var text1 = document.querySelector('.cmdilogo-text1');
var text2 = document.querySelector('.cmdilogo-text2');

window.onscroll = function(e) {
    if (oldScrollY < window.scrollY) {
        nav1.style.visibility = "hidden";
        nav1.style.transition = ".5s";
        nav1.style.opacity = "0";
    


    } else {
        nav1.style.visibility = "visible";
        nav1.style.opacity = "100";
        nav1.style.height = "70px";
        nav1.style.lineHeight = "40px";
        li.style.top = "15px";
        li1.style.top = "3px";
        li.style.transition = "1s";
        li1.style.transition = "1s";
        lli.style.height = "55px";
        lli.style.width = "55px";

    }
    if (window.scrollY == 0 && window.scrollX == 0) {
        nav1.style.visibility = "visible";
        nav1.style.height = "100px";
        nav1.style.lineHeight = "70px";
        li.style.top = "30px";
        li1.style.top = "7px";
        lli.style.height = "70px";
        lli.style.width = "70px";
    }


    oldScrollY = window.scrollY;


}

// document.body.scrollTop == 0; {
//     alert("Hello! I am an alert box!!");
// }