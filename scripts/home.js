'use strict';
//Code for slideshow
const slides=[];
let slideIndex=0;
slides[0]=document.getElementById("box1");
slides[1]=document.getElementById("box2");
slides[2]=document.getElementById("box3");

window.addEventListener("DOMContentLoaded", () =>{
    //Get the left, right slide button
    const left= document.querySelector("button#left");
    const right= document.querySelector("button#right");

    left.addEventListener("click",function()
    {
        const temp=slides[0].innerHTML;
        slides[0].innerHTML=slides[1].innerHTML;
        slides[1].innerHTML=slides[2].innerHTML;
        slides[2].innerHTML=temp;
    });
    //Comment=
    right.addEventListener("click", function()
    {
        const temp=slides[2].innerHTML;
        slides[2].innerHTML=slides[1].innerHTML;
        slides[1].innerHTML=slides[0].innerHTML;
        slides[0].innerHTML=temp;
    });
});
