const sectionLightBox = document.getElementsByClassName('section-lightbox')
const imgGallery = document.getElementsByClassName('img-gallery')
const header = document.getElementsByTagName('header')
let urlImg

function scaleImg(){
    Array.from(imgGallery).forEach(img=>{
        img.addEventListener('mouseover', (e)=>{
            img.classList.toggle('img-hover')
            img.childNodes[1].childNodes[1].classList.toggle('hover-scale')
        })
        img.addEventListener('mouseout', (e)=>{
            img.classList.toggle('img-hover')
            img.childNodes[1].childNodes[1].classList.toggle('hover-scale')
        })

    })
}

function fullScreenImgGallery(){
    Array.from(imgGallery).forEach(img =>{
        img.addEventListener('click', (e) =>{
            sectionLightBox[0].classList.remove('section-lightbox-disabled')
            header[0].classList.add('header-disabled')
            urlImg = img.childNodes[1].childNodes[1].src
            let imgZoom = document.getElementsByClassName('img-zoom')
            imgZoom[0].src = urlImg
        })
    })
}

function closeFullScreen(){
    sectionLightBox[0].addEventListener('click', (e) =>{
        sectionLightBox[0].classList.add('section-lightbox-disabled')
        header[0].classList.remove('header-disabled')
    })
}

scaleImg()
fullScreenImgGallery()
closeFullScreen()

