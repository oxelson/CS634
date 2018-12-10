<!-- SEARCH -->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : Search</title>
      <meta name="description" content="Search Tanya Anisimova's Site" />
      <?php include '../head_include.php';?>
      <script>
        jQuery(document).ready(function(){
          $("button").click(function() {
            alert("This will search Tanya's site.");
          });
        });
      </script>
    </head>
    <body>
     <?php include '../header.php';?>

       <div class="row subpage">
          <!-- page title -->
         <div class="col-sm-4 col-xs-12 left">
          <h1>Site Search</h1>
         </div>

         <nav class="col-sm-8 col-xs-12 right">
         </nav>
       </div> <!-- /.row -->



       <div class="row subpage">
         <!-- left side -->
         <aside class="col-sm-4 col-xs-12">
          <img src="/images/scroll2.png" alt="Photo from Finely Strung."/>
         </aside>

         <!-- right side -->
         <section class="col-sm-8 col-xs-12">
           <div class="fill">
             <form>
               <div class="row">
                 <h3>Search For Content</h3>

                 <div class="col-sm-8 col-xs-12 search">
                 <p>Use the following form to search Tanya Anisimova's website for content.</p>
                   <div class="form-group">
                     <input type="text" class="form-control col-form-label-sm" id="search" placeholder="Search Tanya's Site">
                   </div>
                   <div class="form-group">
                    <p>Narrow your search to specific sections of the website:</p>
                     <div class="checkbox">
                           <label><input type="checkbox" value=""> Discography</label>
                         </div>
                         <div class="checkbox">
                           <label><input type="checkbox" value=""> News</label>
                         </div>
                         <div class="checkbox disabled">
                           <label><input type="checkbox" value=""> Calendar</label>
                         </div>
                   </div>
                   <button type="submit" class="btn btn-primary">Search Site</button>
                 </div>
               </div> <!--/.row -->
             </form>
           </div> <!-- /.fill -->
         </section>
       </div> <!-- /.row -->

      <?php include '../footer.php';?>
    </body>
  </html>
