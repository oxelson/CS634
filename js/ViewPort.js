/**
 * JavaScript for dropdown menu in header (used for smaller view ports)
 *
 * @authors: Hossam Abdel-Ghaffar, Long Nguyen, & Jennifer Oxelson Ganter
 */
jQuery(document).ready(function(){

});

/**
 * Change 'order' of columns to control which one ends up on top of stack 
 */ 
function checkViewport () {
  var viewportWidth = $(window).width();
  /* Change order for content in main section */
  if (viewportWidth >= 576) {
    $('main aside').removeClass('order-last');
    $('main section').removeClass('order-first');
  } else {
    $('main aside').addClass('order-last');
    $('main section').addClass('order-first');
  }
  /* Change order for content in footer*/
  if (viewportWidth >= 800) {    
    $('footer .left').removeClass('order-last');
    $('footer .right').removeClass('order-first');
  } else {
    $('footer .left').addClass('order-last');
    $('footer .right').addClass('order-first');
  }
}
