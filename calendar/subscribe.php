<!-- CALENDAR: SUBSCRIBE -->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : Calendar of Events  Subscribe</title>
      <meta name="description" content="Tanya Anisimova's Calendar of Events" />
      <?php include '../head_include.php';?>
      <script>
        jQuery(document).ready(function(){
          // Subscribe user.
          $("button").click(function() {
            let address = $("#emailAddress").val();
             if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(address)) {
               alert("You have been subscribed to Tanya's Calendar of Events.");
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
         <div class="col-sm-5 col-xs-12 left">
          <h1>Calendar of Events</h1>
         </div>

         <nav class="col-sm-7 col-xs-12 right">
          <ul>
            <li><a href="index.php">View</a></li>
            <li class="active"><a href="subscribe.php">Subscribe</a></li>
          </ul>
         </nav>

       </div> <!-- /.row -->



       <div class="row subpage">
         <!-- left side -->
         <aside class="col-sm-4 col-xs-12">
          <img src="/images/bow.png" alt="Photo by Massimo Sartirana."/>
         </aside>

         <!-- right side -->
         <section class="col-sm-8 col-xs-12">
           <div class="fill">
             <h3>Subscribe To Calendar</h3>
             <p>Sign up to receive notifications about upcoming performances and events.</p>
             <div class="row subscribe">
               <div class="col-8">
                 <div class="form-group">
                   <input type="email" class="form-control col-form-label-sm" id="emailAddress" placeholder="Email Address">
                 </div>
                 <button type="submit" class="btn btn-primary">Subscribe</button>
               </div> <!-- /.col-8 -->
             </div> <!-- /.row -->
           </div> <!--/.fill -->
         </section>
       </div> <!-- /.row -->

      <?php include '../footer.php';?>
    </body>
  </html>
