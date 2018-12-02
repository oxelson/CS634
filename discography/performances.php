<!-- DISCOGRAPHY: ALBUMS -->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : Discography - Performances</title>
      <meta name="description" content="Tanya Anisimova's Discography" />
      <?php include '../head_include.php';?>
      <script>
        jQuery(document).ready(function(){
          // If a specific performance is requested, show its data;
          // Otherwise get all of the performances to display.
          let performance = window.location.search;
          if (performance === "" || performance === undefined || performance === null) {
            // Load all the performances.
            Discography.displayPerformances();
          } else {
            // Load the requested performance.
            Discography.displayPerformance(performance.replace(/\?/, ''));
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
            <li><a href="albums.php">Albums</a></li>
            <li><a href="songs.php">Songs</a></li>
            <li class="active"><a href="performances.php">Performances</a></li>
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
             <h3>Performances by Tanya Anisimova</h3>
           </div> <!--/.fill -->
         </section>
       </div> <!-- /.row -->

      <?php include '../footer.php';?>
    </body>
  </html>
