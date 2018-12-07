<!-- NEWS: SUBSCRIBE -->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : News & Announcements - Subscribe</title>
      <meta name="description" content="Tanya Anisimova's News & Announcements" />
      <?php include '../head_include.php';?>
      <script>
        jQuery(document).ready(function(){
          // Subscribe user. Regexp from https://www.w3resource.com/javascript/form/email-validation.php
          $("button").click(function() {
            let address = $("#emailAddress").val();
             if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(address)) {
               alert("You have been subscribed to Tanya's News & Announcements.\n A welcome message has been sent to the provided address.");
             } else {
               alert("Please enter a valid email address.");
             }
          });
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
          <ul>
            <li><a href="index.php">View</a></li>
            <li class="active"><a href="subscribe.php">Subscribe</a></li>
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
             <h3>Subscribe</h3>
             <div class="socialmedia">
               <a href='https://open.spotify.com/artist/5XmzcguryovRXLUzEkBACB'><img src='/images/spotify-teal.png' alt='Listen to Tanya's music on Spotify'/>
               <a href='https://vimeo.com/search?q=tanya-anisimova'><img src='/images/vimeo-teal.png' alt='Watch Tanya's performances on Vimeo'/></a>
               <a href='https://www.facebook.com/TANYAANISIMOVAA'><img src='/images/facebook-teal.png' alt='Follow Tanya on Facebook'/></a>
               <a href='https://www.youtube.com/channel/UCXa0NSwoFPPOeWIkVbaTeCQ'><img src='/images/youtube-teal.png' alt='Watch Tanya's performances on YouTube'/></a>
             </div> <!-- /.socialmedia -->
             <p>Sign up to receive notifications about the latest news and announcements.</p>
             <div class="row subscribe">
               <div class="col">
                 <div class="form-group">
                   <input type="email" class="form-control col-form-label-sm" id="emailAddress" placeholder="Email Address">
                 </div>
                 <button type="submit" class="btn btn-primary">Subscribe</button>
               </div> <!-- /.col-8 -->
             </div> <!-- /.row -->
           </div> <!-- /.fill -->
         </section>
       </div> <!-- /.row -->

      <?php include '../footer.php';?>
    </body>
  </html>