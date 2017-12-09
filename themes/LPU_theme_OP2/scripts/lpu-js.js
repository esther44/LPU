/**
 * Created by esthe on 07/08/2016.
 */
$(document).ready(function () {
    menuResponsiveClass();
    ScrollTo();
    seeMoreEvent();
    modalDialogClassContainer();
});


function menuResponsiveClass() {
    $('#menu-main-nav').append(
        "<li class=\"icon\">" +
        "<a href=\"javascript:void(0);\" style=\"font-size:15px;\" onclick=\"menuResponsive()\">&#9776;</a>" +
        "</li>");


    $('.menu.responsive .menu-item').on('click', function () {
        if ($('.menu').hasClass('responsive')) {
            $(".menu").removeClass("responsive");
        }
    });
}

function menuResponsive() {
    var x = document.getElementById("menu-main-nav");
    if (x.className === "menu") {
        x.className += " responsive";
    } else {
        x.className = "menu";
    }
}

function ScrollTo() {
    $('.menu-item a').click(function () { // Au clic sur un élément
            var page = $(this).attr('data-title'); // Page cible
            if (page.length) {
                var coordonnees = $('section[id="' + page + '"]').offset().top;
                var speed = 750; // Durée de l'animation (en ms)
                $('html, body').animate({scrollTop: coordonnees}, speed); // Go
                return false;
            }
        }
    );
}

function seeMoreEvent() {
    $('.evenement-card:eq(0)').addClass('show');
    $('.evenement-card:eq(1)').addClass('show');
    $('.evenement-card:eq(2)').addClass('show');


    $('.see-more-events').on('click', function () {
        if ($('.evenement-card').is(":hidden")) {
            $("article").slideDown("slow");
            $('.see-more-events span').html('Voir moins')
        } else {
            $(".evenement-card:not(.show)").slideUp();
            $('.see-more-events span').html('Voir plus')
        }
    });
}

function modalDialogClassContainer() {
    $('.modal-dialog').addClass('container');
}