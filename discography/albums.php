<!-- DISCOGRAPHY -->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : Discography</title>
      <meta name="description" content="Tanya Anisimova's Discography" />
      <?php include '../head_include.php';?>
      <script>
        jQuery(document).ready(function(){
          // If a specific album is requested, show its data;
          // Otherwise get all of the albums to display.
          let album = window.location.search;
          if (album === "" || album === undefined || album === null) {
            // Load all the albums.
            Album.displayAlbums();
          } else {
            // Load the requested album.
            Album.displayAlbum(album.replace(/\?/, ''));
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
            <li class="active">Albums</li>
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
             <div class="albumImage">
               <img src="/images/bach2004-2.png" alt="">
               <br/>
               <small class="deemp">Genre:</small> Classical<br/>
               <small class="deemp">Released:</small> 2004 <br/>
               <small class="deemp">Label:</small> Celle-stial Records
             </div> <!-- albumImage -->
             <div class="albumData">
              <b class="title">J.S. Bach, Cello Suites, Volume 2</b>
              Tanya Anisimova
              <ul class="links">
               <li>Listen:</li>
               <li>Purchase:</li>
              </ul>
              <b>Song List</b>
              20 Songs; 1 Hour 19 Minutes
              <ul class="songlist">
               <li>Suite # 2 in D minor, BWV 1008, Improvisation</li>
               <li>Prelude and Cadenza</li>
              </ul>
             </div> <!-- albumData -->
           </div>
         </section> 
       </div> <!-- /.row -->

      <?php include '../footer.php';?>
    </body>
  </html>
