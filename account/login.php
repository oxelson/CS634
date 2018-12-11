<!-- ACCOUNT: LOGIN -->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : Account - Login </title>
      <meta name="description" content="Website Account" />
      <?php include '../head_include.php';?>
      <script>
        jQuery(document).ready(function(){

          // Authenticate user.
          $('input').keypress(function (e) {
            let key = e.which;
            if(key === 13)  {
              // the enter key code
                let login = $("#loginId").val();
                let password = $("#password").val();

                if (!Account.authenticate(login, password)) {
                  // No bueno.  Print an error message:
                  $(".error").append('Bad credentials.  Please try again.');
                } else {
                  // Clear input fields.
                $("input").val("");
                 // create links depending on authentication status.
                 createLinks();
                }
            }
          });

          // Remove any previous error messages.
          $("input").focusin(function() {
            $(".error").empty();
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

              // Disable login form.
              $("input").addClass("hidden");

              // Clear success div and span elements (this will ensure no duplicates in next steps).
              $(".success").empty();
              $(".login span").empty();
              $(".success").append("<p>Login successful!</p>");
              $(".login span").append("<p>You are logged in as <b class='noblock'>" + authenticatedUser.login + "</b></p>");


            } else {  // User NOT authenticated.

              // Clear success div and span elements.
              $(".success").empty();
              $(".login span").empty();

              // Enable login form.
              $("input").removeClass("hidden");

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
            <li id="login" class="active"><a href="login.php">Login</a></li>
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
               <h3>Login</h3>
               <div class="col-8 login">
                 <div class="error"></div><div class="success"></div><span></span>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="loginId" placeholder="Login ID">
                 </div>
                 <div class="form-group">
                   <input type="password" class="form-control col-form-label-sm" id="password" placeholder="Password">
                 </div>
               </div> <!--/.login -->
             <div> <!--/.row -->
           </div> <!-- /.fill -->
         </section>
       </div> <!-- /.row -->

      <?php include '../footer.php';?>
    </body>
  </html>
