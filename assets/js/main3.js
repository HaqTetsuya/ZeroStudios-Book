'use strict';

document.addEventListener('DOMContentLoaded', function () {

    /*------------------
        Preloader
    --------------------*/
    window.addEventListener('load', function () {
        document.querySelector(".loader").style.display = 'none';
        setTimeout(function() {
            document.querySelector("#preloder").style.display = 'none';
        }, 200);

        /*------------------
            Filter
        --------------------*/
        document.querySelectorAll('.filter__controls li').forEach(function(item) {
            item.addEventListener('click', function () {
                document.querySelectorAll('.filter__controls li').forEach(function(li) {
                    li.classList.remove('active');
                });
                item.classList.add('active');
            });
        });

        if (document.querySelector('.filter__gallery')) {
            var containerEl = document.querySelector('.filter__gallery');
            var mixer = mixitup(containerEl);
        }
    });

    /*------------------
        Background Set
    --------------------*/
    document.querySelectorAll('.set-bg').forEach(function (el) {
        var bg = el.getAttribute('data-setbg');
        el.style.backgroundImage = 'url(' + bg + ')';
    });

    // Search model
    document.querySelectorAll('.search-switch').forEach(function(el) {
        el.addEventListener('click', function () {
            document.querySelector('.search-model').style.display = 'block';
        });
    });

    document.querySelectorAll('.search-close-switch').forEach(function(el) {
        el.addEventListener('click', function () {
            document.querySelector('.search-model').style.display = 'none';
            document.querySelector('#search-input').value = '';
        });
    });

    /*------------------
		Navigation
	--------------------*/

    /*------------------
		Hero Slider
	--------------------*/
    var heroSlider = document.querySelector(".hero__slider");
    if (heroSlider) {
        var owl = new OwlCarousel(heroSlider, {
            loop: true,
            margin: 0,
            items: 1,
            dots: true,
            nav: true,
            navText: ["<span class='arrow_carrot-left'></span>", "<span class='arrow_carrot-right'></span>"],
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            smartSpeed: 1200,
            autoHeight: false,
            autoplay: true,
            mouseDrag: false
        });
    }


    /*------------------
        Niceselect
    --------------------*/
    if (document.querySelector('select')) {
        niceSelect(document.querySelector('select'));
    }

    /*------------------
        Scroll To Top
    --------------------*/
    var scrollToTopButton = document.querySelector("#scrollToTopButton");
    if (scrollToTopButton) {
        scrollToTopButton.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
            return false;
        });
    }

    

});

