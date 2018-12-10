<!-- INSTRUCTION: CHAT -->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : Student Instruction - Chat</title>
      <meta name="description" content="Student Instruction by Tanya Anisimova" />
      <?php include '../head_include.php';?>
      <script>
        jQuery(document).ready(function(){

          // Form submit actions.
          $("button").click(function() {
            alert("Filling out the message window and clicking Send would add a message to the chat window.");
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
                let chat = $('<li  class="active"><a href="chat.php">Chat</a></li>');
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
            <h3>Chat With Tanya</h3>
            <div class="row">
              <div class="chat">
               <ul class="chatMessages">
                <li class="student">
                 <span class="atTime">Emma Hoster @ 7:23pm - 7 Dec 2018</span><br/>
                   Hi Tanya!  I was wondering if you were available on December 21 for a video conference at 6pm EST?  I'm having trouble with the stretch position exercises you've assigned. I think it would be helpful to have to watch me play for a bit and give me some pointers.
                </li>
                <li class="tanya">
                 <span class="atTime">Tanya Anisimova @ 7:25pm - 7 Dec 2018</span><br/>
                   Hi Emma.  Unfortunately, I'm busy at 6pm on the 21st.  But I'm available on the 22nd?  Would that work for you?
                </li>
                <li class="student">
                 <span class="atTime">Emma Hoster @ 8:05pm - 7 Dec 2018</span><br/>
                   Yes!  That would be fine.  Thank you!
                </li>
                <li class="tanya">
                 <span class="atTime">Tanya Anisimova @ 8:12pm - 7 Dec 2018</span><br/>
                   Sounds good Emma.  You're doing very well and we'll get this problem tackled.
                </li>
               </ul>
               <div class="form-group">
                <textarea class="form-control rounded-0 col-form-label-sm" id="message" placeholder="Type your message here" rows="2"></textarea>
               </div>
               <button type="submit" class="btn btn-primary submit">Send</button>
              </div> <!-- /.chat -->
            </div> <!-- /.row -->
           </div> <!-- /.fill -->
         </section>
       </div> <!-- /.row -->

      <?php include '../footer.php';?>
    </body>
  </html>
