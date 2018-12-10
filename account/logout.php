<!-- ACCOUNT: LOGOUT -->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : Account - Logout </title>
      <meta name="description" content="Website Account" />
      <?php include '../head_include.php';?>
      <script>
        jQuery(document).ready(function(){

          // Log the user out.
          if (Account.logout()) {
            // No bueno. Something went wrong with the logout operation.
            alert("Error processing logout request.  :-( ");
          } else {
            // create links depending on authentication status.
            createLinks();
          }

          // create links depending on authentication status.
          createLinks();

          /**
           * Adds links to the DOM depending on if the user is logged in or not.
           */
          function createLinks() {

            let authenticatedUser = Account.isAuthenticated();

            // Depending on if user is authenticated.
            if (authenticatedUser !== null) { // User authenticated.

              // Remove update and delete links if they exist (this will ensure no duplicates in next steps).
              $(".subpage nav ul #update").remove();
              $(".subpage nav ul #delete").remove();
              // Show links to update or delete account.
              let update = $('<li id="update"><a href="update.php">Update Account</a></li>');
              let del = $('<li id="delete"><a href="remove.php">Remove Account</a></li>');
              $(".subpage nav ul").append($(update));
              $(".subpage nav ul").append($(del));

              // Remove create link if it exists.
              $(".subpage nav ul #create").remove();

            } else {  // User NOT authenticated.

              // Clear success div and span elements (this will ensure no duplicates in next steps).
              $(".success").empty();
              $(".logout span").empty();
              $(".success").append("<p>You have been logged out.</p>");
              $(".logout span").append("<p>You will be redirected to the home page in a few seconds.</p>");
              setTimeout(function () {
                window.location.replace("/");
              }, 3000);

              // Remove create link if it exists (this will ensure no duplicates in next step).
              $(".subpage nav ul #create").remove();
              // Show links to create account.
              let create = $('<li id="create"><a href="create.php">Create Account</a></li>');
              $(".subpage nav ul").append($(create));

              // Remove update and delete links if they exist.
              $(".subpage nav ul #update").remove();
              $(".subpage nav ul #delete").remove();
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
            <li class="active"><a href="logout.php">Logout</a></li>
          </ul>
         </nav>

       </div> <!-- /.row -->



       <div class="row subpage">
         <!-- left side -->
         <aside class="col-sm-4 col-xs-12">
          <img src="/images/bow2.png" alt="Photo from European Violins."/>
         </aside>

         <!-- right side -->
         <section class="col-sm-8 col-xs-12">
           <div class="fill">
             <div class="row">
               <h3>Logout</h3>
               <div class="col-8 logout">
                 <div class="success"></div><span></span>
               </div> <!--/.login -->
             <div> <!--/.row -->
           </div> <!-- /.fill -->
         </section>
       </div> <!-- /.row -->

      <?php include '../footer.php';?>
    </body>
  </html>