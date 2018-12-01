<!-- ACCOUNT: LOGIN -->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : Account - Login </title>
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
            <li class="active"><a href="login.php">Login</a></li>
            <li><a href="create.php">Create Account</a></li>
            <li><a href="update.php">Update Account</a></li>
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
               <h3>Login</h3>
               <form class="noflex">
                 <div class="col">
                  <div class="form-group">
                    <input type="email" class="form-control col-form-label-sm" id="email" placeholder="Email Address">
                  </div>
                  <div class="form-group">
                     <input type="password" class="form-control col-form-label-sm" id="password" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-primary">Login</button>
                </form>
                </div>
              </form>
             <div> <!--/.row -->
           </div> <!-- /.fill -->
         </section>
       </div> <!-- /.row -->

      <?php include '../footer.php';?>
    </body>
  </html>
