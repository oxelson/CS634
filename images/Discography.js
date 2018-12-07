/**
 * Module for assessing and loading album data needed by the website into web storage.
 *
 * @authors: Hossam Abdel-Ghaffar, Long Nguyen, & Jennifer Oxelson Ganter
 */
let Discography = (function () {
  /**
   * Looks to see if album data is already in web storage, and if it
   * isn't get the initial album data and adds to local storage.
   */
  function verifyData() {
    // Load album data into local storage if it isn't present.
    if (!Storage.isStored('albums')) {
      console.log('Initializing albums in local storage...');
      // Load the data into storage.
      getAlbumData();
    }

    // Load performance data into local storage if it isn't present.
    if (!Storage.isStored('performances')) {
      console.log('Initializing performances in local storage...');
      // Load the data into storage.
      getPerformanceData();
    }
  }

  /**
   * Loads Album JSON via AJAX request and returns string version of JSON object.
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


  /**
   * Loads Performance JSON via AJAX request and returns string version of JSON object.
   */
  function getPerformanceData() {
    $.ajax({
      url: 'http://www.cs634-hur-01.designaspractice.com/js/Performances.JSON'
    }).done(function (data) {
      // Load into local storage.
      Storage.addData('performances', JSON.stringify(data.performances));
    }).fail(function (request) {
      let message = 'Unable to load performance JSON data via AJAX.';
      alert(message);
      console.log(message);
    });
  }


  /**
   * Loads album data from local storage, parses the JSON object,
   * formats the given album for display and attaches to the DOM.
   *
   * @param albumOfInterest  The album to display.
   */
  function displayAlbum(albumOfInterest) {

    // Just in case the data isn't in local storage yet.
    verifyData();

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

    let row = $('<div class="row"></div>');
    let albumCover = $('<div class="col-sm-3 col-xs-12 albumCover"></div> <!-- /.albumCover -->');

    // Create and attach album cover image.
    let image = $('<img src="/images/' + album.cover + '" alt="' + album.title + '"/>');
    $(albumCover).append($(image));

    // Create list for displaying listen & purchase links.
    let linkList = $('<ul class="links"></ul>');
    // If the album can be listened to.
    if (parseInt(album.listen.length) >= 1) {
      for (var q = 0; q < album.listen.length; q++) {
        let store = album.listen[q];
        let listElement = $('<li>Listen on <a href="' + store.url + '">' + store.venue + '</a></li>');
        // Add listen elements to linkList.
        $(linkList).append($(listElement));
      }

    }

    // Purchase album.
    for (var r = 0; r < album.purchase.length; r++) {
      let store = album.purchase[r];
      let element = $('<li>Purchase on <a href="' + store.url + '">' + store.store + '</a></li>');
      // Add purchase elements to linkList.
      $(linkList).append($(element));
    }

    // Add linkList to albumCover div.
    $(albumCover).append($(linkList));

    // Add albumCover to row.
    $(row).append($(albumCover));

    let albumData = $('<div class="col-sm-9 col-xs-12 albumData"></div> <!-- /.albumData -->');

    // Album title.
    let title = $('<b class="title">' + album.title + '</b>');
    $(albumData).append($(title));

    // Performers.
    let performers = $('<span>' + album.performers + '</span>');
    $(albumData).append($(performers));
    $(albumData).append('<br/><br/>');

    // Album metadata.
    let metadata = $('<small class="deemp">Genre:</small> ' + album.genre + '<br/>' +
                   '<small class="deemp">Composer:</small> ' + album.composer + '<br/>' +
                   '<small class="deemp">Released:</small> ' + album.date + '<br/>' +
                   '<small class="deemp">Label:</small> ' + album.label + '<br/><br/>');
    $(albumData).append($(metadata));

    // Song section title.
    let songSectionTitle = $('<b>Song List</b>');
    $(albumData).append($(songSectionTitle));

    // Play time.
    let playTime = $('<span class="deemp">' + album.time + '</span>');
    $(albumData).append($(playTime));

    // Song list.
    let songList = $('<ul class="songlist"></ul>');

    for (var s = 0; s < album.songs.length; s++) {
      let song = album.songs[s];
      let element = $('<li></li>');
      let songData = $('<small class="deemp">' + song.track + '</small> &nbsp; <a href="songs.php?' + album.cover.replace(/\.png/, '') + '-' + song.track + '">' + song.title + '</a><span>' + song.duration + '</span>');
      $(element).append($(songData));
      $(songList).append($(element));
    }

    // Add songList to albumData div.
    $(albumData).append($(songList));

    // Add albumData to row.
    $(row).append($(albumData));

    // Attach row to DOM.
    $('.fill').append($(row));
  }

  /**
   * Loads album data from local storage, parses the JSON object,
   * formats each album for display and attaches to the DOM.
   */
  function displayAlbums() {

    // Just in case the data isn't in local storage yet.
    verifyData();


    // Get albums from local storage.
    let albums = JSON.parse(Storage.getData("albums"));
    // Parse album data and create tag elements to attach to DOM.
    for (let i = 0; i < albums.length; i++) {
      let album = albums[i];

      let div = $('<div class="content"></div> <!-- /.content -->');

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

      $('.fill').append($(list));
    }
  }

  /**
   * Loads song data from local storage, parses the JSON object,
   * formats the given song for display and attaches to the DOM.
   *
   * @param songOfInterest  The song to display.
   */
  function displaySong(songOfInterest) {

    // Just in case the data isn't in local storage yet.
    verifyData();

    // Get the track number from the songOfInterest.
    let separator = songOfInterest.lastIndexOf('-');
    let trackNumber = songOfInterest.slice((separator + 1), songOfInterest.length);

    // Get album from the songOfInterest.
    let songAlbum = songOfInterest.slice(0, separator);

    // Get albums from local storage.
    let albums = JSON.parse(Storage.getData("albums"));

    let song;
    let album;
    // Parse album data and get the requested album.
    for (let i = 0; i < albums.length; i++) {
      let a = albums[i];
      // If album matches.
      if (a.cover.replace(/\.png/, '') === songAlbum) {
        album = a;
        break
      }
    }
    // Get the album track corresponding to the trackNumber.
    // (I'm assuming that the song data may not be in order by track number).
    for (var s = 0; s < album.songs.length; s++) {
      let track = album.songs[s].track;
      if (track === parseInt(trackNumber)) {
        song = album.songs[s];
        break;
      }
    }

    let row = $('<div class="row"></div>');
    let albumCover = $('<div class="col-sm-3 col-xs-12 albumCover"></div> <!-- /.albumCover -->');

    // Create and attach album cover image.
    let image = $('<a href="albums.php?' + songAlbum + '"><img src="/images/' + album.cover + '" alt="' + album.title + '"/></a>');
    $(albumCover).append($(image));

    // Add albumCover to row.
    $(row).append($(albumCover));

    let songData = $('<div class="col-sm-9 col-xs-12 songData"></div> <!-- /.songData -->');

    // Song title.
    let title = $('<b class="title">' + song.title + '</b>');
    $(songData).append($(title));

    // Performers.
    let performers = $('<span>' + album.performers + '</span>');
    $(songData).append($(performers));
    $(songData).append('<br/><br/>');

    // Album metadata.
    let metadata = $('<small class="deemp">Genre:</small> ' + album.genre + '<br/>' +
      '<small class="deemp">Composer:</small> ' + album.composer + '<br/>' +
      '<small class="deemp">Album:</small> <a href="albums.php?' + songAlbum + '">' + album.title + '</a> &nbsp; &bull; &nbsp; ' + album.date + '<br/>' +
      '<small class="deemp">Track number:</small> ' + song.track + '<br/>' +
      '<small class="deemp">Duration:</small> ' + song.duration + '<br/>' +
      '<small class="deemp">Lyrics:</small> none <br/>');
    $(songData).append($(metadata));

    // Add songData to row.
    $(row).append($(songData));

    // Attach row to DOM.
    $('.fill').append($(row));

    let row2 = $('<div class="row songDisplay"></div>');


    // Create list for displaying listen & purchase links.
    let linkList = $('<ul class="links"></ul>');
    // If the song can be listened to.
    if (parseInt(song.listen.length) >= 1) {
      for (var q = 0; q < song.listen.length; q++) {
        let store = song.listen[q];
        let listElement = $('<li>Listen on <a href="' + store.url + '">' + store.venue + '</a></li>');
        // Add listen elements to linkList.
        $(linkList).append($(listElement));
      }

    }

    // Purchase song.
    for (var r = 0; r < song.purchase.length; r++) {
      let store = song.purchase[r];
      let element = $('<li>Purchase on <a href="' + store.url + '">' + store.store + '</a></li>');
      // Add purchase elements to linkList.
      $(linkList).append($(element));
    }

    // Add linkList to albumCover div.
    $(row2).append($(linkList));

    // Attach row to DOM.
    $('.fill').append($(row2));
  }

  /**
   * Loads song data from local storage, parses the JSON object,
   * formats the song list for display and attaches to the DOM.
   */
  function displaySongs() {

    // Just in case the data isn't in local storage yet.
    verifyData();

    // Get albums from local storage.
    let albums = JSON.parse(Storage.getData("albums"));

    // Where we'll attach to the DOM.
    let row = $('<div class="row masterSongList"></div>');


    // Song list.
    let songList = $('<ul class="songlist"></ul>');

    // Parse album data to get the songs.
    for (let i = 0; i < albums.length; i++) {
      let album = albums[i];
      // Create and attach link to album.
      let link = album.cover.replace(/\.png/g, '');
      let albumCover = $('<a href="albums.php?' + link + '"><img src="/images/' + album.cover + '" alt="' + album.title + '"/></a><div>  <b class="noblock">' + album.title + '</b><br/>' + album.date + '&nbsp; &bull; &nbsp;' + album.label + '</div>');
      $(row).append($(albumCover));

      for (var s = 0; s < album.songs.length; s++) {
        let song = album.songs[s];
        let element = $('<li></li>');
        let songData = $('<small class="deemp">' + song.track + '</small> &nbsp; <a href="songs.php?' + album.cover.replace(/\.png/, '') + '-' + song.track + '">' + song.title + '</a><span>' + song.duration + '</span>');
        $(element).append($(songData));
        $(songList).append($(element));
      }
    }
    $(row).append($(songList));

    // Attach songList to DOM.
    $('.fill').append($(row));
  }

  /**
   * Loads performance data from local storage, parses the JSON object,
   * formats the given performance for display and attaches to the DOM.
   *
   * @param performanceOfInterest  The performance to display.
   */
  function displayPerformance(performanceOfInterest) {

    // Just in case the data isn't in local storage yet.
    verifyData();

    // Get performances from local storage.
    let performancesData = JSON.parse(Storage.getData("performances"));
    let performance = [];
    // Parse performance data and push onto performance array.
    for (let i = 0; i < performancesData.length; i++) {
      let p = performancesData[i];
      if (p.date.replace(/ /g, "-") === performanceOfInterest) {
        performance.push(p);

      }
    }
    console.log(performance);
/*
    // Create the container for the performances.
    let colDiv = $('<div class="col"></div> <!-- /.col -->');

    // Create and attach video.
    let dateTag = $('<iframe width="560" height="315" src="https://www.youtube.com/embed/N_NBA__GsKk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
    $(colDiv).append($(dateTag));


/*


      // Create and attach date span tag.
      let dateTag = $('<span class="date">' + performance.date + '</span>');
      $(colDiv).append($(dateTag));

      // Create and attach performance title.
      let titleTag = $('<b class="title">' + performance.title + '</b>');
      $(colDiv).append($(titleTag));

      // Create and attach performersTag.
      let performersTag = $('<span class="performers">' + performance.performers + '</span>');
      $(colDiv).append($(performersTag));

      // Create and attach venueTag.
      let venueTag = $('<span class="venue">' + performance.venue + '</span>');
      $(colDiv).append($(venueTag));

      // Create and attach link.
      let link = performance.date;
      link = link.replace(/ /g, "-");
      let linkTag = $('<a href="performances.php?' + link + '" class="continue">View Performance</a>');
      $(colDiv).append($(linkTag));
*/

    let performanceDiv = $('<div class="row performance"></div> <!-- /.performance -->');
    $(performanceDiv).append($(colDiv));

    $('.fill').append($(performanceDiv));

  }


  /**
   * Loads performance data from local storage, parses the JSON object,
   * formats the performance list for display and attaches to the DOM.
   */
  function displayPerformances() {

    // Just in case the data isn't in local storage yet.
    verifyData();

    // Get performances from local storage.
    let performancesData = JSON.parse(Storage.getData("performances"));
    let processed = [];
    // Parse performance data and create tag elements to attach to DOM.
    for (let i = 0; i < performancesData.length; i++) {
      let performance = performancesData[i];

      // If we've already processed this event, move on to the next one.
      if (processed.includes(performance.date)) {
        continue;
      }

      // Create the container for the performances.
      let colDiv = $('<div class="col"></div> <!-- /.col -->');

      // Create and attach date span tag.
      let dateTag = $('<span class="date">' + performance.date + '</span>');
      $(colDiv).append($(dateTag));

      // Create and attach performance title.
      let titleTag = $('<b class="title">' + performance.title + '</b>');
      $(colDiv).append($(titleTag));

      // Create and attach performersTag.
      let performersTag = $('<span class="performers">' + performance.performers + '</span>');
      $(colDiv).append($(performersTag));

      // Create and attach venueTag.
      let venueTag = $('<span class="venue">' + performance.venue + '</span>');
      $(colDiv).append($(venueTag));

      // Create and attach link.
      let link = performance.date;
      link = link.replace(/ /g, "-");
      let linkTag = $('<a href="performances.php?' + link + '" class="continue">View Performance</a>');
      $(colDiv).append($(linkTag));

      let performanceDiv = $('<div class="row performances"></div> <!-- /.performances -->');
      $(performanceDiv).append($(colDiv));

      $('.fill').append($(performanceDiv));

      // Push onto processed array.
      processed.push(performance.date);
    }
  }


    // Expose these functions.
  return {
    verifyData: verifyData,
    displayAlbum: displayAlbum,
    displayAlbums: displayAlbums,
    displaySong: displaySong,
    displaySongs: displaySongs,
    displayPerformance: displayPerformance,
    displayPerformances: displayPerformances
  };
})();


