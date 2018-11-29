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

    let row = $('<div class="row"></div>');
    let albumCover = $('<div class="col-sm-3 col-xs-12 albumCover"></div> <!-- /.albumImage -->');

    // Create and attach album cover image.
    let image = '<img src="/images/' + album.cover + '" alt="' + album.title + '"/>';
    $(albumCover).append($(image));


    // Create list for displaying listen & purchase links.
    let linkList = '<ul class="links"></ul>';

    // If the album can be listened to.
    if (album.listen.length >= 1) {
      let listen = '<li><b>Listen:</b></li>';
      let iconsList = '<ul class="icons"></ul>';
      for (var icon = 0; icon < album.listen.length; icon++) {
        let element = '<li></li>';
        let iconLink = '<a href="' + album.listen.url + '"><img src="/images/' + album.listen.icon + '" alt="Listen on ' + album.listen.venue + '"></a>';
        $(element).append($(iconLink));
      }
    }
    $(element).append($(iconLink));
    // Purchase album.
    let purchase = '<li><b>Purchase:</b></li>';
    let iconsList = '<ul class="icons"></ul>';
    for (var pIcon = 0; pIcon < album.purchase.length; pIcon++) {
      let element = '<li></li>';
      let iconLink = '<a href="' + album.purchase.url + '"><img src="/images/' + album.purchase.icon + '" alt="Purchase on ' + album.purchase.venue + '"></a>';
      $(element).append($(iconLink));
    }

/*
                   <div class="row">
             <div class="col-sm-3 col-xs-12 albumCover">

               <img src="/images/bach2004-2.png" alt="">
              <ul class="links">

               <li><b>Listen:</b></li>
                <ul class="icons">
                  <li><img src="/images/apple-teal.png"></li>
                  <li><img src="/images/amazonsmile-teal.png"></li>
                </ul>
               </li>
               <li>Purchase:</li>
              </ul>


             </div> <!-- albumImage -->
             <div class="col-sm-9 col-xs-12 albumData">
              <b class="title">J.S. Bach, Cello Suites, Volume 2</b>
              Tanya Anisimova<br/><br/>


             <small class="deemp">Genre:</small> Classical<br/>
             <small class="deemp">Composer:</small> Bach<br/>
             <small class="deemp">Released:</small> 2004 <br/>
             <small class="deemp">Label:</small> Celle-stial Records<br/><br/>

              <b>Song List</b>
              <span class="deemp">20 Songs; 1 Hour 19 Minutes</span>
              <ul class="songlist">
               <li><small class="deemp">1</small> &nbsp;  Suite # 2 in D minor, BWV 1008, Improvisation  <span>12:23</span></li>
               <li><small>2</small> Prelude and Cadenza</li>
              </ul>
             </div> <!-- albumData -->

             </div> <!-- /.row -->
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



  // Expose these functions.
  return {
    verifyData: verifyData,
    displayAlbum: displayAlbum,
    displayAlbums: displayAlbums
  };
})();


