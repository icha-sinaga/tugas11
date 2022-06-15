<?php 
include ('koneksi.php'); 
	$kasus = mysqli_query($conn,"select * from covid"); 
	while ($row = mysqli_fetch_array($kasus) ) {
		$nama_negara[] = $row['country']; 

		$query = mysqli_query($conn,"select sum(totalcases) as totalcases from covid where id_case='". $row['id_case']."'"); 
		$row = $query->fetch_array(); 
		$semuakasus[] = $row['totalcases']; 
	}
?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pie Chart</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head> 
</head>
<body>
	<br>
	<h1 style="font-display: Calibri;" "font-family: Calibri;" font align=center>Bar Chart - Total Case</h1>
	<br>
	<div class="container" align="center">
	<div id = "canvas-holder" style="width: 40%;">
		<canvas id="piechart"></canvas>
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
					label: 'Persentase Penjualan Barang'
				}],
				labels: <?php echo json_encode($nama_negara); ?>},
				options: {
					responsive: true
				}
			};
			window.onload = function(){
				var ctx = document.getElementById('piechart').getContext('2d');
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