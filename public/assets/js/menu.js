$(document).ready(function() {
  $(".nav-link").each(function() {
      if(this.href == window.location.href) {
          $(".nav-link."+this.href.split("/")[3]).addClass("active bg-gradient-primary");
      }else if(window.location.href == "http://127.0.0.1:8000/"){
        $(".nav-link.saham").addClass("active bg-gradient-primary");
      }
  });
});