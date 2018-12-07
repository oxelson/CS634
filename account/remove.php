<!-- ACCOUNT: UPDATE -->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : Account - Remove</title>
      <meta name="description" content="Website Account" />
      <?php include '../head_include.php';?>
      <script>
        jQuery(document).ready(function(){

          // Remove account.
          $("button").click(function() {

            let authenticatedUser = Account.isAuthenticated();
            if (authenticatedUser.login === "tanya") {
              alert("You are not allowed to delete Tanya's account.  Try this feature with your own created account.  :-( ");
            } else if (authenticatedUser.login === "student") {
              alert("You are not allowed to delete the student's account.  Try this feature with your own created account.  :-( ");
            } else {
              if (!Account.removeAccount(authenticatedUser.login)) {
                // No bueno. Something went wrong with the logout operation.
                alert("Error processing account deletion request request.  :-( ");
              } else {
                alert("Account deletion successful!");
                // create links depending on authentication status.
                createLinks();
              }
            }
          });

          // create links depending on authentication status.
          createLinks();

          /**
           * Adds links to the DOM depending on if the user is logged in or not.
           */
          function createLinks() {

            let authenticatedUser = Account.isAuthenticated();

            // Depending on if user is authenticated.
            if (authenticatedUser !== null) { // User authenticated.

              // Remove update link if it exist (this will ensure no duplicates in next step).
              $(".subpage nav ul #update").remove();
              // Show links to update or delete account.
              let update = $('<li id="update"><a href="update.php">Update Account</a></li>');
              $(".subpage nav ul").append($(update));

              // Remove create link if it exists.
              $(".subpage nav ul #create").remove();

              // Remove logout link if it exists (this will ensure no duplicates in next steps).
              $(".subpage nav ul #logout").remove();
              // Show link to logout.
              let logout = $('<li id="logout"><a href="logout.php">Logout</a></li>');
              $(".subpage nav ul").prepend($(logout));

              // Enable button.
              $("button").removeAttr("disabled");

            } else {  // User NOT authenticated.

              // Disable button.
              $("button").attr("disabled", "disable");

              // Remove create link if it exists (this will ensure no duplicates in next step).
              $(".subpage nav ul #create").remove();
              // Show links to create account.
              let create = $('<li id="create"><a href="create.php">Create Account</a></li>');
              $(".subpage nav ul").append($(create));

              // Remove logout link if it exists
              $(".subpage nav ul #logout").remove();

              // Remove login link if it exists (this will ensure no duplicates in next steps).
              $(".subpage nav ul #login").remove();
              // Show link to login.
              let login = $('<li id="login"><a href="login.php">Login</a></li>');
              $(".subpage nav ul").prepend($(login));

              // Remove update and delete links if they exist.
              $(".subpage nav ul #update").remove();
            }
          }
        });
      </script>
    </head>
    <body>
     <?php include '../header.php';?>

       <div class="row subpage">
          <!-- page title -->
         <div class="col-sm-4 col-xs-12 left">
          <h1>Site Account</h1>
         </div>

         <nav class="col-sm-8 col-xs-12 right">
          <ul>
            <li class="active"><a href="remove.php">Remove Account</a></li>
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
             <div class="row">
               <h3>Remove Your Account</h3>
               <p>Are you certain you wish to remove your account? (This process cannot be undone.)</p>
               <div class="col-8 remove">
                 <button type="submit" class="btn btn-danger">Remove Account</button>
               </div>
             <div> <!--/.row -->
           </div> <!-- /.fill -->
         </section>
       </div> <!-- /.row -->

      <?php include '../footer.php';?>
    </body>
  </html>
