function proses_login() {

    var usr = $("[name='user']").val();
    var pwd = $("[name='pwd']").val();

    if (usr == "") {
        validasi('Username tidak boleh kosong!', 'warning');
        return false;
    } else if (pwd == '') {
        validasi('Password tidak boleh kosong!', 'warning');
        return false;
    } else {
        cek_user(usr, pwd);
    }

}

function cek_user(usr, pwd) {
    var link = $('#baseurl').val();
    var base_url = link + 'login/proses_login';
    $("#login").text("Loading...");

    $.ajax({
        type: 'POST',
        data: {
            user: usr,
            pwd: pwd
        },
        url: base_url,
        dataType: 'json',
        success: function(hasil) {
            if (hasil.respon == 'success') {
                pesan('Berhasil Login!', 'success', 'true');
                $("#login").text("Login");
            } else {
                pesan('Username atau password salah!', 'error', 'false');
                $("#login").text("Login");

            }
        }
    });

}

function logout() {

    var base_url = $('#baseurl').val();

    swal.fire({
        title: "Apakah Anda yakin?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: 'Ya, keluar!',
        confirmButtonColor: '#4e73df',
    }).then((result) => {
        if (result.value) {
            Swal.fire({
                title: 'Loading...',
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
            });
            window.location.href = base_url + "login/logout/";
        }
    });

}

function pesan(judul, status, boolean) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#4e73df',
        showConfirmButton: true,
    }).then((result) => {
        if (boolean == 'true') {
            Swal.fire({
                title: 'Loading...',
                onBeforeOpen: () => {
                    Swal.showLoading()
                },
            });
            location.reload(true);
        }
    });
}

function validasi(judul, status) {
    swal.fire({
        title: judul,
        icon: status,
        confirmButtonColor: '#4e73df',
    }).then((result) => {

    });
}