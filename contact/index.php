<!-- CONTACT -->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : Contact</title>
      <meta name="description" content="Contact Tanya Anisimova" />
      <?php include '../head_include.php';?>
      <script>
        jQuery(document).ready(function(){
          $("button").click(function() {
            alert("This form sends a message to Tanya.");
          });
        });
      </script>
    </head>
    <body>
     <?php include '../header.php';?>

       <div class="row subpage">
          <!-- page title -->
         <div class="col-sm-5 col-xs-12 left">
          <h1>Contact Tanya</h1>
         </div>

         <nav class="col-sm-7 col-xs-12 right">
          <ul>
            <li class="active"><a href="index.php">Send Message</a></li>
            <li><a href="booking.php">Booking Request</a></li>
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
             <form>
               <div class="row">
                 <h3>Send a Message to Tanya</h3>
                 <p>Use the following form to send a private message to Tanya Anisimova.</p>
                 <div class="col-sm-6 col-xs-12">
                   <div class="form-group">
                     <input type="text" class="form-control col-form-label-sm" id="name" placeholder="Full Name">
                   </div>
                   <div class="form-group">
                     <input type="email" class="form-control col-form-label-sm" id="email" placeholder="Email Address">
                   </div>
                   <div class="form-group">
                     <input type="text" class="form-control col-form-label-sm" id="subject" placeholder="Subject">
                   </div>
                 </div>
                 <div class="col-sm-6 col-xs-12">
                   <div class="form-group">
                     <textarea class="form-control rounded-0 col-form-label-sm" id="message" placeholder="Message" rows="8"></textarea>
                   </div>
                 </div>

                 <div class="col-sm-6 col-xs-12 submit">
                   <div class="form-group recaptcha">
                     <img src="/images/check.png" alt="I am not a robot"> I am not a robot
                   </div>
                   <button type="submit" class="btn btn-primary">Send Message</button>
                 </div>
               </div> <!--/.row -->
             </form>
           </div> <!-- /.fill -->
         </section>
       </div> <!-- /.row -->

      <?php include '../footer.php';?>
    </body>
  </html>
