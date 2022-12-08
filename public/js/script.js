$(document).ready(function(){

    $('.tombolTambahData').on('click', function(){
        $('#judulModal').html('Tambah Data Buku')
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/buku/tambah');
    })

    $('.tampilModalUbah').on('click', function(){

        $('#judulModal').html('Ubah Data Buku');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/buku/ubah');
        
        //$(this) = tombol yang kita klik(.tampilModalUbah)
        const id = $(this).data('id');
        console.log(id);

        $.ajax({
            url: 'http://localhost/phpmvc/public/buku/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#judul_buku').val(data.judul_buku);
                $('#genre').val(data.genre);
                $('#pengarang').val(data.pengarang);
                $('#penerbit').val(data.penerbit);
                $('#id').val(data.id);
            }
        });

    });

});