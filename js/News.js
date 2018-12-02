/**
 * Module for loading news & announcement data needed by the website from web storage.
 *
 * @authors: Hossam Abdel-Ghaffar, Long Nguyen, & Jennifer Oxelson Ganter
 */
let News = (function () {
  /**
   * Looks to see if news data is already in web storage, and if it
   * isn't it get the initial news data and adds to local storage.
   */
  function verifyData() {
    // Load news data into local storage if it isn't present.
    if (!Storage.isStored('news')) {
      console.log('Initializing news in local storage...');
      // Load the data into storage.
      getNewsData();
    }
  }

  /**
   * Loads News JSON via AJAX request and returns string version of JSON object.
   */
  function getNewsData() {
    $.ajax({
      url: 'http://www.cs634-hur-01.designaspractice.com/js/News.JSON'
    }).done(function (data) {
      // Load into local storage.
      Storage.addData('news', JSON.stringify(data.news));
    }).fail(function (request) {
      let message = 'Unable to load news JSON data via AJAX.';
      alert(message);
      console.log(message);
    });
  }

  /**
   * Loads news item data from local storage, parses the JSON object,
   * formats the given item for display and attaches to the DOM.
   *
   * @param itemOfInterest  The news item to display.
   */
  function displayNewsItem(itemOfInterest) {
    // Just in case the data isn't in local storage yet.
    verifyData();

    let dateFormat = itemOfInterest.replace(/-/g, " ");
    let newItem;

    // Get news from local storage & find the news item of interest.
    let newsData = JSON.parse(Storage.getData("news"));
    // Parse news data and create tag elements to attach to DOM.
    for (let i = 0; i < newsData.length; i++) {
      let news = newsData[i];
      if (news.date === dateFormat) {
        newsItem = news;
        break;
      }
    }

    // Create the container for the news image.
    let newsImage = $('<div class="col-sm-3 col-xs-12 newsImage"></div> <!-- /.newsImage -->');

    // Create image and attach to newsImage div.
    let image = $('<img src="/images/' + newsItem.image + '" alt="' + newsItem.title + '">');
    $(newsImage).append($(image));

    let newsContent = $('<div class="col-sm-9 col-xs-12 newsContent"></div> <!-- /.newsContent -->');

    // Create and attach date span tag.
    let dateTag = $('<span class="date">' + newsItem.date + '</span>');
    $(newsContent).append($(dateTag));

    // Create and attach news title.
    let titleTag = $('<b class="title">' + newsItem.title + '</b>');
    $(newsContent).append($(titleTag));

    // Create and attach full item text.
    let textTag = $('<span>' + newsItem.full + '</span>');
    $(newsContent).append($(textTag));

    if (newsItem.url !== "") {
      let linkTag = $('<a href="' + newsItem.url + '" class="continue">' + newsItem.urlText + '</a>');
      $(newsContent).append($(linkTag));
    }

    /* Attach to DOM */
    let newsDiv = $('<div class="row news"></div> <!-- /.news -->');
    $(newsDiv).append($(newsImage));
    $(newsDiv).append($(newsContent));
    $('.fill').append($(newsDiv));

  }

  /**
   * Loads news data from local storage, parses the JSON object,
   * formats each news item for display and attaches to the DOM.
   */
  function displayNewsItems() {

    // Just in case the data isn't in local storage yet.
    verifyData();

    // Get news from local storage.
    let newsData = JSON.parse(Storage.getData("news"));
    // Parse news data and create tag elements to attach to DOM.
    for (let i = 0; i < newsData.length; i++) {
      let news = newsData[i];

      // Create the container for the news items
      let colDiv = $('<div class="col"></div> <!-- /.col -->');

      // Create and attach date span tag.
      let dateTag = $('<span class="date">' + news.date + '</span>');
      $(colDiv).append($(dateTag));

      // Create and attach news title.
      let titleTag = $('<b class="title">' + news.title + '</b>');
      $(colDiv).append($(titleTag));

      // Create and attach excerpt.
      let excerptTag = $('<span>' + news.excerpt + '</span><br/>');
      $(colDiv).append($(excerptTag));

      // Create and attach link to news.
      let link = news.date;
      link = link.replace(/ /g, "-");
      let linkTag = $('<a href="index.php?' + link + '" class="continue">Continue reading</a>');
      $(colDiv).append($(linkTag));

      let newsDiv = $('<div class="row news"></div> <!-- /.news -->');
      $(newsDiv).append($(colDiv));

      $('.fill').append($(newsDiv));
    }
  }

  // Expose these functions.
  return {
    verifyData: verifyData,
    displayNewsItem: displayNewsItem,
    displayNewsItems: displayNewsItems,
  };

})();
