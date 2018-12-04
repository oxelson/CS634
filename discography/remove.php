<!-- DISCOGRAPHY: REMOVE-->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : Discography - Remove</title>
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


          let warningTextStart = 'Are you certain you wish to remove <i>';
          let warningTextEnd = '</i>? (This process cannot be undone.)';
          let warningText;
          let buttonText;

          if (discographyType === "song") {
            // Get song data.
            let songToUpdate = Discography.getSong(itemToUpdate);
            // Create messages.
            warningText = warningTextStart + songToUpdate.title + warningTextEnd;
            buttonText = 'Remove Song';
          }

          if (discographyType === "album") {
            // Get album data
            let albumToUpdate = Discography.getAlbum(itemToUpdate);
            // Create messages.
            warningText = warningTextStart + albumToUpdate.title + warningTextEnd;
            buttonText = 'Remove Album';
          }

          if (discographyType === "performance") {
            // Get performance data.
            let performanceToUpdate = Discography.getPerformance(itemToUpdate);
            // Create messages.
            warningText = warningTextStart + performanceToUpdate.title + warningTextEnd;
            buttonText = 'Remove Performance';
          }

          $("#warning").append(warningText);
          $("#removeButton").append(buttonText);

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
               <h3>Remove Item From Discography</h3>
               <p id="warning"></p>
               <div class="col-8 remove">
                 <button type="submit" id="removeButton" class="btn btn-danger"></button>
               </div>
             </div> <!--/.row -->
           </div> <!--/.fill -->
         </section>
       </div> <!-- /.row -->

      <?php include '../footer.php';?>
    </body>
  </html>