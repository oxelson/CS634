<!-- DISCOGRAPHY: ALBUMS -->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : Discography - Albums</title>
      <meta name="description" content="Tanya Anisimova's Discography" />
      <?php include '../head_include.php';?>
      <script>
        jQuery(document).ready(function(){
          // If a specific album is requested, show its data;
          // Otherwise get all of the albums to display.
          let album = window.location.search;
          if (album === "" || album === undefined || album === null) {
            // Load all the albums.
            Discography.displayAlbums();
          } else {
            // Load the requested album.
            Discography.displayAlbum(album.replace(/\?/, ''));
          }


          // Create links depending on authentication status.
          createLinks();

          /**
           * Adds links to the DOM depending on if tanya is logged in or not.
           */
          function createLinks() {

            let authenticatedUser = Account.isAuthenticated();

            // Depending on if user is authenticated.
            if (authenticatedUser.login === "tanya") { // Tanya authenticated.

              // Remove add link if it exists (this will ensure no duplicates in next step).
              $(".subpage nav ul #addItem").remove();
              // Add link to add a new discography item.
              let addItem = $('<li id="addItem"><a href="add.php">Add</a></li>');
              $(".subpage nav ul").prepend($(addItem));

            } else {  // Someone else authenticated or user NOT authenticated.
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
            <li class="active"><a href="albums.php">Albums</a></li>
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
             <h3>Albums by Tanya Anisimova</h3>
           </div> <!--/.fill -->
         </section> 
       </div> <!-- /.row -->

      <?php include '../footer.php';?>
    </body>
  </html>
