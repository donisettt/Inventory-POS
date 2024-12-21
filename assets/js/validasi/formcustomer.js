function validateForm() {
    var customer = document.forms["myForm"]["customer"].value;
    var notelp = document.forms["myForm"]["notelp"].value;
    var alamat = document.forms["myForm"]["alamat"].value;

    if (customer == "") {
        validasi('Nama Customer wajib di isi!', 'warning');
        return false;
    } else if (notelp == "") {
        validasi('Nomor Telepon wajib di isi!', 'warning');
        return false;
    } else if (alamat == "") {
        validasi('Alamat wajib di isi!', 'warning');
        return false;
    }

}

function validateFormUpdate() {
    var customer = document.forms["myFormUpdate"]["customer"].value;
    var notelp = document.forms["myFormUpdate"]["notelp"].value;
    var alamat = document.forms["myFormUpdate"]["alamat"].value;

    if (customer == "") {
        validasi('Nama Customer wajib di isi!', 'warning');
        return false;
    } else if (notelp == "") {
        validasi('Nomor Telepon wajib di isi!', 'warning');
        return false;
    } else if (alamat == "") {
        validasi('Alamat wajib di isi!', 'warning');
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