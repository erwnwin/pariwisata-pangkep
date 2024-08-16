$(document).ready(function() {

    $("#gambarP").change(function(){
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#imagePreview').attr('src', e.target.result);
                $('#imagePreviewContainer').show();
                $('#removeImage').show(); // Show remove option
            }

            reader.readAsDataURL(input.files[0]);
        }
    });

    // Function to remove image preview
    $('#removeImage').click(function() {
        $('#gambarP').val(''); // Clear input file
        $('#imagePreview').attr('src', '');
        $('#imagePreviewContainer').hide();
        $('#removeImage').hide(); // Hide remove option again
    });


    $('#formPengumuman').submit(function(e) {
        e.preventDefault(); // Prevent form submission

        var formData = new FormData(this);

        // Menampilkan loader
        $('#btnLoader').show();

        // Melakukan AJAX request
        $.ajax({
            url: 'store', // URL dari method store di controller Jastip
            type: 'POST', // Metode HTTP
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            cache: false,


            // Sukses ketika permintaan berhasil
            success: function(response) {
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
                $('#judul_pengumuman').val('');
                $('#deskripsi').val('');
                $('#gambarP').val('');

                  // Redirect ke halaman jasa-titip setelah 3 detik
                  setTimeout(function() {
                    window.location.href = response.redirect;
                }, 2000); // Delay 3 detik sebelum redirect
            },

            // Gagal ketika permintaan gagal
            error: function(xhr, status, error) {
                $('#btnLoader').hide();
                console.error(xhr.responseText);
            
                // Menampilkan toast error dengan SweetAlert2
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
            
                Toast.fire({
                    icon: 'error',
                    title: 'Gagal menyimpan data: ' + xhr.responseText
                });
            }
        });
    });

});