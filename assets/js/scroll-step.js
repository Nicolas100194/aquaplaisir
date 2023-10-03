document.addEventListener('DOMContentLoaded', function() {

    const swiperButtonNext = document.getElementsByClassName('swiper-button-next')
    const swiperButtonPrev = document.getElementsByClassName('swiper-button-prev')
    const steps = document.getElementsByClassName('the-step')
    const containerSteps = document.getElementsByClassName('elementor-element-135a783')

    function clearClassStep(firstStep, secondStep, thirdStep){
        firstStep.classList.remove('the-step-active')
        secondStep.classList.remove('the-step-second')
        thirdStep.classList.remove('the-step-third')
    }

    function addClassStep(firstStep, secondStep, thirdStep){
        firstStep.classList.add('the-step-active')
        secondStep.classList.add('the-step-second')
        thirdStep.classList.add('the-step-third')
    }


    function indexStep(classStep){
        let arrayFromCollection = Array.from(steps)
        let index = arrayFromCollection.findIndex(element => element.classList.contains(classStep))
        return index
    }

    function translateNext(){
        let translateCurrent = containerSteps[0].style.transform
        let value = 0
        let valueTransform = 186
        if (translateCurrent.length === 0 ){
            containerSteps[0].style.transform = "translateY(-186px)"
        }
        if(translateCurrent.length == 18 ){
            value = parseInt(translateCurrent.substring(12,15), 10)
        } else if (translateCurrent.length == 15){
            value = parseInt(translateCurrent[11], 10)
        }
        value += valueTransform
        containerSteps[0].style.transform = "translateY(-" + value + "px)"
    }

    function translatePrev(){
        let translateCurrent = containerSteps[0].style.transform
        let valueTransform = 186
        let value
        value = parseInt(translateCurrent.substring(12,15), 10)
        value = value - valueTransform
        containerSteps[0].style.transform = "translateY(-" + value + "px)"
    }

    function setStylesSteps(isNext = false, isPrevious = false){
        let indexFirstStep = indexStep('the-step-active')
        let indexSecondStep = indexStep('the-step-second')
        let indexThirdStep = indexStep('the-step-third')
        if(isNext == true){
            clearClassStep(steps[indexFirstStep], steps[indexSecondStep], steps[indexThirdStep])
            addClassStep(steps[indexFirstStep+1], steps[indexSecondStep+1], steps[indexThirdStep+1])
            translateNext()
        } else {
            clearClassStep(steps[indexFirstStep], steps[indexSecondStep], steps[indexThirdStep])
            addClassStep(steps[indexFirstStep-1], steps[indexSecondStep-1], steps[indexThirdStep-1])
            translatePrev()
        }
    }

    function blueTitleStep(){
        let stepActive = document.getElementsByClassName('the-step-active')
        let textNode = stepActive[0].childNodes[1].childNodes[1].childNodes[0]
        let span = document.createElement("span")

    }

    blueTitleStep()

    function nextSlide(){
        swiperButtonNext[0].addEventListener('click', (e) => {
            setStylesSteps(true, false)
        })
        swiperButtonPrev[0].addEventListener('click', (e) =>{
            setStylesSteps(false, true)
        })
    }

    nextSlide()
})







