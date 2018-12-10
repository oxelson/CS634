<!-- INSTRUCTION: PAYMENT -->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : Student Instruction - Payment</title>
      <meta name="description" content="Student Instruction by Tanya Anisimova" />
      <?php include '../head_include.php';?>
      <script>
        jQuery(document).ready(function(){

          // Form submit actions.
          $("#purchase").click(function() {
            alert("Clicking the button would take the student to the PayPal site to pay for their lessons.");
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
                let payment = $('<li class="active"><a href="payment.php">Payment</a></li>');
                $(".subpage nav ul").prepend($(payment));
                let conference = $('<li><a href="conference.php">Conference</a></li>');
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
          <img src="/images/cello-dark.png" alt="Photo by Omar Khaled from Pexels."/>
         </aside>

         <!-- right side -->
         <section class="col-sm-8 col-xs-12">
           <div class="fill">
            <h3>Lesson Payment</h3>
            <div class="row">
              <div class="col conference">
                Click on your prefered payment method:
                <p> <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/cc-badges-ppmcvdam.png" alt="Credit Card Badges" id="purchase"></p>
                <p>By participating in the Student Instruction program, the student agrees to all terms and conditions thereof, and acknowledge the following:</p>
                <ol>
                 <li>The Instructor (Tanya) may terminate this Agreement immediately, if the she determines that the continuation of the Lessons may jeopardize the health or safety of the Student.</li>
                 <li>The Instructor (Tanya) may terminate this Agreement if the Student is in breach of any term of this Agreement, and fails to rectify the breach within seven days of notice being sent.</li>
                 <li>If the Agreement is terminated before its expiry, the Instructor (Tanya) shall immediately  cease providing any further Lessons. The Instructor (Tanya) shall not be liable for any costs other than Lessons satisfactorily delivered by or before the effective date of termination.</li>
                </ol>
              </div> <!-- /.col -->
            </div> <!-- /.row -->
           </div> <!-- /.fill -->
         </section>
       </div> <!-- /.row -->

      <?php include '../footer.php';?>
    </body>
  </html>
