
new WOW().init();


$(function(){
    $("div#navbar > ul > li").each(function(){
        var mobbody = $(this).html();
        $('.sidenav').append('<div>'+mobbody+'</div>');
    });
    $( "#mySidenav a" ).each(function(){
        if ($(this).find(".caret").length > 0){ 
          $(this).parent('div').attr('id','hassubmenu');
          $(this).after('<i class="fa fa-angle-down"></i>');
        }
    });
    $('#mySidenav #hassubmenu i.fa.fa-angle-down').click(function(){
        $(this).next('ul.dropdown-menu').slideToggle();
    }
    );
});

function openNav() {
        document.getElementById("mySidenav").style.left = "0px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.left = "-250px";
}

$(function(){
 $('.help-slider').slick({
  dots: true,
  infinite: false,
  speed: 300,
  rows:1,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]

});

 });



// button



  var btn = $('#button');
$(window).scroll(function() {
if ($(window).scrollTop() > 300) {
btn.addClass('show');
} else {
btn.removeClass('show');
}
});
btn.on('click', function(e) {
e.preventDefault();
$('html, body').animate({scrollTop:0}, '300');
});


//  button

// main-navigate

$(window).scroll(function () {
var window_top = $(window).scrollTop() + 1;
if (window_top > 50) {
$('.main-navigate').addClass('menu_fixed');
} else {
$('.main-navigate').removeClass('menu_fixed');
}
});

// main-navigate