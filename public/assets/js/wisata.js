$(document).ready(function () {
	var selectedFiles = [];

	function updatePreview() {
		$('#previewContainer').empty(); // Clear existing previews

		selectedFiles.forEach(function (file, index) {
			var reader = new FileReader();

			reader.onload = function (e) {
				var previewItem = $('<div class="preview-item"></div>');
				var img = $('<img>').attr('src', e.target.result);
				var removeBtn = $('<button class="remove-btn">X</button>');

				removeBtn.on('click', function () {
					selectedFiles.splice(index, 1); // Remove file from array
					updatePreview(); // Update preview
					// Re-add remaining files to input
					var dataTransfer = new DataTransfer();
					selectedFiles.forEach(function (file) {
						dataTransfer.items.add(file);
					});
					document.getElementById('gambar_detail').files = dataTransfer.files;
				});

				previewItem.append(img).append(removeBtn);
				$('#previewContainer').append(previewItem);
			}

			reader.readAsDataURL(file);
		});
	}

	$('#gambar_detail').on('change', function (event) {
		var files = event.target.files;
		if (files) {
			selectedFiles = Array.from(files); // Convert FileList to Array
			updatePreview(); // Update preview with new files
		}
	});

	$('#wisataForm').on('submit', function (event) {
		event.preventDefault();

		// Create FormData object
		var formData = new FormData();

		// Append the form data
		formData.append('nama_wisata', $('#nama_wisata').val());
		formData.append('alamat_lengkap', $('#alamat_lengkap').val());
		formData.append('latitude', $('#latitude').val());
		formData.append('longitude', $('#longitude').val());
		formData.append('kategori_id', $('#kategori_id').val());
		formData.append('deskripsi', $('#deskripsi').val());

		// Append the selected files to FormData
		selectedFiles.forEach(function (file) {
			formData.append('gambar_detail[]', file);
		});

		$('#btnLoader').show();

		$.ajax({
			url: 'store', // Pastikan URL endpoint benar
			type: 'POST',
			data: formData,
			processData: false,
			contentType: false,
			success: function (response) {
				$('#btnLoader').hide();

				// Menampilkan toast success dengan SweetAlert2
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

				// Mengosongkan nilai form setelah berhasil
				$('#wisataForm')[0].reset(); // Reset form fields
				selectedFiles = []; // Clear the file array
				$('#previewContainer').empty(); // Clear preview container

				// Redirect ke halaman wisata setelah 2 detik
				if (response.redirect) {
					setTimeout(function () {
						window.location.href = response.redirect;
					}, 2000); // Delay 2 detik sebelum redirect
				} else {
					console.error('Redirect URL is undefined'); // Debug: Jika redirect tidak ada
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				$('#btnLoader').hide();
				console.error(textStatus, errorThrown); // Debugging: Check error details

				// Menampilkan toast error dengan SweetAlert2
				var Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
				});

				Toast.fire({
					icon: 'error',
					title: 'Gagal menyimpan data: ' + errorThrown
				});
			}
		});
	});
});
