$(document).ready(function () {
	$('#wisataEditForm').on('submit', function (event) {
		event.preventDefault(); // Mencegah pengiriman form secara default

		var formData = new FormData(this);

		$('#btnLoader').show(); // Tampilkan loader

		$.ajax({
			url: '../update', // Pastikan URL endpoint sesuai dengan method update di backend
			type: 'POST',
			data: formData,
			processData: false,
			contentType: false,
			success: function (response) {
				$('#btnLoader').hide(); // Sembunyikan loader

				var Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 4000
				});

				Toast.fire({
					icon: 'success',
					title: response.message // Pesan dari respons AJAX
				});

				// Redirect ke halaman wisata setelah 2 detik
				if (response.redirect) {
					setTimeout(function () {
						window.location.href = response.redirect;
					}, 2000); // Delay 2 detik sebelum redirect

				} else {
					var Toast = Swal.mixin({
						toast: true,
						position: 'top-end',
						showConfirmButton: false,
						timer: 4000
					});
					Toast.fire({
						icon: 'error',
						title: response.message
					});
				}
			},
			error: function (xhr, status, error) {
				$('#btnLoader').hide(); // Sembunyikan loader
				var Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 4000
				});
				Toast.fire({
					icon: 'error',
					text: 'Gagal mengirim data ke server.'
				});

			}
		});
	});
});
