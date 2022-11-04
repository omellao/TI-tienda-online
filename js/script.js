const menuMobile = document.querySelector("#btn-menu-mobile");

const menu = document.querySelector(".nav-menu")

menuMobile.addEventListener("click", () =>{


    
    if(menu.style.display == "block"){

        menu.style.display = "none"
    }
    else{
        menu.style.display = "block"
    }
})

let header = document.getElementById("header");
let body = document.getElementById("body");
body.addEventListener('wheel', (event) => {
    console.log(event)
    if (event.deltaY >0)
    header.style.display="none"

    if(event.deltaY <0)
    header.style.display="block"
});
onwheel = (event) => { };