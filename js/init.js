/**
 * JavaScript that needs to be initialized/run when page is loaded.
 *
 * @authors: Hossam Abdel-Ghaffar, Long Nguyen, & Jennifer Oxelson Ganter
 */
jQuery(document).ready(function(){

  // Verify we have album & performance data in storage.
  Discography.verifyData();
  // Verify we have news data in storage.
  News.verifyData();
  // Verify we have calendar data in storage.
  Calendar.verifyData();
  // Verify we have account data in storage.
  Account.verifyData();

  // Populate the dropdown menu with the links in the nav bar.
  $.each($('header nav a'), function( index, value ) {
    if (!$(this).hasClass('menu')) {
      let link = $(this).clone();
      let element = $('<li></li>');
      $(element).append($(link));
      $('#menu_nav ul').append($(element));
    }
  });

  // check viewport on page load.
  ViewPort.checkSize();

  // The size of the viewport influences the display.
  $(window).resize(function() {
    // Hide the menu if the window is re-sized.
    $('#menu_nav').addClass('hidden');
    // Check viewport when window is re-sized.
    ViewPort.checkSize()
  });

  // If nav menu is click.
  jQuery('.menu').click(function(e) {
    // Hide/show menu depending on its current state.
    if ($('#menu_nav').hasClass('hidden')) {
      // Reveal if hidden.
      $('#menu_nav').removeClass('hidden');
      $('.nobg').removeClass('hidden');
    } else {
      // Hide if visible.
      $('#menu_nav').addClass('hidden');
      $('.nobg').addClass('hidden');
    }
  });
});
