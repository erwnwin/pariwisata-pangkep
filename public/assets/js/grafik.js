document.addEventListener('DOMContentLoaded', function () {
	var ctx = document.getElementById('visitorChart').getContext('2d');

	var labels = json_encode(array_column($stats, 'date'));
	var data = json_encode(array_column($stats, 'count'));

	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: labels,
			datasets: [{
				label: 'Jumlah Pengunjung',
				data: data,
				borderColor: 'rgba(75, 192, 192, 1)',
				backgroundColor: 'rgba(75, 192, 192, 0.2)',
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				y: {
					beginAtZero: true
				}
			}
		}
	});
});
