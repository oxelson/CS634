<!-- INSTRUCTION: REMOVE -->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : Student Instruction - Remove</title>
      <meta name="description" content="Student Instruction by Tanya Anisimova" />
      <?php include '../head_include.php';?>
      <script>
        jQuery(document).ready(function(){

          // Form submit actions.
          $("#removeButton").click(function() {
            alert("This would remove the lesson from the website.");
          });

          // Find out what we need to remove from query string.
          let queryString = window.location.search;
          queryString = queryString.replace(/\?/, "");

          // Get lesson data to remove.
          let lessonToRemove = Instruction.getLesson(queryString);

          let warningTextStart = 'Are you certain you wish to remove <i>';
          let warningTextEnd = '</i>? (This process cannot be undone.)';
          let warningText = warningTextStart + lessonToRemove.title + warningTextEnd;
          $("#warning").append(warningText);


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
              if (authenticatedUser.login === "tanya") {
                // Remove list items if they exists (this will ensure no duplicates in next step).
                $(".subpage nav ul li").remove();
                // Add list items.
                let payment = $('<li><a href="payment.php">Payment</a></li>');
                $(".subpage nav ul").prepend($(payment));
                let conference = $('<li><a href="conference.php">Conference</a></li>');
                $(".subpage nav ul").prepend($(conference));
                let chat = $('<li><a href="chat.php">Chat</a></li>');
                $(".subpage nav ul").prepend($(chat));
                let lessons = $('<li id="lessons"><a href="index.php">Lessons</a></li>');
                $(".subpage nav ul").prepend($(lessons));
                let add = $('<li><a href="add.php">Add</a></li>');
                $(".subpage nav ul").prepend($(add));
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
            <h3>Remove Lesson</h3>
            <div class="row">
               <p id="warning"></p>
               <div class="col-8 remove">
                 <button type="submit" id="removeButton" class="btn btn-danger">Remove Lesson</button>
               </div>
            </div> <!-- /.row -->
           </div> <!-- /.fill -->
         </section>
       </div> <!-- /.row -->

      <?php include '../footer.php';?>
    </body>
  </html>
