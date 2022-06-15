<?php 
include ('koneksi.php'); 
	$kasus = mysqli_query($conn,"select * from covid"); 
	while ($row = mysqli_fetch_array($kasus) ) {
		$nama_negara[] = $row['country']; 

		$query = mysqli_query($conn,"select totalcases, newcases, totaldeaths, newdeaths, totalrecovered, newrecovered from covid where id_case='". $row['id_case']."'"); 
		$row = $query->fetch_array(); 
		$semuakasus[] = $row['totalcases']; 
		$kasusbaru[] = $row['newcases']; 
		$totalkematian[] = $row['totaldeaths'];  
		$kematianbaru[] = $row['newdeaths']; 
		$totalsembuh[] = $row['totalrecovered']; 
		$sembubaru[] = $row['newrecovered']; 
	}
?> 

<html> 
<head>
	<title>Perbandingan Bar Chart</title>
<script type="text/javascript" src="chartjs.js"></script>
</head> 
<body>
	<br>
	<h1 style="font-display: Calibri;" "font-family: Calibri;" font align=center>Bar Chart - Tabel Covid</h1>
	<br>
	<div class="container" align="center">
	<div style="width: 800px; height: 800px">
		<canvas id="ChartBar"></canvas>
	</div> 

	<script> 
		var ctx1 = document.getElementById("ChartBar").getContext('2d'); 
		var myChart = new Chart (ctx1, { 
			type: 'bar', 
			data: { 
				labels: <?php echo json_encode($nama_negara); ?>, 
				datasets: [{
					label: 'Total Cases', 
					data: <?php echo json_encode($semuakasus);?>,

					backgroundColor: 'rgba(54, 162, 235, 0.2)',
					borderColor: 'rgba(54, 162, 235, 1)',
					borderWidth: 1
				},
				{
					label: 'New Cases', 
					data: <?php echo json_encode($kasusbaru);?>,

					backgroundColor: 'rgba(54, 162, 235, 0.2)',
					borderColor: 'rgba(54, 162, 235, 1)',
					borderWidth: 1
				},
				{
			
					label: 'Total Deaths', 
					data: <?php echo json_encode($totalkematian);?>,

					backgroundColor: 'rgba(54, 162, 235, 0.2)',
					borderColor: 'rgba(54, 162, 235, 1)',
					borderWidth: 1
				},
				{	
					label: 'New Deaths', 
					data: <?php echo json_encode($kematianbaru);?>,

					backgroundColor: 'rgba(54, 162, 235, 0.2)',
					borderColor: 'rgba(54, 162, 235, 1)',
					borderWidth: 1
				},
				{
					label: 'Total Recovered', 
					data: <?php echo json_encode($totalsembuh);?>,

					backgroundColor: 'rgba(54, 162, 235, 0.2)',
					borderColor: 'rgba(54, 162, 235, 1)',
					borderWidth: 1
				},
				{
					label: 'New Recovered', 
					data: <?php echo json_encode($sembubaru);?>,

					backgroundColor: 'rgba(54, 162, 235, 0.2)',
					borderColor: 'rgba(54, 162, 235, 1)',
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