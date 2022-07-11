var a = 0;

$(window).scroll(function () {

  var sticky = $('header'),
          scroll = $(window).scrollTop();

      if (scroll >= 250) {
          sticky.addClass('sticky-nav');
          $('body').addClass('fixed-content');
      } else {
          sticky.removeClass('sticky-nav');
          $('body').removeClass('fixed-content');
      }
//

var oTop = $(".counter-box").offset().top - window.innerHeight;

console.log(oTop)
if (a == 0 && $(window).scrollTop() > oTop) {

 
    $(".counter").each(function () {
        var $this = $(this),
            countTo = $this.attr("data-number");
        $({
            countNum: $this.text()
        }).animate(
            {
                countNum: countTo
            },

            {
                duration: 850,
                easing: "swing",
                step: function () {
                    $this.text(
                        Math.ceil(this.countNum).toLocaleString("en")
                    );
                },
                complete: function () {
                    $this.text(
                        Math.ceil(this.countNum).toLocaleString("en")
                    );

                    $this.addClass('zoom-text')
                }
            }
        );
    });
    
    a = 1;
}

});

AOS.init({
    once: true,
});

$('.partner-carousel .owl-carousel').owlCarousel({
    // loop: true,
    // autoplay: false,
    autoplayTimeout: 6000,
    autoplaySpeed: 1500,
    smartSpeed: 1500,
    margin:15,
    lazyLoad: true,
    items: 1,
    responsiveClass: true,
    nav: true,
    dots: false,
//   dotsData: true,
    responsive: {
        0: {
            items: 1,
        }
    }
});

$('.toggle-btn').on('click', function(){
    $('.nav-wrapper').fadeIn()
    $('body').append('<div class="bgoverlay"/>')
})
$('.close-menu').on('click', function(){
   $('.bgoverlay').remove();
   $('.nav-wrapper').fadeOut()
})

// var dots = document.querySelectorAll(".abcd .owl-dots .owl-dot");
// let i=1;
// dots.forEach((elem)=>{
//     elem.innerHTML = ("0"+ i).slice(-2);
//     i++;
    
// })

var filterActive;
        
        function filterCategory(category) {
          if (filterActive != category) {
        
            // reset results list
            $('.filter-cat-results .f-cat').removeClass('active');
        
            // elements to be filtered
            $('.filter-cat-results .f-cat').
            filter('[data-cat="' + category + '"]').
            addClass('active');
        
            // reset active filter
            filterActive = category;
            $('.filtering button').removeClass('active');
          }
        }
        
        $('.f-cat').addClass('active');
        
        $('.filtering button').click(function () {
          if ($(this).hasClass('cat-all')) {
            $('.filter-cat-results .f-cat').addClass('active');
            filterActive = 'cat-all';
            $('.filtering button').removeClass('active');
          } else {
            filterCategory($(this).attr('data-cat'));
          }
          $(this).addClass('active');
        });
        //# sourceURL=pen.js






