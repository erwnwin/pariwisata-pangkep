<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        Anything you want
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="">Titik Balik Teknologi</a>.</strong>
</footer>

<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>

<script src="<?= base_url() ?>public/assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>public/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= base_url() ?>public/assets/plugins/toastr/toastr.min.js"></script>
<script src="<?= base_url() ?>public/assets/dist/js/adminlte.min.js"></script>
<script src="<?= base_url() ?>public/assets/js/kategori.js"></script>
<script src="<?= base_url() ?>public/assets/js/update-kategori.js"></script>
<script src="<?= base_url() ?>public/assets/js/pengumuman.js"></script>
<script src="<?= base_url() ?>public/assets/js/wisata.js"></script>
<script src="<?= base_url() ?>public/assets/js/update-wisata.js"></script>
<!-- <script src="<?= base_url() ?>public/assets/js/grafik.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
    $(document).ready(function() {
        $('#modalMaps').on('shown.bs.modal', function() {
            // Inisialisasi peta Leaflet dan marker di sini
            var map = L.map('map').setView([-4.804450924121607, 119.61657206135065], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
            // -4.804450924121607, 119.61657206135065
            var marker = L.marker([-4.804450924121607, 119.61657206135065], {
                draggable: true
            }).addTo(map);

            // Tambahkan event listener untuk mengupdate form input saat marker digeser
            marker.on('dragend', function(event) {
                var position = marker.getLatLng();
                document.getElementById('latitude').value = position.lat;
                document.getElementById('longitude').value = position.lng;
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('visitorChart').getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Jumlah Visitor/Pengguna Aplikasi Wisata',
                    data: [],
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
                },
                animation: {
                    duration: 500, // Duration of the animation
                    easing: 'easeInOutQuad' // Easing function for the animation
                }
            }
        });

        function updateChart() {
            $.ajax({
                url: '<?php echo base_url('dashboard/real-time'); ?>',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    var labels = data.map(function(item) {
                        return item.date;
                    });
                    var dataCount = data.map(function(item) {
                        return item.count;
                    });

                    myChart.data.labels = labels;
                    myChart.data.datasets[0].data = dataCount;

                    // Add blinking effect
                    document.getElementById('visitorChart').classList.add('blink');

                    // Remove the blinking effect after animation
                    setTimeout(function() {
                        document.getElementById('visitorChart').classList.remove('blink');
                    }, 1000); // Duration should match the CSS animation duration

                    myChart.update();
                },
                error: function() {
                    console.error('Failed to fetch data');
                }
            });
        }

        // Initial fetch
        updateChart();

        // Update the chart every 30 seconds
        setInterval(updateChart, 10000);
    });
</script>

</body>

</html>