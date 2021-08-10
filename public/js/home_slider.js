$('.slider').slick({
            
    arrows: true,
    centerMode: true,
    centerPadding: '30px',
    slidesToShow: 3,
    responsive: [{
            breakpoint: 908,
            settings: {
                arrows: true,
                centerMode: true,
                centerPadding: '0px',
                slidesToShow: 2
            }
        },
        {
            breakpoint: 760,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
            }
        }
    ]
});

