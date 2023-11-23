(function($){
    $('document').ready(function(){
        const swiper = new Swiper('.swiper', {
            loop: true,
            slidesPerView: 2,
            spaceBetween: 30,
            // If we need pagination
            pagination: {
                el: '.swiper-scrollbar',
                type: 'progressbar'

            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            //responsive
            breakpoints: {
                1482: {
                    slidesPerView: 3
                },

                1000: {
                    slidesPerView: 2
                },

                200: {
                    slidesPerView: 1
                }
            }

        });


    })
})(jQuery);

(function($){
    $('document').ready(function(){
        const swiper = new Swiper('.swiper-step', {
            loop: false,
            slidesPerView: 1,
            autoplay: true,
            //spaceBetween: 30,
            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

        });


    })
})(jQuery);