<!-- ACCOUNT: UPDATE -->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : Account - Update</title>
      <meta name="description" content="Website Account" />
      <?php include '../head_include.php';?>
      <script>
        jQuery(document).ready(function(){
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
               <form>
                 <div class="col-6">
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
                 <div class="col-6">
                   <div class="form-group">
                     <input type="email" class="form-control col-form-label-sm" id="email" placeholder="Email Address">
                   </div>
                   <div class="form-group">
                     <input type="password" class="form-control col-form-label-sm" id="password" placeholder="Password">
                   </div>
                   <div class="form-group">
                     <input type="password" class="form-control col-form-label-sm" id="confirmpassword" placeholder="Confirm Password">
                   </div>
                   <button type="submit" class="btn btn-primary">Login</button>
                   <button type="submit" class="btn btn-secondary">Reset</button>
                 </div>
               </form>
             <div> <!--/.row -->
           </div> <!-- /.fill -->
         </section>
       </div> <!-- /.row -->


      <?php include '../footer.php';?>
    </body>
  </html>
