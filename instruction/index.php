<!-- INSTRUCTION -->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : Student Instruction</title>
      <meta name="description" content="Student Instruction by Tanya Anisimova" />
      <?php include '../head_include.php';?>
      <script>
        jQuery(document).ready(function(){

          // If a specific lesson is requested, show its data;
          // Otherwise get all of the lessons to display.
          let lesson = window.location.search;
          if (lesson === "" || lesson === undefined || lesson === null) {
            // Load all the lessons.
           Instruction.displayLessons();
          } else {
            // Load the requested lesson.
            Instruction.displayLesson(lesson.replace(/\?/, ''));
          }

          // Form submit actions.
          $("#requestInstruction").click(function() {
            alert("Filling out this form and clicking 'Send Request For Instruction' would send the message to Tanya.");
          });
          $("#submitFeedback").click(function() {
            alert("Filling out the form and clicking 'Submit Feedback' would allow Tanya to provide feedback for the student.");
          });
          $("#uploadVideo").click(function() {
            alert("This would upload the student's video and corresponding comments to the page.");
          });

          $("#reset").click(function() {
            alert("Clicking this button would reset the form.");
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
                let conference = $('<li><a href="conference.php">Conference</a></li>');
                $(".subpage nav ul").prepend($(conference));
                let chat = $('<li><a href="chat.php">Chat</a></li>');
                $(".subpage nav ul").prepend($(chat));
                let lessons = $('<li id="lessons" class="active"><a href="index.php">Lessons</a></li>');
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

           </div> <!-- /.fill -->
         </section>
       </div> <!-- /.row -->

      <?php include '../footer.php';?>
    </body>
  </html>
