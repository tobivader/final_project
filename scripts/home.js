'use strict';
//Code for slideshow
const slides=[];
//JS object for slide content
const slide = {
    slides_1:document.querySelector("#box1"),
    slides_2:document.querySelector("#box2"),
    slides_3:document.querySelector("#box3"),
};
//Move the content of the slide left after clicking the left button
function leftButton()
{
    let temp = slide.slides_1.innerHTML;
    //************** */
    slide.slides_1.classList.add('fade');
    setTimeout(()=>{
        slide.slides_1.innerHTML=slide.slides_2.innerHTML;
        slide.slides_1.classList.remove('fade')}, 800);
    //************** */
    setTimeout( ()=> {
        slide.slides_2.classList.add('fade');
        setTimeout(()=>{
        slide.slides_2.innerHTML=slide.slides_3.innerHTML;
        slide.slides_2.classList.remove('fade')}, 800);},1000);
    //************** */
    setTimeout(()=>{
    slide.slides_3.classList.add('fade');
    setTimeout(()=>{
        slide.slides_3.innerHTML=temp;
        slide.slides_3.classList.remove('fade')}, 800);},2000);

}
//Move the content of the slide right after clicking the right button
function rightButton()
{
    let temp=slide.slides_3.innerHTML;
    slide.slides_3.classList.add('fade')
    setTimeout(()=>{
        slide.slides_3.innerHTML=slide.slides_2.innerHTML;
        slide.slides_3.classList.remove('fade')}, 800);

    setTimeout(()=>{
        slide.slides_2.classList.add('fade');
        setTimeout(()=>{
            slide.slides_2.innerHTML=slide.slides_1.innerHTML;
            slide.slides_2.classList.remove('fade')}, 800);},1000);
    setTimeout(()=>{
        slide.slides_1.classList.add('fade');
        setTimeout(()=>{
            slide.slides_1.innerHTML=temp;
            slide.slides_1.classList.remove('fade')}, 800);},2000);
}
function autoSlide()
{
    leftButton();
    setTimeout(autoSlide, 8*1000);
}

window.addEventListener("DOMContentLoaded", () =>{
    //Get the left, right slide button
    const left= document.querySelector("button#left");
    const right= document.querySelector("button#right");

    //autoSlide();    //Autoslide show after 8 secs

    left.addEventListener("click",function()   //Event listener for left Button
    {
        leftButton();
    });
    right.addEventListener("click", function()  ////Event listener for right Button
    {
        rightButton();
    });
});
