<!-- INSTRUCTION: CONFERENCE -->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : Student Instruction - Conference</title>
      <meta name="description" content="Student Instruction by Tanya Anisimova" />
      <?php include '../head_include.php';?>
      <script>
        jQuery(document).ready(function(){

          // Form submit actions.
          $("button").click(function() {
            alert("Clicking the button would launch the Zoom client and start the video conference.");
          });

          // Create links depending on authentication status.
          createLinks();

          /**
           * Adds links to the DOM depending on if tanya or student is logged in or not.
           */
          function createLinks() {

            let authenticatedUser = Account.isAuthenticated();

            // If user is authenticated.
            if (authenticatedUser !== null) {

              // Tanya or student is authenticated.
              if (authenticatedUser.login === "tanya" || authenticatedUser.login === "student") {
                // Remove list items if they exists (this will ensure no duplicates in next step).
                $(".subpage nav ul li").remove();
                // Add list items.
                let payment = $('<li><a href="payment.php">Payment</a></li>');
                $(".subpage nav ul").prepend($(payment));
                let conference = $('<li class="active"><a href="conference.php">Conference</a></li>');
                $(".subpage nav ul").prepend($(conference));
                let chat = $('<li><a href="chat.php">Chat</a></li>');
                $(".subpage nav ul").prepend($(chat));
                let lessons = $('<li id="lessons"><a href="index.php">Lessons</a></li>');
                $(".subpage nav ul").prepend($(lessons));
                if (authenticatedUser.login === "tanya") {
                  let add = $('<li><a href="add.php">Add</a></li>');
                  $(".subpage nav ul").prepend($(add));
                }
              }
            }
          }

        });
      </script>
    </head>
    <body>
     <?php include '../header.php';?>

       <div class="row subpage">
          <!-- page title -->
         <div class="col-sm-6 col-xs-12 left">
          <h1>Student Instruction</h1>
         </div>

         <nav class="col-sm-6 col-xs-12 right">
          <ul>
          </ul>
         </nav>

       </div> <!-- /.row -->



       <div class="row subpage">
         <!-- left side -->
         <aside class="col-sm-4 col-xs-12">
          <img src="/images/profile.png" alt="Photo by Ivonne Boulay."/>
         </aside>

         <!-- right side -->
         <section class="col-sm-8 col-xs-12">
           <div class="fill">
            <h3>Video Conference With Tanya</h3>
            <div class="row">
              <div class="col conference">
              <button type="submit" class="btn btn-primary submit">Start Video Conference</button>
              <p>Note: Please make sure you have the <a href="https://zoom.us/">Zoom Conferencing Client</a> installed on your system.</p>
              </div> <!-- /.col -->
            </div> <!-- /.row -->
           </div> <!-- /.fill -->
         </section>
       </div> <!-- /.row -->

      <?php include '../footer.php';?>
    </body>
  </html>
