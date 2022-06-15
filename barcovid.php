<?php 
include ('koneksi.php'); 
	$kasus = mysqli_query($conn,"select * from covid"); 
	while ($row = mysqli_fetch_array($kasus) ) {
		$nama_negara[] = $row['country']; 

		$query = mysqli_query($conn,"select totalcases from covid where id_case='". $row['id_case']."'"); 
		$row = $query->fetch_array(); 
		$semuakasus[] = $row['totalcases']; 
	}
?> 

<html> 
<head>
	<title>Bar Chart</title>
<script type="text/javascript" src="chartjs.js"></script>
</head> 

<body>
		<br>
		<h1 style="font-display: Calibri;" "font-family: Calibri;" font align=center>Bar Chart - Total Case</h1>
		<br>
	<div class="container" align="center">
	<div style="width: 800px; height: 800px">
		<canvas id="ChartBar"></canvas> 
</div>
</div>
	<script> 

		var ctx = document.getElementById("ChartBar").getContext('2d'); 
		var myChart = new Chart (ctx, { 
			type: 'bar', 
			data: { 
				labels: <?php echo json_encode($nama_negara); ?>, 
				datasets: [{
					label: 'Bar Chart Covid', 
					data: <?php echo json_encode($semuakasus);?>,

					backgroundColor: 'rgba(255, 99, 132, 0.2)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				}]
			}, 
			options: { 
				scales: {
					YAxes: [{
						ticks : { 
							beginAtZero:true 
						}
					}]
				}
			} 
		});
	</script>
</body> 
</html>