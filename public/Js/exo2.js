"use strict";

function changeDescr(){
    var elements = document.getElementsByClassName("descr");
    var i;
    for (i = 0; i < elements.length; i++) {
        elements[i].style.backgroundColor = "green";
    } 
}

function changeCaroussel(){
    var element  =  document.getElementById("caroussel").firstElementChild;
    element.style.backgroundColor = "blue";
}

function masque(){
    var element  =  document.getElementById("plusLa").style.visibility = "hidden";
}