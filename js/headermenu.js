/**
 * JavaScript for dropdown menu in header (used for smaller view ports)
 *
 * @authors: Abdel-Ghaffar, Nguyen, & Oxelson Ganter
 */
jQuery(document).ready(function(){
  /* Populate the dropdown menu with the links in the nav bar */
  $.each($("nav a"), function( index, value ) {
    if (!$(this).hasClass("menu")) {
      var element = $("<li></li>")
      $(element).append($(this));
      $("#menu_nav ul").append($(element));
    }
  });

  /* If nav menu is click */
  jQuery(".menu").click(function(e) {
    // Hide/show menu depending on its current state.
    if ($("#menu_nav").hasClass("hidden")) {  
       // Reveal if hidden.
       $("#menu_nav").removeClass("hidden");
    } else { 
       // Hide if visible.
       $("#menu_nav").addClass("hidden");
    }
  });
});

