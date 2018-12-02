<!-- NEWS -->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : News & Announcements</title>
      <meta name="description" content="Tanya Anisimova's News & Announcements" />
      <?php include '../head_include.php';?>
      <script>
        jQuery(document).ready(function(){
          // If a specific news item is requested, show its data;
          // Otherwise get all of the news items to display.
          let item = window.location.search;
          if (item === "" || item === undefined || item === null) {
            // Load all the news items.
            News.displayNewsItems();
          } else {
            // Load the requested news item.
            News.displayNewsItem(item.replace(/\?/, ''));
          }
        });
      </script>
    </head>
    <body>
     <?php include '../header.php';?>

       <div class="row subpage">
          <!-- page title -->
         <div class="col-sm-7 col-xs-12 left">
          <h1>News &amp; Announcements</h1>
         </div>

         <nav class="col-sm-5 col-xs-12 right">
          <ul class="socialmedia">
            <li>
            <small>Follow Tanya: </small> &nbsp;
            <a href='https://open.spotify.com/artist/5XmzcguryovRXLUzEkBACB'><img src='/images/spotify-white.png' alt='Listen to Tanya's music on Spotify'/>
			<a href='https://vimeo.com/search?q=tanya-anisimova'><img src='/images/vimeo-white.png' alt='Watch Tanya's performances on Vimeo'/></a>
            <a href='https://www.facebook.com/TANYAANISIMOVAA'><img src='/images/facebook-white.png' alt='Follow Tanya on Facebook'/></a>
            <a href='https://www.youtube.com/channel/UCXa0NSwoFPPOeWIkVbaTeCQ'><img src='/images/youtube-white.png' alt='Watch Tanya's performances on YouTube'/></a>
            </li>

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
             <h3>Latest Updates</h3>
           </div> <!-- /.fill -->
         </section>
       </div> <!-- /.row -->

      <?php include '../footer.php';?>
    </body>
  </html>
