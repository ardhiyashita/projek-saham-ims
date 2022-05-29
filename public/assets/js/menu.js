var a = 0;
$(document).ready(function () {
  $("#anfumenu").hide();
  $(".nav-link").each(function () {
    if (this.href == window.location.href) {
      $(".nav-link." + this.href.split("/")[3]).addClass("active bg-gradient-primary");
    } else if (window.location.href == "http://127.0.0.1:8000/") {
      $(".nav-link.dashboard").addClass("active bg-gradient-primary");
    }
  });

  $(".nav-link.anfu.text-white").each(function (e) {
    $(".nav-link.anfu.text-white").click(function (e) {
      e.preventDefault();
      if (a == 0) {
        $("#anfumenu").show();
        a = 1;
      } else if (a == 1) {
        $("#anfumenu").hide();
        a = 0;
      }
    });
  });

});


