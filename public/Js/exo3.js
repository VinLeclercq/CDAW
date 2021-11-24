"use strict";

function modify(e){
    var parent = e.currentTarget.parentNode;
    parent.childNodes[3].innerHTML = "coucou";
}

function deleter(e){
    e.currentTarget.parentNode.remove();
}

document.getElementById("addNew").addEventListener("click", function(e){
    var users = document.getElementById("users");
    var content = "<div id=\"user"+(users.childNodes.length-3)+"\"><h4>Sawano hiroyuki</h4><p> Je fais de la musique.</p><button class=\"modify\">Modify Comment</button><button class=\"remove\">Remove Comment</button></div>"
    users.innerHTML += content;
})

let modifiers = document.getElementsByClassName("modify");
Array.from(modifiers).forEach(m => m.addEventListener("click",modify));

let remover = document.getElementsByClassName("remove");
Array.from(remover).forEach(m => m.addEventListener("click",deleter));