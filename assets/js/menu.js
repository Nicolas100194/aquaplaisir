(function($){
    $('#header-icon').click(function(e){
        e.preventDefault()
        $('body').toggleClass('with-sidebar')
    })
})(jQuery);

let withSidebar = document.getElementsByTagName('body')
let siteContent = document.getElementsByClassName('site-content')
let siteCache = document.createElement("div")
siteCache.classList.add('site-cache')
siteCache.setAttribute('id', 'site-cache')
siteContent[0].insertAdjacentElement("afterend", siteCache)

siteCache.addEventListener('click', (e) =>{
    withSidebar[0].classList.toggle('with-sidebar')
} )

let menuItemAccessoires = document.getElementById('menu-item-711')
let menuItemContact = document.getElementById('menu-item-724')

menuItemAccessoires.addEventListener('click', (e) =>{
    withSidebar[0].classList.toggle('with-sidebar')
})

menuItemContact.addEventListener('click', (e) =>{
    withSidebar[0].classList.toggle('with-sidebar')
})

