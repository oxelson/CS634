/**
 * Module for assessing and loading data needed by the website into web storage.
 *
 * @authors: Hossam Abdel-Ghaffar, Long Nguyen, & Jennifer Oxelson Ganter
 */
let Album = (function () {
  /**
   * Looks to see if album data is already in web storage, and if it
   * isn't it get the initial album data and adds to local storage.
   */
  function verifyData() {
    // Load album data into local storage if it isn't present.
    if (!Storage.isStored('albums')) {
      console.log('Initializing albums in local storage...');
      // Load the data into storage.
      getAlbumData();
    }
  }

  /**
   * Loads Album JSON Album via AJAX request and returns string version of JSON object.
   */
  function getAlbumData() {
    $.ajax({
      url: 'http://www.cs634-hur-01.designaspractice.com/js/Albums.JSON'
    }).done(function (data) {
      // Load into local storage.
      Storage.addData('albums', JSON.stringify(data.albums));
    }).fail(function (request) {
      let message = 'Unable to load album JSON data via AJAX.';
      alert(message);
      console.log(message);
    });
  }

  function displayAlbum(albumOfInterest) {
    // Get albums from local storage.
    let albums = JSON.parse(Storage.getData("albums"));
    let album;

    // Parse album data and get the requested album.
    for (let i = 0; i < albums.length; i++) {
      let a = albums[i];
      // If matches.
      if (a.cover.replace(/\.png/, '') === albumOfInterest) {
        album = a;
        break;
      }
    }
    console.log(album);
/*
      let element = $('<li></li>');
      let div = $('<div class="content"></div>');

      // Create and attach link to album.
      let link = album.cover.replace(/\.png/g, '');

      // Create and attach album cover image.
      let image = '<a href="albums.php?' + link + '"><img src="/images/' + album.cover + '" alt="' + album.title + '"/></a>';
      $(div).append($(image));
      $(div).append('<br/>');

      // Create and attach album title.
      $(div).append(album.title);
      $(div).append('<br/>');

      // Create and attach year of release.
      $(div).append(album.date);
      $(div).append('<br/><br/>');

      // Create and link to album information.
      let small = '<small><a href="albums.php?' + link + '">View album information</a></small>';
      $(div).append($(small));
      $(element).append($(div));

      $('.fill ul').append($(element));
      */
  }

  /**
   * Loads album data from local storage, parses the JSON object,
   * formats each album for display and attaches to the DOM.
   */
  function displayAlbums() {
    // Get albums from local storage.
    let albums = JSON.parse(Storage.getData("albums"));
    // Parse album data and create tag elements to attach to DOM.
    for (let i = 0; i < albums.length; i++) {
      let album = albums[i];

      let div = $('<div class="content"></div>');

      // Create and attach link to album.
      let link = album.cover.replace(/\.png/g, '');

      // Create and attach album cover image.
      let image = '<a href="albums.php?' + link + '"><img src="/images/' + album.cover + '" alt="' + album.title + '"/></a>';
      $(div).append($(image));
      $(div).append('<br/>');

      // Create and attach album title.
      $(div).append(album.title);
      $(div).append('<br/>');

      // Create and attach year of release.
      $(div).append(album.date);
      $(div).append('<br/><br/>');

      // Create and link to album information.
      let small = '<small><a href="albums.php?' + link + '">View album information</a></small>';
      $(div).append($(small));

      // Attache to DOM as unordered list.
      let list = $('<ul></ul>');
      let element = $('<li></li>');
      $(element).append($(div));
      $(list).append($(element));

      $('.fill ul').append($(list));
    }
  }



  // Expose these functions.
  return {
    verifyData: verifyData,
    displayAlbum: displayAlbum,
    displayAlbums: displayAlbums
  };
})();


