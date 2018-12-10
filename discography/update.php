<!-- DISCOGRAPHY: UPDATE-->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : Discography - Update</title>
      <meta name="description" content="Tanya Anisimova's Discography" />
      <?php include '../head_include.php';?>
      <script>
        jQuery(document).ready(function(){
          // Disable form  - it doesn't do anything.
          $("button").attr("disabled","disabled");
          $("input").attr("disabled","disabled");

          // Find out what we need to update from query string.
          let queryString = window.location.search;
          queryString = queryString.replace(/\?type=/, "");
          let dataItems = queryString.split("&");
          let discographyType = dataItems[0];
          let itemToUpdate = dataItems[1];

          // For page title.
          let title;

          // Start off with songs, performance, and sheet music forms hidden & album firm visible.
          $(".subpage .fill .updateSong").addClass("hidden");
          $(".subpage .fill .updatePerformance").addClass("hidden");
          $(".subpage .fill .updateAlbum").removeClass("hidden");
          $(".subpage .fill .updateSheetMusic").addClass("hidden");

          if (discographyType === "song") {

            // Get song data to update
            let songToUpdate = Discography.getSong(itemToUpdate);

            // Populate the web form with existing song data.
            $("#songTitle").val(songToUpdate.title),
            $("#songPerformers").val(songToUpdate.performers);
            $("#albumName").val(songToUpdate.album);
            $("#trackNumber").val(songToUpdate.track);
            $("#songDuration").val(songToUpdate.duration);

            // Hide album, performance, and sheet music forms, show song form.
            $(".subpage .fill .updateSong").removeClass("hidden");
            $(".subpage .fill .updatePerformance").addClass("hidden");
            $(".subpage .fill .updateAlbum").addClass("hidden");
            $(".subpage .fill .updateSheetMusic").addClass("hidden");

            // For page title.
            title = "Song";
          }

          if (discographyType === "album") {

            // Get album data to update
            let albumToUpdate = Discography.getAlbum(itemToUpdate);

            // Populate the web form with existing album data.
            $("#albumTitle").val(albumToUpdate.title),
            $("#performers").val(albumToUpdate.performers);
            $("#composer").val(albumToUpdate.composer);
            $("#dateReleased").val(albumToUpdate.date);
            $("#genre").val(albumToUpdate.genre);
            $("#duration").val(albumToUpdate.time);
            $("#label").val(albumToUpdate.label);


            // Hide song, performance, and sheet music forms, show album form.
            $(".subpage .fill .updateSong").addClass("hidden");
            $(".subpage .fill .updatePerformance").addClass("hidden");
            $(".subpage .fill .updateAlbum").removeClass("hidden");
            $(".subpage .fill .updateSheetMusic").addClass("hidden");

            // For page title.
            title = "Album";
          }

          if (discographyType === "performance") {

            // Get performance data to update
            let performanceToUpdate = Discography.getPerformance(itemToUpdate);

            // Populate the web form with existing performance data.
            $("#performanceTitle").val(performanceToUpdate.title),
            $("#performancePerformers").val(performanceToUpdate.performers);
            $("#performanceComposer").val(performanceToUpdate.composers);
            $("#performanceDate").val(performanceToUpdate.date);
            $("#venue").val(performanceToUpdate.venue);
            $("#description").val(performanceToUpdate.description);


            // Hide album, song, and sheet music forms, show performance form.
            $(".subpage .fill .updateSong").addClass("hidden");
            $(".subpage .fill .updatePerformance").removeClass("hidden");
            $(".subpage .fill .updateAlbum").addClass("hidden");
            $(".subpage .fill .updateSheetMusic").addClass("hidden");

            // For page title.
            title = "Performance";

          }

          if (discographyType === "sheetmusic") {

            // Get sheet music data to update
            let sheetMusicToUpdate = Discography.getSheetMusic(itemToUpdate);

            // Populate the web form with existing sheet music data.
            $("#sheetMusicTitle").val(sheetMusicToUpdate.title),
            $("#sheetMusicSummary").val(sheetMusicToUpdate.summary);
            $("#price").val(sheetMusicToUpdate.price);
            $("#sheetMusicDescription").val(sheetMusicToUpdate.description);

            // Hide album, song, and sheet music forms, show sheet music form.
            $(".subpage .fill .updateSong").addClass("hidden");
            $(".subpage .fill .updatePerformance").addClass("hidden");
            $(".subpage .fill .updateAlbum").addClass("hidden");
            $(".subpage .fill .updateSheetMusic").removeClass("hidden");

            // For page title.
            title = "Sheet Music";

          }

          // Create page title & attach to DOM.
          let pageTitle = $('<h3>Update '+ title +' in Discography</h3>');
          $(".fauxNav").append($(pageTitle));

        });
      </script>
    </head>
    <body>
     <?php include '../header.php';?>


       <div class="row subpage">
          <!-- page title -->
         <div class="col-sm-4 col-xs-12 left">
          <h1>Discography</h1>
         </div>

         <nav class="col-sm-8 col-xs-12 right">
          <ul>
            <li><a href="add.php">Add</a></li>
            <li><a href="albums.php">Albums</a></li>
            <li><a href="songs.php">Songs</a></li>
            <li><a href="performances.php">Performances</a></li>
            <li><a href="sheetmusic.php">Sheet Music</a></li>
          </ul>
         </nav>

       </div> <!-- /.row -->



       <div class="row subpage">
         <!-- left side -->
         <aside class="col-sm-4 col-xs-12">
          <img src="/images/cello-dark.png" alt="Photo by Omar Khaled from Pexels."/>
         </aside>

         <!-- right side -->
         <section class="col-sm-8 col-xs-12">
           <div class="fill">
             <div class="row fauxNav">
             </div> <!--/.row -->

             <div class="row updateAlbum">

               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="albumTitle" placeholder="Album Title">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="performers" placeholder="Performer(s)">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="composer" placeholder="Composer(s)">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="dateReleased" placeholder="Date Album Released">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="label" placeholder="Album Label">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="genre" placeholder="Genre (e.g., Classical)">
                 </div>
               </div>
               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="duration" placeholder="Total Playing Time">
                 </div>

                 <div class="form-group">
                   <div class="input-group">
                     <div class="input-group-prepend">
                       <span class="input-group-text" id="inputGroupFileAddon01">Upload New</span>
                     </div>
                     <div class="custom-file">
                       <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileUpdateon01">
                       <label class="custom-file-label" for="inputGroupFile01">Album cover image</label>
                     </div>
                   </div>
                 </div>

                 <div class="form-group">
                   <div class="dropdown">
                     <button class="btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Update means of purchasing album
                     </button>
                   </div>
                 </div>

                 <div class="form-group">
                   <div class="dropdown">
                     <button class="btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Update means of listening to album
                     </button>
                   </div>
                 </div>

                 <div class="form-group">
                   <div class="dropdown">
                     <button class="btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Update a songs to album
                     </button>
                   </div>
                 </div>

                 <button type="submit" id="submit" class="btn btn-primary">Update Album</button>
                 <button type="submit" id="reset" class="btn btn-secondary">Reset</button>
               </div>
             </div> <!--/.updateAlbum-->



             <div class="row updateSong">

               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="songTitle" placeholder="Song Title">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="songPerformers" placeholder="Performer(s)">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="albumName" placeholder="Album Name">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="trackNumber" placeholder="Track Number">
                 </div>
               </div>
               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="songDuration" placeholder="Song Duration">
                 </div>

                 <div class="form-group">
                   <div class="dropdown">
                     <button class="btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Update means of purchasing song
                     </button>
                   </div>
                 </div>

                 <div class="form-group">
                   <div class="dropdown">
                     <button class="btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Update means of listening to song
                     </button>
                   </div>
                 </div>

                 <button type="submit" id="submit" class="btn btn-primary">Update Song</button>
                 <button type="submit" id="reset" class="btn btn-secondary">Reset</button>
               </div>
             </div> <!--/.updateSong-->


             <div class="row updatePerformance">

               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="performanceTitle" placeholder="Performance Title">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="performancePerformers" placeholder="Performer(s)">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="performanceComposer" placeholder="Composer(s)">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="performanceDate" placeholder="Date of Performance">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="venue" placeholder="Venue">
                 </div>


               </div>
               <div class="col-sm-6 col-xs-12">

                 <div class="form-group">
                   <textarea class="form-control rounded-0 col-form-label-sm" id="description" placeholder="Description" rows="8"></textarea>
                 </div>

                 <div class="form-group">
                   <div class="dropdown">
                     <button class="btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Add a videos of performance
                     </button>
                   </div>
                 </div>

                 <button type="submit" id="submit" class="btn btn-primary">Update Performance</button>
                 <button type="submit" id="reset" class="btn btn-secondary">Reset</button>
               </div>
             </div> <!--/.updatePerformance-->


             <div class="row updateSheetMusic">

               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="sheetMusicTitle" placeholder="Sheet Music Title">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="sheetMusicSummary" placeholder="Summary">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="price" placeholder="Price">
                 </div>
                 <div class="form-group">
                   <button class="btn-sm btn-info" type="button" aria-expanded="false">
                     Update Account At PayPal
                   </button>
                 </div>
               </div>
               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <textarea class="form-control rounded-0 col-form-label-sm" id="sheetMusicDescription" placeholder="Description" rows="8"></textarea>
                 </div>

                 <button type="submit" id="submit" class="btn btn-primary">Update Sheet Music</button>
                 <button type="submit" id="reset" class="btn btn-secondary">Reset</button>
               </div>
             </div> <!--/.updateSheetMusic-->





           </div> <!--/.fill -->
         </section>
       </div> <!-- /.row -->

      <?php include '../footer.php';?>
    </body>
  </html>