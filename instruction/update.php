<!-- INSTRUCTION: UPDATE -->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : Student Instruction - Update</title>
      <meta name="description" content="Student Instruction by Tanya Anisimova" />
      <?php include '../head_include.php';?>
      <script>
        jQuery(document).ready(function(){

          // Form submit actions.
          $("#submit").click(function() {
            alert("This would submit the form and update the existing lesson.");
          });

          $("#reset").click(function() {
            alert("Clicking this button would reset the form.");
          });


          // Find out what we need to update from query string.
          let queryString = window.location.search;
          queryString = queryString.replace(/\?/, "");

          // Get lesson data to update
          let lessonToUpdate = Instruction.getLesson(queryString);

          // Populate the web form with existing lesson data.
          $("#title").val(lessonToUpdate.title),
          $("#level").val(lessonToUpdate.level);
          $("#summary").val(lessonToUpdate.summary);
          $("#sheetmusic").val(lessonToUpdate.sheetmusic);
          $("textarea").text(lessonToUpdate.instructions);


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
            <h3>Update Lesson</h3>
            <div class="row addLesson">
               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="title" placeholder="Lesson Title">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="level" placeholder="Lesson Level">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="summary" placeholder="Short Summary">
                 </div>
                 <div class="form-group">
                   <input type="url" class="form-control col-form-label-sm" id="sheetmusic" placeholder="Link to Sheet Music">
                 </div>
                 <div class="form-group">
                   <div class="input-group">
                     <div class="input-group-prepend">
                       <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                     </div>
                     <div class="custom-file">
                       <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                       <label class="custom-file-label" for="inputGroupFile01">Reference Video</label>
                     </div>
                   </div>
                 </div>

                 <div class="form-group">
                   <div class="input-group">
                     <div class="input-group-prepend">
                       <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                     </div>
                     <div class="custom-file">
                       <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                       <label class="custom-file-label" for="inputGroupFile01">Reference Image</label>
                     </div>
                   </div>
                 </div>

                 <div class="form-group">
                   <div class="dropdown">
                     <button class="btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Emma Hoster
                     </button>
                   </div>
                 </div>

               </div>
               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <textarea class="form-control rounded-0 col-form-label-sm" id="instructions" placeholder="Lesson Instructions" rows="12"></textarea>
                 </div>

                 <button type="submit" id="submit" class="btn btn-primary">Update Lesson</button>
                 <button type="submit" id="reset" class="btn btn-secondary">Reset</button>
               </div>




            </div> <!-- /.row -->
           </div> <!-- /.fill -->
         </section>
       </div> <!-- /.row -->

      <?php include '../footer.php';?>
    </body>
  </html>
