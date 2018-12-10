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

  /**
   * Get the requested lesson from web storage and returns it as an object.
   *
   * @param lessonOfInterest  The lesson of interest.
   */
  function getLesson(lessonOfInterest) {
    // Get lesson data from local storage.
    let lessonData = JSON.parse(Storage.getData("lessons"));
    // Parse lesson data and create tag elements to attach to DOM.
    for (let i = 0; i < lessonData.length; i++) {
      let title = lessonData[i].title;
      if (title.replace(/ /g, "_") === lessonOfInterest) {
        return lessonData[i];
      }
    }
  }


  /**
   * Gathers the given lesson from web storage, formats the data for display,
   * and attaches to the DOM.
   *
   * @param lessonOfInterest  The lesson of interest to display.
   */
  function displayLesson(lessonOfInterest) {
    // If tanya or student are authenticated, show lessons; otherwise, show request instruction form.
    let user = Account.isAuthenticated();
    if (user !== null) {
      if (user.login === 'tanya' || user.login === 'student') {
        // Tanya or student is logged in; show the lesson.

        // Just in case the data isn't in local storage yet.
        verifyData();

        // Get lesson data from local storage.
        let lessonData = JSON.parse(Storage.getData("lessons"));
        let lesson;
        // Parse lesson data and create tag elements to attach to DOM.
        for (let i = 0; i < lessonData.length; i++) {
          let title = lessonData[i].title;
          if (title.replace(/ /g, "_") === lessonOfInterest) {
            lesson = lessonData[i];
            break;
          }
        }

        $('.fill').append('<h3 class="sm">' + lesson.title + '<div class="level"><b>' + lesson.level + '</b> </div></h3>');

        let lessonsDiv = $('<div class="col lessons"></div> <!-- /.col -->');


        // Create & attach student info (if tanya).
        if (user.login === "tanya") {
          let student = $('<span class="deemp">Assigned to: <b class="noblock">' + lesson.studentName + '</b></span><br/>');
          $(lessonsDiv).append(student);
        }
        // Create & attach lesson status.
        let status;
        if (lesson.status === "complete") {
          status = $('<span> Status: <em class="statusComplete">' + lesson.status + '</em></span><br/>');
        } else {
          status = $('<span> Status: <em class="statusNotStarted">' + lesson.status + '</em></span><br/>');
        }
        $(lessonsDiv).append(status);

        // Admin links.
        if (user.login === 'tanya') {
          // Create list for displaying update/deletion of lessons.
          let linkList = $('<ul class="adminLinks "></ul>');
          let updateElement = $('<li class="admin"><a href="update.php?' + lessonOfInterest + '">Update Lesson</a></li>');
          $(linkList).append($(updateElement));

          let removeElement = $('<li class="admin"><a href="remove.php?' + lessonOfInterest + '">Remove Lesson</a></li>');
          $(linkList).append($(removeElement));
          $(lessonsDiv).append($(linkList));
        }

        $(lessonsDiv).append('<h5>LESSON INSTRUCTIONS</h5>');

        // Create & attach sheet music (if applicable).
        if (lesson.sheetmusic !== "") {
          let title = $('<span>Required sheet music: <a href="'+ lesson.sheetmusic + '">' + lesson.title + '</a></span><br/><br/>');
          $(lessonsDiv).append(title);
        }

        // Create & attach lesson instructions.
        let instructions = $('<span>' + lesson.instructions + '</span>');
        $(lessonsDiv).append(instructions);

        // Create & attach reference video (iframe) and attach (if applicable).
        if (lesson.refvideo !== "") {
          let videoTag = $('<span>Consult the following video for reference:<br/><br/><iframe width="560" height="315" src="' + lesson.refvideo + '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></span>');
          $(lessonsDiv).append($(videoTag));
        }


        // Create/show student lesson.
        $(lessonsDiv).append('<h5>UPLOAD VIDEO OF LESSON</h5>');

        // Create video upload form (if student)
        let videoUpload;
        if (user.login === "student") {
          if (lesson.status !== "complete") {
            // No video uploaded yet.
            videoUpload = $('<div class="form-group">Upload your video for Tanya to review. <div class="input-group"> <div class="input-group-prepend"> <span class="input-group-text" id="inputGroupFileAddon01">Upload</span> </div> <div class="custom-file"> <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01"> <label class="custom-file-label" for="inputGroupFile01">Video of Recital</label> </div> </div> </div><div class="form-group"><textarea class="form-control rounded-0 col-form-label-sm" id="information" placeholder="Comments about video" rows="8"></textarea></div> <button type="submit" id="uploadVideo" class="btn btn-primary">Submit</button> &nbsp; <button type="submit" id="reset" class="btn btn-secondary">Reset</button>');
          } else {
            // Video uploaded
            videoUpload = $('<iframe width="560" height="315" src="' + lesson.studentVideo + '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></span> <div class="form-group"><textarea class="form-control rounded-0 col-form-label-sm" id="information" placeholder="" rows="3">Hi Tanya!  Please critique my video.  ;-) </textarea></div><button type="submit" id="uploadVideo" class="btn btn-primary">Submit</button> &nbsp; <button type="submit" id="reset" class="btn btn-secondary">Reset</button>');
          }
        } else {  // Tanya
          if (lesson.status === "complete") {
            videoUpload = $('<iframe width="560" height="315" src="' + lesson.studentVideo + '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></span><p>Hi Tanya!  Please critique my video.  ;-)</p>');
          } else {
            videoUpload = $('<p>Student has not uploaded video yet.</p>');
          }
        }
        $(lessonsDiv).append($(videoUpload));


        $(lessonsDiv).append('<h5>LESSON FEEDBACK</h5>');
        // Create feedback form (if tanya).
        let feedback;
        if (user.login === "tanya") {
          // Create feedback form group and attach to right column.
          feedback = $('<div class="form-group"><textarea class="form-control rounded-0 col-form-label-sm" id="feedback" placeholder="Add Feedback/Critique Here" rows="8">' + lesson.feedback + '</textarea></div><br/><button type="submit" id="submitFeedback" class="btn btn-primary">Submit Feedback</button> &nbsp; <button type="submit" id="reset" class="btn btn-secondary">Reset</button>');
        } else {
          // Show student feedback for lesson (if it exists).
          if (lesson.feedback !== "") {
            feedback = $('<p>' + lesson.feedback + '</p>');
          } else {
            feedback = $('<p>Tanya will provide feedback when a video is uploaded.</p>');
          }
        }
        $(lessonsDiv).append($(feedback));

        // Attach to DOM.
        $('.fill').append($(lessonsDiv));

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
   *  Displays all of the available lessons (visible only to Tanya & the student).
   *  Otherwise, show the request instruction form to everyone else.
   */
  function displayLessons() {
    // If tanya or student are authenticated, show lessons; otherwise, show request instruction form.
    let user = Account.isAuthenticated();
    if (user !== null) {
      if (user.login === 'tanya' || user.login === 'student') {
        // Tanya or student is logged in; show lessons.

        // Just in case the data isn't in local storage yet.
        verifyData();

        $('.fill').append('<h3>Available Lessons</h3>');
        // Get lesson data from local storage.
        let lessonData = JSON.parse(Storage.getData("lessons"));
        // Parse lesson data and create tag elements to attach to DOM.
        for (let i = 0; i < lessonData.length; i++) {
          let lesson = lessonData[i];

          let lessonsDiv = $('<div class="col lessons"></div> <!-- /.col -->');
          // Create & attach lesson Level.
          let level = $('<div class="level"><b>' + lesson.level + '</b>  </div>');

          if (user.login === "tanya") {
            let student = $('<span>Assigned to: <b>' + lesson.studentName + '</b></span>');
            $(level).append(student);
          }
          $(lessonsDiv).append(level);

          // Create & attach lesson title.
          let title = $('<div class="title">' + lesson.title + '</div>');
          $(lessonsDiv).append(title);

          // Create & attach lesson summary.
          let summary = $('<span>' + lesson.summary + '</span><br/>');
          $(lessonsDiv).append(summary);

          // Create & attach lesson status.
          let status;
          if (lesson.status === "complete") {
            status = $('<span> Status: <em class="statusComplete">' + lesson.status + '</em></span>');
          } else {
            status = $('<span> Status: <em class="statusNotStarted">' + lesson.status + '</em></span>');
          }
          $(lessonsDiv).append(status);

          // Create & attach link to lesson.
          let link = $('<a href="index.php?' + lesson.title.replace(/ /g, "_") + '" class="continue">View Lesson</a>');
          $(lessonsDiv).append(link);

          // Attach to DOM.
          $('.fill').append($(lessonsDiv));
        }

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
    let submit= $('<button type="submit" id="requestInstruction" class="btn btn-primary">Send Request For Instruction</button>');
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
    verifyData: verifyData,
    getLesson: getLesson,
    displayLesson: displayLesson,
    displayLessons: displayLessons
  };
})();
