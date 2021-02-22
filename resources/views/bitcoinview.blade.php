<!DOCTYPE html>
<html>
<head>
<title>Bitcoin Graph</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<?php 
    $current_date = date("Y-m-d");
    $last_date = date('Y-m-d', strtotime(date("Y-m-d"). ' + 10 days'));
    ?>
<form name="form" action="bitcoinview" method="POST">
	@csrf
	 <input type="date" id="start_date" name="start_date"
	   value="<?php if(empty($start_date)){echo $current_date;} else {echo $start_date;} ?>">

	    
	  <input type="date" id="end_date" name="end_date" value="<?php if(empty($end_date)){echo $last_date;} else{echo $end_date;}?>">


	  <input type="submit" value="Render">


</form>

<p id="demo">
	
</p>
<div class="container">
	<canvas id="myChart"></canvas>
</div>


	 	<?php
	if(!empty($api_data))
	{
 		$encoded = json_encode($api_data); 
 ?>

  <script>
  	var myObj, x;

  	 var myObj = <?php echo $encoded; ?>;
  	x = myObj;
  	// console.log(x['bpi']);
  var dates = [];
  var value = [];
  	for(data in x['bpi'])
  	{
  		var dates_array = data; //Dates
  		dates.push(data);
  		value.push(x['bpi'][data]);
  	}

	// document.getElementById("demo").innerHTML = x;


	var myChart = document.getElementById("myChart").getContext("2d");
	
	
	var coinChart = new Chart(myChart, {
		type: 'line',
		data: {
			labels:dates,	
			datasets:[{
				label: 'USD',	
				data:value
				
			}]
		},
		options: {}
	});

  </script>

  <?php }?>

</body>
</html>