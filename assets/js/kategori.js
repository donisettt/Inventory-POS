$(document).ready(function() {
    $('#dtHorizontalExample').DataTable({
        "scrollX": true
    });
    $('.dataTables_length').addClass('bs-select');


});

function ambilData(id) {
    var link = $('#baseurl').val();
    var base_url = link + 'kategori/getData';

    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: base_url,
        dataType: 'json',
        success: function(hasil) {
            $('#idkategori').val(hasil[0].id_kategori);
            $('#kategori').val(hasil[0].nama_kategori);
            $('#ket').val(hasil[0].ket);

        }
    });
}

function konfirmasi(id) {
    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Hapus Data ini?",
        icon: "warning",
        closeOnClickOutside: false,
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus!',
        confirmButtonColor: '#4e73df',
        cancelButtonText: 'Batal',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: "Loading...",
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
                timer: 1000,
                showConfirmButton: false,
            }).then(
                function() {
                    window.location.href = base_url + "kategori/proses_hapus/" + id;
                }
            );
        }
    });

}