//récupérer propriété alt d'élément img qui a comme parent la div avec classe "active"
//appliquer la classe "the-step-active" a la div qui a le noeud texte correspondant

let steps = document.getElementsByClassName('the-step')
let firstStep = steps[0]
firstStep.classList.add('the-step-active')
let divImg = document.getElementsByClassName('swiper-slide')
let slideOne = divImg[0].childNodes[0].alt


function swipeActive(){
    let buttonSwiper = document.getElementsByClassName('btn-swiper')
    Array.from(buttonSwiper).forEach(button =>{
        button.addEventListener('click', (e) => {
            setTimeout(divActive(button), 200)
        })
    })
}

function divActive(button){
    let divImg = document.getElementsByClassName('swiper-slide-active')
    let divImgNext
    let thirdDiv
    if (button.classList[0] === "swiper-button-prev"){
        divImgNext = divImg[0].previousSibling
    } else {
        divImgNext = divImg[0].nextElementSibling
    }
    let img = divImgNext.lastChild.alt

    Array.from(steps).forEach(element =>{
        if(element.classList.length == 6){
            if(element.classList[6] === "the-step-active"){
                element.classList.remove('the-step-active')
            }
        }
        if(element.childNodes[1].childNodes[2].textContent.trim() == img){
            element.classList.add('the-step-active')
            element.classList.remove('the-step-second')
            element.nextElementSibling.classList.add('the-step-second')
            element.nextElementSibling.classList.remove('the-step-third')
            thirdDiv = element.nextElementSibling.nextElementSibling
            thirdDiv.classList.add('the-step-third')
            console.log(thirdDiv.classList)
        }
    })
    divMove(button.classList[0])
}

function divMove(button){
    let valueTransform = 185
    if(button === "swiper-button-prev"){
        valueTransform = -185
    }

    let colStep = document.getElementsByClassName('col-step')
    colStep = colStep[0].childNodes[1]
    let translateCurrent = colStep.style.transform
    if (translateCurrent.length === 0 ){
        colStep.style.transform = "translateY(-185px)"
    }
    else {
        let value
        if(translateCurrent.length == 18 ){
            value = parseInt(translateCurrent.substring(12,15), 10)
        } else if (translateCurrent.length == 15){
            value = parseInt(translateCurrent[11], 10)
        }
        value += valueTransform
        colStep.style.transform = "translateY(-" + value + "px)"
    }
}





swipeActive()


