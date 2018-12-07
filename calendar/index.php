<!-- CALENDAR -->
<!DOCTYPE HTML>
  <html>
    <head>
      <title>Tanya Anisimova : Calendar of Events</title>
      <meta name="description" content="Tanya Anisimova's Calendar of Events" />
      <?php include '../head_include.php';?>
      <script>
        jQuery(document).ready(function(){
          // If a specific event is requested, show its data;
          // Otherwise get the calendar to display.
          let event = window.location.search;
          if (event === "" || event === undefined || event === null) {
            // Load the calendar.
            Calendar.displayCalendar();
          } else {
            // Load the requested event.
            Calendar.displayEvent(event.replace(/\?/, ''));
          }
        });
      </script>
    </head>
    <body>
     <?php include '../header.php';?>

       <div class="row subpage">
          <!-- page title -->
         <div class="col-sm-5 col-xs-12 left">
          <h1>Calendar of Events</h1>
         </div>

         <nav class="col-sm-7 col-xs-12 right">
          <ul>
            <li class="active"><a href="index.php">View</a></li>
            <li><a href="subscribe.php">Subscribe</a></li>
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
             <h3>2018 Events</h3>
           </div> <!--/.fill -->
         </section>
       </div> <!-- /.row -->

      <?php include '../footer.php';?>
    </body>
  </html>
