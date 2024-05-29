$(document).ready(function () {
  $(".product-cards").slick({
    slidesToShow: 3, // Başlangıçta 3 öğe göster
    slidesToScroll: 1, // Her kaydırma da 1 öğe kaydır
    prevArrow: $(".prev"),
    nextArrow: $(".next"),
    autoplay: true, // Otomatik oynat
    responsive: [
      {
        breakpoint: 768, // Tablet ve altı için
        settings: {
          slidesToShow: 1, // Tablet ve altında sadece 1 öğe göster
        },
      },
    ],
  });

  $(window).on("scroll", function () {
    $(".section").each(function () {
      if (isScrolledIntoView($(this))) {
        $(this).addClass("fade-in");
      }
    });
  });
});

function isScrolledIntoView(elem) {
  var docViewTop = $(window).scrollTop();
  var docViewBottom = docViewTop + $(window).height();
  var elemTop = $(elem).offset().top;
  var elemBottom = elemTop + $(elem).height();
  return elemBottom <= docViewBottom && elemTop >= docViewTop;
}
