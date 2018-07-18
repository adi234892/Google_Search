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
      <form action="result.php" method="get">
        <div class="row" style="background:#F2F2F2">
          
          <div class="col-sm-3">
            <a href="search.php"><img src="img/search.png" style="margin-top:5px;"height="60px"></a>
          </div>
          
          <div class="col-sm-6" style="margin-left:15px">
            <div class="input-group" style="margin-top:10px;">
              <input type="text" class="form-control" name="search">
              <span class="input-group-btn">
              <input class="btn btn-secondary" name="search_button" type="submit" value="Go"></span>
            </div>
          </div>
        </div>
        
      </form>
    </div>
    <div class="result">
      <table style="margin-top=10px">
      <tr>
        <?php
          $con = mysqli_connect("localhost","root","");
          mysqli_select_db($con,"google");
          if(isset($_GET['search_button']))
          {
              $search = $_GET['search'];
              
              
              if($search=="")
              {
                echo "<center><b> Please write something in Search Box!</b></center>";
                exit();
              }
              $q="select * from website where site_key like '%$search%' limit 0,5";
               $rs = mysqli_query($con,$q);
                  
               if(mysqli_num_rows(mysqli_query($con,$q))<1)
                {
                  echo "<center><h4><b>Oops!!! Sorry, there is no result found to related the word. </b></h4></center>";
                  exit();
                }
                echo "<font size='+1' color='#1a1aff'> Images for $search<font>";
                
                while($row = mysqli_fetch_array($rs))
                {
                  echo "<td>
                          <table>
                            <tr>
                              <td><a target='_blank' href='images.php?id=$search'><img src='img/$row[5]' height='100px'></a> 
                              </td>
                            </tr>
                           </table>
                        </td>";
                }
          }
        ?>
      </tr>
    </table>
      <?php
    
        echo "<a target='_blank' href='images.php?id=$search'><font size='+1'  color='#1a1aff'>More Images for $search</font></a><br>";
        
        
        
         $q1="select * from website where site_key like '%$search%'";
               $rs1 = mysqli_query($con,$q1);
          while($row1 = mysqli_fetch_array($rs1))
                {
                  echo "<a href='$row1[2]'><font size='4' color='black'>$row1[1]</font></a><br>";
                  echo "<font size='3' color='#006400'> $row1[2]</font><br>";
                  echo "<font size='3' color='#666666'> $row1[4]</font><br><br>";
                }
      ?>
      <hr/>
  </div>

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>

</html>