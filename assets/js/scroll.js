let menu = document.getElementsByTagName('header')
let site = document.getElementsByClassName('site-content')

function reduceMenu(){
   menu[0].style.transform = "translateY(-150px)"
    menu[0].style.transition = "1s"

}

function appearMenu(){
    menu[0].style.transform = "translateY(0px)"
    menu[0].style.transition = "0.5s"

}



site[0].addEventListener('wheel', function(e) {
    if(e.deltaY > 0) {
        reduceMenu()
    } else if (e.deltaY < 0){
        appearMenu()
    }
});

