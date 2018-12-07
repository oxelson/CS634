/**
 * Module for loading student instruction data needed by the website into web storage.
 *
 * @authors: Hossam Abdel-Ghaffar, Long Nguyen, & Jennifer Oxelson Ganter
 */
let Instruction = (function () {

  /**
   * Looks to see if lesson data is already in web storage, and if it
   * isn't get the initial lesson data and adds to local storage.
   */
  function verifyData() {
    // Load lesson data into local storage if it isn't present.
    if (!Storage.isStored('lessons')) {
      console.log('Initializing lessons in local storage...');
      // Load the data into storage.
      getLessonData();
    }
  }

  /**
   * Loads Lesson JSON via AJAX request and returns string version of JSON object.
   */
  function getLessonData() {
    $.ajax({
      url: 'http://www.cs634-hur-01.designaspractice.com/js/Lessons.JSON'
    }).done(function (data) {
      // Load into local storage.
      Storage.addData('lessons', JSON.stringify(data.lessons));
    }).fail(function (request) {
      let message = 'Unable to load lesson JSON data via AJAX.';
      alert(message);
      console.log(message);
    });
  }


  function displayLessons() {

    // If tanya or student are authenticated, show lessons; otherwise, show request instruction form.
    let user = Account.isAuthenticated();
    if (user !== null) {
      if (user.login === 'tanya' || user.login === 'student') {
        // Tanya or student is logged in.



      } else {
        // Someone else is logged in.
        printRequestForm();
      }
    } else {
      // No one is login in.
      printRequestForm();
    }
  }

  /**
   * Utility function to print the request instruction web form.
   * (This is shown to non-authenticated users, and authenticated
   * users who are not tanya or the student.)
   */
  function printRequestForm() {
    // Show request instruction web form.

    // Create row div.
    let rowDiv = $('<div class="row"></div> <!--/.row -->\n');

    // Create title & attach to rowDiv
    let title = $('<h3>Request Instruction from Tanya</h3>');
    $(rowDiv).append($(title));

    // Create instructions & attach to rowDiv
    let instructions = $('<p>Use the following form to send a request for student instruction from Tanya Anisimova.</p>');
    $(rowDiv).append($(instructions));

    // Create left column.
    let leftCol = $('<div class="col-sm-6 col-xs-12"></div>');

    // Create name form group and attach to left column.
    let name = $('<div class="form-group"><input type="text" class="form-control col-form-label-sm" id="name" placeholder="Full Name"></div>');
    $(leftCol).append($(name));

    // Create email form group and attach to left column.
    let email = $('<div class="form-group"><input type="email" class="form-control col-form-label-sm" id="email" placeholder="Email Address"></div>');
    $(leftCol).append($(email));

    // Create age form group and attach to left column.
    let age = $('<div class="form-group"><input type="number" class="form-control col-form-label-sm" id="age" placeholder="Student Age"></div>');
    $(leftCol).append($(age));

    // Create yearsExperience form group and attach to left column.
    let yearsExperience = $('<div class="form-group"><input type="number" class="form-control col-form-label-sm" id="yearsExperience" placeholder="Years Experience Playing Cello"></div>');
    $(leftCol).append($(yearsExperience));

    // Create right column.
    let rightCol = $('<div class="col-sm-6 col-xs-12"></div>');

    // Create information form group and attach to right column.
    let information = $('<div class="form-group"><textarea class="form-control rounded-0 col-form-label-sm" id="information" placeholder="Additional Information" rows="8"></textarea></div>');
    $(rightCol).append($(information));


    // Create submit column.
    let submitCol = $('<div class="col-sm-6 col-xs-12 submit"></div>');

    // Create recaptcha form group and attach to submit column.
    let recaptcha= $('<div class="form-group recaptcha"><img src="/images/check.png" alt="I am not a robot"> I am not a robot</div>');
    $(submitCol).append($(recaptcha));

    // Create submit and attach to submit column.
    let submit= $('<button type="submit" class="btn btn-primary">Send Request For Instruction</button>');
    $(submitCol).append($(submit));

    // Attach columns to row.
    $(rowDiv).append($(leftCol));
    $(rowDiv).append($(rightCol));
    $(rowDiv).append($(submitCol));

    // Create form container.
    let formTags = $('<form></form>');

    // Attach row to form
    $(formTags).append($(rowDiv));

    // Attach to DOM
    $(".fill").append($(formTags));
  }

  // Expose these functions.
  return {
    displayLessons: displayLessons
  };
})();
