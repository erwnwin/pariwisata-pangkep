$(document).ready(function () {
	// Mixin untuk SweetAlert2 Toast
	var Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 4000
	});

	$('#formEditInfoApp').on('submit', function (e) {
		e.preventDefault(); // Mencegah pengiriman form secara default

		// Menampilkan loader
		$('#btnLoader').show();

		$.ajax({
			url: "update", // URL endpoint untuk update
			type: "POST",
			data: $(this).serialize(), // Mengirimkan data form
			dataType: "json",
			success: function (response) {
				Toast.fire({
					icon: response.status,
					title: response.message
				});

				if (response.status === 'success') {
					setTimeout(function () {
						window.location.href = response.redirect;
					}, 2000);
				}
			},
			error: function (xhr, status, error) {
				console.error(error);
				Toast.fire({
					icon: 'error',
					title: 'An error occurred while updating data.'
				});
			},
			complete: function () {
				// Menyembunyikan loader
				$('#btnLoader').hide();
			}
		});
	});
});
