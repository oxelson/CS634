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
          $("button").click(function() {
            let login = $("#login").val();
            let password = $("#password").val();

            if (!Account.authenticate(login, password)) {
              // No bueno.  Print an error message:
              $(".error").append('Bad credentials.  Please try again.');
            } else {
              // Clear input fields.
              $("input").val("");
              alert("Login successful!");

              // create links depending on authentication status.
              createLinks();
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
            // Depending on if user is authenticated.
            if (Account.isAuthenticated()) {

              // Remove update and delete links if they exist.
              $(".subpage nav ul #update").remove();
              $(".subpage nav ul #delete").remove();

              // Show links to update or delete account.
              let update = $('<li id="update"><a href="update.php">Update Account</a></li>');
              let del = $('<li id="delete"><a href="remove.php">Remove Account</a></li>');
              $(".subpage nav ul").append($(update));
              $(".subpage nav ul").append($(del));

              // Remove create link if it exists.
              $(".subpage nav ul #create").remove();
            } else {

              // Remove create link if it exists.
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
            <li class="active"><a href="login.php">Login</a></li>
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
               <h3>Login</h3>
               <div class="col-8 login">
                 <div class="error"></div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="login" placeholder="Login">
                 </div>
                 <div class="form-group">
                   <input type="password" class="form-control col-form-label-sm" id="password" placeholder="Password">
                 </div>
                 <button type="submit" class="btn btn-primary">Login</button>
               </div> <!--/.login -->
             <div> <!--/.row -->
           </div> <!-- /.fill -->
         </section>
       </div> <!-- /.row -->

      <?php include '../footer.php';?>
    </body>
  </html>
