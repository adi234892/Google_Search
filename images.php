<!DOCTYPE html>
<html>
  <head>
    <title>Result Found</title>
    <style>
      .result{
        margin-left: 10%;
        margin-right: 25%;
        margin-top: 12px;
      }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>
      <div class="container-fluid">
        <?php
        $search=$_GET['id'];
          $con = mysqli_connect("localhost","root","");
          mysqli_select_db($con,"google");
          $q1="select * from website where site_key like '%$search%'";
          $rs1 = mysqli_query($con,$q1);
          
          while($row = mysqli_fetch_array($rs1))
          {
            echo "<a href='img/$row[5]' download><img src='img/$row[5]' height='150px' style='margin-top:15px'></a>&nbsp;&nbsp;&nbsp;&nbsp;";
          }
        ?>
        
      </div>
      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>

</html>