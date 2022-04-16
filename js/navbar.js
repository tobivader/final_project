//Code for Dynamic Navbar
//Get the parent elements and its children
const title=document.title;
//Navbar object
const navbar=
{
    home : document.querySelector("#navbar_home"),
    account : document.querySelector("#navbar_acc"),
    mangeList : document.querySelector("#navbar_ml"),
    logout : document.querySelector("#navbar_lo")
};

function loadNavBar()
{
    if(title=="Home Page")
    {
        navbar.home.remove();
    }
    else if(title=="Your Lists")
    {
        navbar.mangeList.remove();
    }
    else if(title == "Account")
    {
        navbar.account.remove();
    }

}
//Some other conditions once other pages have been completed
let isOpen=false;
function openNav()
{
    if(isOpen==false)
    {
        document.querySelector("#navbar").style.width="100%";
        isOpen=true;
    }
    else if(isOpen==true)
    {
        document.querySelector("#navbar").style.width="0%";
        isOpen=false;
    }
}

//document.getElementById("close").addEventListener("click", function(){closeNav()});
window.addEventListener("DOMContentLoaded", () =>{

    loadNavBar();
    document.getElementById("open").addEventListener("click", function(){
        openNav()
    });//End of click event listener
});//End of DOM content loaded listener