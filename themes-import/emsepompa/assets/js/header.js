$(document).ready(function () {
    console.log('ready');
    $('.hamburger-icon').click(function () {
        $('.nav').toggleClass('show');
        toggleHamburgerIcon();
    });

    function toggleHamburgerIcon() {
        $('.hamburger-icon').toggleClass('open');
    }
});