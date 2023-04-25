<?php 

$connect = mysqli_connect("us-cdbr-east-06.cleardb.net", "ba171451cb3d01", "869ce5b5", "heroku_4bff5e7480a2930");
$query = "SELECT * FROM bang_dathang";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
    $chart_data .= "{ Ngaymua:'".$row["Ngaymua"]."', Giaban:".$row["Giaban"].", Soluong:".$row["Soluong"]."}, ";
   }
$chart_data = substr($chart_data, 0, -2);
?>

<!DOCTYPE html>
<html>
 <head>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="card-header">
  Order Statistics Chart
   <div id="chart"></div>
  </div>
 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'Ngaymua',
 ykeys:['Giaban', 'Soluong',],
 labels:['Giaban', 'Soluong',],
 hideHover:'auto',
 stacked:true
});
</script>