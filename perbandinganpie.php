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

<!DOCTYPE html> 
<html> 
<head>
	<title>Membuat Grafik Menggunakan Chart JS</title>
<script type="text/javascript" src="chartjs.js"></script></head> 
<body>
	<br>
	<h1 style="font-display: Calibri;" "font-family: Calibri;" font align=center>Pie Chart - Table Covid</h1>
	<br>
	<div class="container" align="center">
	<div style="width: 800px; height: 800px">
		<canvas id="ChartPie"></canvas>
	</div> 
<script>
		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data:<?php echo json_encode($semuakasus); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(0, 255, 254, 0.2)',
					'rgba(115, 255, 216, 0.2)',
					'rgba(210, 105, 30, 0.2)',
					'rgba(128, 0, 128, 0.2)',
					'rgba(0, 0, 205, 0.2)',
					'rgba(40, 178, 170, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(0, 255, 254, 1)',
					'rgba(115, 255, 216, 1)',
					'rgba(210, 105, 30, 1)',
					'rgba(128, 0, 128, 1)',
					'rgba(0, 0, 205, 1)',
					'rgba(40, 178, 170, 1)'
					],
					label: 'Total Case'
				},
				{
					data:<?php echo json_encode($kasusbaru); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(0, 255, 254, 0.2)',
					'rgba(115, 255, 216, 0.2)',
					'rgba(210, 105, 30, 0.2)',
					'rgba(128, 0, 128, 0.2)',
					'rgba(0, 0, 205, 0.2)',
					'rgba(40, 178, 170, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(0, 255, 254, 1)',
					'rgba(115, 255, 216, 1)',
					'rgba(210, 105, 30, 1)',
					'rgba(128, 0, 128, 1)',
					'rgba(0, 0, 205, 1)',
					'rgba(40, 178, 170, 1)'
					],
					label: 'Total Case'
				},
				{
					data:<?php echo json_encode($totalkematian); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(0, 255, 254, 0.2)',
					'rgba(115, 255, 216, 0.2)',
					'rgba(210, 105, 30, 0.2)',
					'rgba(128, 0, 128, 0.2)',
					'rgba(0, 0, 205, 0.2)',
					'rgba(40, 178, 170, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(0, 255, 254, 1)',
					'rgba(115, 255, 216, 1)',
					'rgba(210, 105, 30, 1)',
					'rgba(128, 0, 128, 1)',
					'rgba(0, 0, 205, 1)',
					'rgba(40, 178, 170, 1)'
					],
					label: 'Total Case'
				},
				{
					data:<?php echo json_encode($kematianbaru); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(0, 255, 254, 0.2)',
					'rgba(115, 255, 216, 0.2)',
					'rgba(210, 105, 30, 0.2)',
					'rgba(128, 0, 128, 0.2)',
					'rgba(0, 0, 205, 0.2)',
					'rgba(40, 178, 170, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(0, 255, 254, 1)',
					'rgba(115, 255, 216, 1)',
					'rgba(210, 105, 30, 1)',
					'rgba(128, 0, 128, 1)',
					'rgba(0, 0, 205, 1)',
					'rgba(40, 178, 170, 1)'
					],
					label: 'Total Case'
				},
				{
					data:<?php echo json_encode($totalsembuh); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(0, 255, 254, 0.2)',
					'rgba(115, 255, 216, 0.2)',
					'rgba(210, 105, 30, 0.2)',
					'rgba(128, 0, 128, 0.2)',
					'rgba(0, 0, 205, 0.2)',
					'rgba(40, 178, 170, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(0, 255, 254, 1)',
					'rgba(115, 255, 216, 1)',
					'rgba(210, 105, 30, 1)',
					'rgba(128, 0, 128, 1)',
					'rgba(0, 0, 205, 1)',
					'rgba(40, 178, 170, 1)'
					],
					label: 'Total Case'
				},
				{
					data:<?php echo json_encode($sembubaru); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(0, 255, 254, 0.2)',
					'rgba(115, 255, 216, 0.2)',
					'rgba(210, 105, 30, 0.2)',
					'rgba(128, 0, 128, 0.2)',
					'rgba(0, 0, 205, 0.2)',
					'rgba(40, 178, 170, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(0, 255, 254, 1)',
					'rgba(115, 255, 216, 1)',
					'rgba(210, 105, 30, 1)',
					'rgba(128, 0, 128, 1)',
					'rgba(0, 0, 205, 1)',
					'rgba(40, 178, 170, 1)'
					],
					label: 'Total Case'
				}],
				labels: <?php echo json_encode($nama_negara); ?>},
				options: {
					responsive: true
				}
			};
			window.onload = function(){
				var ctx = document.getElementById('ChartPie').getContext('2d');
				window.myPie = new Chart(ctx, config);
			};

			document.getElementById('RandomizeData').addEventListener('click', function(){
				config.data.datasets.foreach(function(datasets){
					dataset.data = dataset.data.map(function() {
						return randomScalingFactor();
					});
				});
				window.myPie.update();
			});
			var colorNames = Object.keys(window.ChartColors);
			document.getElementById('addDataset').addEventListener('click', function(){
				var newDataset = {
					backgroundColor: [],
					data: [],
					label: 'New dataset' + config.data.datasets.length,
				};
				for (var index = 0; index < config.data.labels.length; ++ index) {
					newDataset.data.push(randomScalingFactor());

					var ColorName = colorNames[index % colorNames.length];
					var NewColor = window.chartColors[colorName];
					newDataset.backgroundColor.push(newColor);
				}

				config.data.datasets.push(newDataset);
				window.myPie.update();
			});

			document.getElementById('removeDataset').addEventListener('click', function() {
				config.data.datasets.splice(0,1);
				window.myPie.update();
			});
	</script>
</body>
</html>