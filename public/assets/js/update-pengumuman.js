$(document).ready(function () {

	// Kirim data form menggunakan AJAX
	$('#formEditPengumuman').on('submit', function (event) {
		event.preventDefault();
		var formData = new FormData(this);
		$.ajax({
			url: '../update',
			type: 'POST',
			data: formData,
			contentType: false,
			processData: false,
			dataType: 'json',
			beforeSend: function () {
				$('#btnLoader').show();
			},
			success: function (response) {
				$('#btnLoader').hide();
				var Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 4000
				});

				Toast.fire({
					icon: response.status,
					title: response.message
				});
				if (response.status === 'success') {
					setTimeout(function () {
						window.location.href = response.redirect;
					}, 2000);
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
				$('#btnLoader').hide();
				var Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 4000
				});
				Toast.fire({
					icon: 'error',
					title: 'An unexpected error occurred.'
				});
			}
		});
	});
});
