<?php 

include("dbcon.php");

if(isset($_POST['create']))
{
    $name     = $_POST['name'];
    $password = $_POST['pass'];
    $address  = $_POST['address'];
    $city     = $_POST['city'];

    $sql = $MySQLiconn->query("INSERT INTO gallery(name, password, address, city) VALUES('".$name."', '".$password."', '".$address."', '".$city."')"); 

    if($sql)
    { 
        echo "Thanks.";    
    }
    else
    {
        echo "Error";
    }

}

 ?>


<!DOCTYPE html>
<html lang="en">

<head>
  

  <!--  -->
  <?php require_once('headerlink/headerlink.php'); ?>
  
  <head>

<body>
  <!-- container section start -->
  <section id="container" class="">


   <?php 
    session_start();

    if(isset($_COOKIE['username']))
    {
      require_once('afterlogin.php');
    }else{
      require_once('beforelogin.php');
  }

  ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
       <div class="row">
         <div class="col-sm-6 col-md-6 col-lg-6">
           <div class="row">
             <form method="POST" action="creategallery.php"  enctype="multipart/form-data" upload_max_filesize = "5000M">
               <div class="col-sm-6">
                 <div class="form-group">
                   <label for="name">Name</label>
                   <input type="text" name="name" class="form-control" placeholder="enter name" required>
                 </div>
               </div>
               <div class="col-sm-6">
                 <div class="form-group">
                 <label for="pass">Password</label>
                 <input type="password" name="pass"class="form-control" placeholder="enter password" required>
                </div>
               </div>
               <div class="col-sm-6">
                 <div class="form-group">
                 <label for="address">Address</label>
                 <input type="text" name="address" class="form-control" placeholder="enter address" required>
                </div>
               </div>
               <div class="col-sm-6">
                 <div class="form-group">
                 <label for="city">City</label>
                 <input type="text" name="city" class="form-control" placeholder="enter city" required>
                </div>
               </div>
               <button name="create" class="btn btn-md btn-primary">Create</button>
             </form>
           </div>
         </div>


         <div class="col-sm-6 col-md-6 col-lg-6"></div>
       </div>
     </section>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
 
  <script src="js/bootstrap.min.js"></script>
 
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

</body>

</html>
