const width = $(document).width();
$(window).scroll(function () {
  if ($(document).scrollTop() > 100) {
    $("#headers").css("background-color", "#8613bc");
  } else {
    $("#headers").css("background-color", "#8613bc");
  }
});

$(".navbar-toggler").click(function () {
  if ($(".navbar-toggler").hasClass("collapsed")) {
    $("#headers").css("background-color", "#8613bc");
  } else {
    $("#headers").css("background-color", "#8613bc");
  }
});

$(window)
  .resize(function () {
    console.log(document.documentElement.clientWidth);
    if (document.documentElement.clientWidth < 992) {
    }
  })
  .resize();
