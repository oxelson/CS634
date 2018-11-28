/**
 * Module for manipulating DOM elements & attributes according to viewport data.
 *
 * @authors: Hossam Abdel-Ghaffar, Long Nguyen, & Jennifer Oxelson Ganter
 */
let ViewPort = (function () {

  /**
   * Change 'order' of columns to control which one ends up on top of stack.
   */
  function checkSize () {
    let viewportWidth = $(window).width();
    // Change order for content in main section.
    if (viewportWidth >= 576) {
      $('main aside').removeClass('order-last');
      $('main section').removeClass('order-first');
    } else {
      $('main aside').addClass('order-last');
      $('main section').addClass('order-first');
    }
    // Change order for content in footer.
    if (viewportWidth >= 800) {
      $('footer .left').removeClass('order-last');
      $('footer .right').removeClass('order-first');
    } else {
      $('footer .left').addClass('order-last');
      $('footer .right').addClass('order-first');
    }
  }
  // Expose these functions.
  return {
    checkSize: checkSize
  };
})();