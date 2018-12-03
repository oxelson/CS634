<!-- ACCOUNT: UPDATE -->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : Account - Update</title>
      <meta name="description" content="Website Account" />
      <?php include '../head_include.php';?>
      <script>
        jQuery(document).ready(function() {

          // Submit form.
          $("button#submit").click(function() {

            // Passwords match; Create account object.
            let account = {
              "name":  $("#name").val(),
              "address": $("#address1").val() + " " + $("#address2").val(),
              "city": $("#city").val(),
              "state": $("#state").val(),
              "postalCode": $("#postalCode").val(),
              "country": $("#country").val(),
              "login": $("#loginId").val(),
              "email": $("#email").val(),
              "password": $("#password").val(),
              "authenticated": false
            }
            // Attempt to update the account.
            if(!Account.createAccount(account)) {
              // No bueno.  Print an error message:
              $(".error").append('An account already exists with that login ID.  Please pick another.');
            } else {
               // Clear input fields.
               $("input").val("");
               alert("Account creation successful!  Please login.");
            }
          });

          // Reset form.
          $("button#reset").click(function() {
            $("input").val("");
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

              // Remove delete links if it exist.
              $(".subpage nav ul #delete").remove();

              // Show link to delete account.
              let del = $('<li id="delete"><a href="remove.php">Remove Account</a></li>');
              $(".subpage nav ul").append($(del));

              // Remove create link if it exists.
              $(".subpage nav ul #login").remove();
              // Remove create link if it exists.
              $(".subpage nav ul #create").remove();
            } else {
              // Remove create link if it exists.
              $(".subpage nav ul #login").remove();
              // Remove create link if it exists.
              $(".subpage nav ul #create").remove();

              // Show link to login.
              let login = $('<li id="login"><a href="login.php">Login</a></li>');
              $(".subpage nav ul").prepend($(login));
              // Show links to create account.
              let create = $('<li id="create"><a href="create.php">Create Account</a></li>');
              $(".subpage nav ul").append($(create));

              // Remove delete links if it exist.
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
            <li><a href="login.php">Login</a></li>
            <li><a href="create.php">Create Account</a></li>
            <li class="active"><a href="update.php">Update Account</a></li>
            <li><a href="remove.php">Remove Account</a></li>
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
               <h3>Update your Account</h3>
               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="name" placeholder="Full Name">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="address1" placeholder="Address">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="address2" placeholder="Address (Optional)">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="city" placeholder="City">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="state" placeholder="Province/State">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="postalCode" placeholder="Postal Code">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="country" placeholder="Country">
                 </div>
               </div>
               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="loginId" placeholder="Login ID">
                 </div>
                 <div class="form-group">
                   <input type="email" class="form-control col-form-label-sm" id="email" placeholder="Email Address">
                 </div>
                 <div class="form-group">
                   <input type="password" class="form-control col-form-label-sm" id="password" placeholder="Password">
                 </div>
                 <div class="error"></div>
                 <div class="form-group recaptcha">
                   <img src="/images/check.png" alt="I am not a robot"> I am not a robot
                 </div>
                 <button type="submit" id="submit" class="btn btn-primary">Login</button>
                 <button type="submit" id="reset" class="btn btn-secondary">Reset</button>
               </div>
             <div> <!--/.row -->
           </div> <!-- /.fill -->
         </section>
       </div> <!-- /.row -->


      <?php include '../footer.php';?>
    </body>
  </html>
