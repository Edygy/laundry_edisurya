function hapusMenu(url) {
    Swal.fire({
        title: "Are you sure?",
            text: "Yakin Ingin Hapus Menu?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
        if (result.value) {
            document.location.href = Url;
        }
    })
}

function hapusRole(url) {
    Swal.fire({
        title: "Are you sure?",
            text: "Yakin Ingin Hapus Role?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
        if (result.value) {
            document.location.href = Url;
        }
    })
}

function hapusSubmenu(url) {
    Swal.fire({
        title: "Are you sure?",
            text: "Yakin Ingin Hapus Submenu?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
        if (result.value) {
            document.location.href = Url;
        }
    })
}