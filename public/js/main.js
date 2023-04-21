$(".open-popup").click(function (e) {
  e.preventDefault();
  $(".popup-bg").fadeIn(800);
  $("html").addClass("no-scroll");
});

$(".close-popup").click(function () {
  $(".popup-bg").fadeOut(800);
  $("html").removeClass("no-scroll");
});

$(".open-popup-reg").click(function (e) {
  e.preventDefault();
  $(".close-popup").fadeOut(800);
  $(".popup-bg-reg").fadeIn(800);
  $("html").addClass("no-scroll");
});

$(".close-popup").click(function () {
  $(".popup-bg-reg").fadeOut(800);
  $("html").removeClass("no-scroll");
});

function switchForm() {
  var login = document.getElementById("login");
  var register = document.getElementById("register");

  if (login.style.display == "none") {
    login.style.display = "block";
    register.style.display = "none";
  } else {
    login.style.display = "none";
    register.style.display = "block";
  }
}
