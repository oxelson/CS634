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

            let account = {
              "name":  $("#name").val(),
              "address": $("#address").val(),
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
            let updated = Account.updateAccount(account);
            if(updated === null) {
              // No bueno.
              alert("An error occurred while updating your account information.");
            } else {
              alert("Account update successful!");
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
           * Adds links to the DOM and populate form depending on if the user is logged in or not.
           */
          function createLinks() {
            let authenticatedUser = Account.isAuthenticated();

            // Depending on if user is authenticated.
            if (authenticatedUser !== null) { // User authenticated.

              // Enable form (except login ID field).
              $("button").removeAttr("disabled");
              $("button").removeAttr("disabled");
              $("#loginId").attr("disabled", "disabled");

              // Populate the web form with existing account data.
               $("#name").val(authenticatedUser.name),
               $("#address").val(authenticatedUser.addr);
               $("#city").val(authenticatedUser.city);
               $("#state").val(authenticatedUser.state);
               $("#postalCode").val(authenticatedUser.postalCode);
               $("#country").val(authenticatedUser.country);
               $("#loginId").val(authenticatedUser.login);
               $("#email").val(authenticatedUser.email);
               $("#password").val(authenticatedUser.password);

              // Remove delete links if it exist (this will ensure no duplicates in next step).
              $(".subpage nav ul #delete").remove();
              // Show link to delete account.
              let del = $('<li id="delete"><a href="remove.php">Remove Account</a></li>');
              $(".subpage nav ul").append($(del));

              // Remove login link if it exists.
              $(".subpage nav ul #login").remove();
              // Remove create link if it exists.
              $(".subpage nav ul #create").remove();

              // Remove logout link if it exists (this will ensure no duplicates in next step).
              $(".subpage nav ul #logout").remove();
              // Add link to logout.
              let logout = $('<li id="logout"><a href="logout.php">Logout</a></li>');
              $(".subpage nav ul").prepend($(logout));


            } else {  // User NOT authenticated.

              // Shouldn't be able to fill out form if unauthenticated.
              // Clear input & disable fields
              $("input").val("");
              // Disable form.
              $("button").attr("disabled","disabled");
              $("input").attr("disabled","disabled");

              // Remove logout link if it exists.
              $(".subpage nav ul #logout").remove();

              // Remove create link if it exists (this will ensure no duplicates in next step).
              $(".subpage nav ul #login").remove();
              // Show link to login.
              let login = $('<li id="login"><a href="login.php">Login</a></li>');
              $(".subpage nav ul").prepend($(login));

              // Remove create link if it exists (this will ensure no duplicates in next step).
              $(".subpage nav ul #create").remove();
              // Show link to create account.
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
            <li class="active"><a href="update.php">Update Account</a></li>
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
               <h3>Update your Account</h3>
               <div class="update"></div>
               <div class="col-sm-6 col-xs-12">
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="name" placeholder="Full Name">
                 </div>
                 <div class="form-group">
                   <input type="text" class="form-control col-form-label-sm" id="address" placeholder="Address">
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
                   <input type="text" class="form-control col-form-label-sm" id="loginId" placeholder="Login ID" disabled>
                 </div>
                 <div class="form-group">
                   <input type="email" class="form-control col-form-label-sm" id="email" placeholder="Email Address">
                 </div>
                 <div class="form-group">
                   <input type="password" class="form-control col-form-label-sm" id="password" placeholder="Password">
                 </div>
                 <div class="error"></div>
                 <button type="submit" id="submit" class="btn btn-primary">Update</button>
                 <button type="submit" id="reset" class="btn btn-secondary">Reset</button>
               </div>
             <div> <!--/.row -->
           </div> <!-- /.fill -->
         </section>
       </div> <!-- /.row -->


      <?php include '../footer.php';?>
    </body>
  </html>
