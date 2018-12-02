/**
 * Module for assessing and loading calendar data needed by the website from web storage.
 *
 * @authors: Hossam Abdel-Ghaffar, Long Nguyen, & Jennifer Oxelson Ganter
 */
let Calendar = (function () {
  /**
   * Looks to see if calendar data is already in web storage, and if it
   * isn't get the initial calendar data and adds to local storage.
   */
  function verifyData() {
    // Load calendar data into local storage if it isn't present.
    if (!Storage.isStored('calendar')) {
      console.log('Initializing calendars in local storage...');
      // Load the data into storage.
      getCalendarData();
    }
  }

  /**
   * Loads Calendar JSON via AJAX request and returns string version of JSON object.
   */
  function getCalendarData() {
    $.ajax({
      url: 'http://www.cs634-hur-01.designaspractice.com/js/Calendar.JSON'
    }).done(function (data) {
      // Load into local storage.
      Storage.addData('calendar', JSON.stringify(data.calendar));
    }).fail(function (request) {
      let message = 'Unable to load calendar JSON data via AJAX.';
      alert(message);
      console.log(message);
    });
  }

  /**
   * Loads calendar data from local storage, parses the JSON object,
   * formats each event for display and attaches to the DOM.
   */
  function displayCalendar() {

    // Just in case the data isn't in local storage yet.
    verifyData();

    // Get calendar from local storage.
    let calendar = JSON.parse(Storage.getData("calendar"));

    // Create calendar tag.
    let calendarTag = $('<ul class="calendar"></ul> <!-- /.content -->');

    // Parse calendar data and create tag elements to attach to DOM.
    for (let i = 0; i < calendar.length; i++) {
      let event = calendar[i];
      // Create containers for data.
      let element = $('<li></li>');
      let eventDiv = $('<div class="event"></div>');

      // Create date tag & attach to eventDiv.
      let datePieces = event.date.split(" ");
      let day = datePieces[0];
      let month = datePieces[1];
      console.log(month);
      let year = datePieces[2];
      let dateTag = $('<span class="date"></span><span class="day">' + day + '</span><span class="month">' + month + '</span><span class="year">' + year + '</span></span>');
      $(eventDiv).append($(dateTag));

      // Create title tag & attach to eventDiv.
      let titleTag = $('<span class="title">' + event.title + '<span>');
      $(eventDiv).append($(titleTag));

      // Create venue tag & attach to eventDiv.
      let venueTag = $('<span class="venue">' + event.venue + '<span>');
      $(eventDiv).append($(venueTag));

      // Create link tag & attach to eventDiv.
      let link = event.date.replace(/ /g, "-");
      let linkTag = $('<a href="index.php?' + link + '" class="continue">Tickets &amp; Information</a>');
      $(eventDiv).append($(linkTag));

      // Attach to calendarTag.
      $(element).append($(eventDiv));
      $(calendarTag).append($(element));
    }

    // Attach calendarTag to DOM.
    $('.fill').append($(calendarTag));
  }

  /**
   * Loads calendar data from local storage, parses the JSON object,
   * formats the given event for display and attaches to the DOM.
   */
  function displayEvent(eventOfInterest) {
    // Just in case the data isn't in local storage yet.
    verifyData();

    // Get calendar from local storage.
    let calendar = JSON.parse(Storage.getData("calendar"));
    let event;
    // Parse calendar data and find the event of interest.
    for (let i = 0; i < calendar.length; i++) {
      let e = calendar[i];
      if (e.date.replace(/ /g, "-") === eventOfInterest) {
        event = e;
        break;
      }
    }

    // Create the container for the event image.
    let eventImage = $('<div class="col-sm-3 col-xs-12 eventImage"></div> <!-- /.eventImage -->');

    // Create image and attach to eventImage div.
    let image = $('<a href="' + event.url + '"><img src="/images/' + event.image + '" alt="' + event.title + '"></a>');
    $(eventImage).append($(image));

    // Create the container for the event content.
    let eventContent = $('<div class="col-sm-9 col-xs-12 eventContent"></div> <!-- /.eventContent -->');


    // Create and attach date span tag.
    let dateTag = $('<span class="date">' + event.date + '</span>');
    $(eventContent).append($(dateTag));

    // Create and attach news title.
    let titleTag = $('<b class="title">' + event.title + '</b>');
    $(eventContent).append($(titleTag));


    // Create and attach time span tag.
    let timeTag = $('<span class="time">' + event.time + '</span>');
    $(eventContent).append($(timeTag));

    // Create and attach venue span tag.
    let venueTag = $('<span class="venue">' + event.venue + '</span>');
    $(eventContent).append($(venueTag));


    // Create and attach ticket span tag.
    let ticketTag = $('<span class="venue">Ticket Price: ' + event.ticket + '</span>');
    $(eventContent).append($(ticketTag));


    // Create and attach description.
    let descriptionTag = $('<span>' + event.description + '</span>');
    $(eventContent).append($(descriptionTag));

    // Create and attach link tag.
    let linkTag = $('<a href="' + event.url + '" class="continue">Event Details</a>');
    $(eventContent).append($(linkTag));

    /* Attach to DOM */
    let eventDiv = $('<div class="row event"></div> <!-- /.event -->');
    $(eventDiv).append($(eventImage));
    $(eventDiv).append($(eventContent));
    $('.fill').append($(eventDiv));
  }


    // Expose these functions.
  return {
    verifyData: verifyData,
    displayCalendar: displayCalendar,
    displayEvent: displayEvent
  };
})();

