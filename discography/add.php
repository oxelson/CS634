<!-- DISCOGRAPHY: ADD-->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : Discography - Add</title>
      <meta name="description" content="Tanya Anisimova's Discography" />
      <?php include '../head_include.php';?>
      <script>
        jQuery(document).ready(function(){

          // Disable form  - it doesn't do anything.
          $("button").attr("disabled","disabled");
          $("input").attr("disabled","disabled");

          // Start off with songs and performance forms hidden & album firm visible.
          $(".subpage .fill .addSong").addClass("hidden");
          $(".subpage .fill .addPerformance").addClass("hidden");
          $(".subpage .fill .addAlbum").removeClass("hidden");
          //
          $(".fNav a").click(function() {
            let selected = $(this).attr("id");
            // Make song link in subNav active.
            $(".fauxNav .fNav").removeClass("fauxActive");
            $(this).parent("div").addClass("fauxActive");

            if (selected === "song") {
              // Hide album & performance forms, show song form.
              $(".subpage .fill .addSong").removeClass("hidden");
              $(".subpage .fill .addPerformance").addClass("hidden");
              $(".subpage .fill .addAlbum").addClass("hidden");

            } else if (selected === "album") {
              // Hide song & performance forms, show album form.
              $(".subpage .fill .addSong").addClass("hidden");
              $(".subpage .fill .addPerformance").addClass("hidden");
              $(".subpage .fill .addAlbum").removeClass("hidden");
            } else {
              // Hide album & song forms, show performance form.
              $(".subpage .fill .addSong").addClass("hidden");
              $(".subpage .fill .addPerformance").removeClass("hidden");
              $(".subpage .fill .addAlbum").addClass("hidden");
            }

          });


          // Create links depending on authentication status.
          createLinks();

          /**
           * Adds links to the DOM depending on if tanya is logged in or not.
           */
          function createLinks() {

            let authenticatedUser = Account.isAuthenticated();

            // Depending on if user is authenticated.
            if (!authenticatedUser.login === "tanya") { // Someone else authenticated or user NOT authenticated.
              // Remove link to add a new discography item.
              $(".subpage nav ul #addItem").remove();
            }
          }

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
            <li class="active" id="addItem"><a href="add.php">Add</a></li>
            <li><a href="albums.php">Albums</a></li>
            <li><a href="songs.php">Songs</a></li>
            <li><a href="performances.php">Performances</a></li>
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
               <h3>Add an Item to Discography</h3>
               <div class="col-sm-3 col-xs-12 fNav fauxActive">
                 <a href="#" id="album">Add Album</a>
               </div>
               <div class="col-sm-1 col-xs-12 blank">
               </div>
               <div class="col-sm-3 col-xs-12 fNav">
                 <a href="#" id="song">Add Song</a>
               </div>
               <div class="col-sm-1 col-xs-12 blank">
               </div>
               <div class="col-sm-3 col-xs-12 fNav">
                <a href="#" id="performance">Add Performance</a>
               </div>
             </div> <!--/.row -->

             <div class="row addAlbum">

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
                   <input type="text" class="form-control col-form-label-sm" id="classical" placeholder="Genre (e.g., Classical)">
                 </div>
               </div>
               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="duration" placeholder="Total Playing Time">
                 </div>

                 <div class="form-group">
                   <div class="input-group">
                     <div class="input-group-prepend">
                       <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                     </div>
                     <div class="custom-file">
                       <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                       <label class="custom-file-label" for="inputGroupFile01">Album cover image</label>
                     </div>
                   </div>
                 </div>

                 <div class="form-group">
                   <div class="dropdown">
                     <button class="btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Add means of purchasing album
                     </button>
                   </div>
                 </div>

                 <div class="form-group">
                   <div class="dropdown">
                     <button class="btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Add means of listening to album
                     </button>
                   </div>
                 </div>

                 <div class="form-group">
                   <div class="dropdown">
                     <button class="btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Add a songs to album
                     </button>
                   </div>
                 </div>

                 <button type="submit" id="submit" class="btn btn-primary">Add Album</button>
                 <button type="submit" id="reset" class="btn btn-secondary">Reset</button>
               </div>
             </div> <!--/.addAlbum-->



             <div class="row addSong">

               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="albumTitle" placeholder="Song Title">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="performers" placeholder="Performer(s)">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="album" placeholder="Album Name">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="trackNumber" placeholder="Track Number">
                 </div>
               </div>
               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="duration" placeholder="Song Duration">
                 </div>

                 <div class="form-group">
                   <div class="dropdown">
                     <button class="btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Add means of purchasing song
                     </button>
                   </div>
                 </div>

                 <div class="form-group">
                   <div class="dropdown">
                     <button class="btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Add means of listening to song
                     </button>
                   </div>
                 </div>

                 <button type="submit" id="submit" class="btn btn-primary">Add Song</button>
                 <button type="submit" id="reset" class="btn btn-secondary">Reset</button>
               </div>
             </div> <!--/.addSong-->


             <div class="row addPerformance">

               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="albumTitle" placeholder="Performance Title">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="performers" placeholder="Performer(s)">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="composer" placeholder="Composer(s)">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="date" placeholder="Date of Performance">
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

                 <button type="submit" id="submit" class="btn btn-primary">Add Performance</button>
                 <button type="submit" id="reset" class="btn btn-secondary">Reset</button>
               </div>
             </div> <!--/.addPerformance-->

           </div> <!--/.fill -->
         </section>
       </div> <!-- /.row -->

      <?php include '../footer.php';?>
    </body>
  </html>