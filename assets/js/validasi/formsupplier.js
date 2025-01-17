function validateForm() {
    var supplier = document.forms["myForm"]["supplier"].value;
    var notelp = document.forms["myForm"]["notelp"].value;
    var alamat = document.forms["myForm"]["alamat"].value;

    if (supplier == "") {
        validasi('Nama Supplier tidak boleh kosong!', 'warning');
        return false;
    } else if (notelp == "") {
        validasi('Nomor Telepon tidak boleh kosong!', 'warning');
        return false;
    } else if (alamat == "") {
        validasi('Alamat tidak boleh kosong!', 'warning');
        return false;
    }

}

function validateFormUpdate() {
    var supplier = document.forms["myFormUpdate"]["supplier"].value;
    var notelp = document.forms["myFormUpdate"]["notelp"].value;
    var alamat = document.forms["myFormUpdate"]["alamat"].value;

    if (supplier == "") {
        validasi('Nama Supplier tidak boleh kosong!', 'warning');
        return false;
    } else if (notelp == "") {
        validasi('Nomor Telepon tidak boleh kosong!', 'warning');
        return false;
    } else if (alamat == "") {
        validasi('Alamat tidak boleh kosong!', 'warning');
        return false;
    }

}


function validasi(judul, status) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#4e73df',
    });
}