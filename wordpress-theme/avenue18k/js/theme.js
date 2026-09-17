/* Avenue 18K — comportements du thème (menu mobile, newsletter) */
document.addEventListener("DOMContentLoaded", function () {
  var burger = document.querySelector(".burger");
  var mobileNav = document.querySelector(".mobile-nav");
  if (burger && mobileNav) {
    burger.addEventListener("click", function () {
      mobileNav.classList.toggle("open");
    });
  }

  document.querySelectorAll(".js-newsletter-form").forEach(function (form) {
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      var msg = form.querySelector(".form-msg");
      var input = form.querySelector('input[type="email"]');
      if (msg) {
        msg.textContent = "Merci ! Votre code -10% arrive à l'instant sur " + (input ? input.value : "votre email") + ".";
      }
      form.reset();
    });
  });
});
