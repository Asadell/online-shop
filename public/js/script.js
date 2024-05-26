function edit(mode) {
  if (mode == 'update') {
    document.getElementById('mode').value = 'update';
    document.getElementById('form').submit();
  } else {
    Swal.fire({
      icon: 'warning',
      title: 'Konfirmasi',
      text: 'Yakin akan dihapus?',
      showCancelButton: true,
      confirmButtonText: 'Ya',
      cancelButtonText: 'Tidak',
      reverseButtons: true,
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('mode').value = 'delete';
        document.getElementById('form').submit();
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        return false;
      }
    });
  }
}

function deleteProduct(id) {
  const BASEURL = document.querySelector('html').getAttribute('data-baseurl');
  Swal.fire({
    icon: 'warning',
    title: 'Konfirmasi',
    text: 'Yakin akan dihapus?',
    showCancelButton: true,
    confirmButtonText: 'Ya',
    cancelButtonText: 'Tidak',
    reverseButtons: true,
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: 'DELETE', // Menggunakan metode DELETE
        // data: { id: id },
        url: '/admin/products/delete/' + id, // URL untuk menangani penghapusan produk
        success: function (data) {
          // Tangani respon jika penghapusan berhasil
          console.log('Produk berhasil dihapus');
          // Lakukan tindakan setelah penghapusan berhasil, misalnya:
          // window.location.href = '/desired-route';
        },
        error: function (xhr, status, error) {
          // Tangani kesalahan jika penghapusan gagal
          console.error('Gagal menghapus produk');
        },
      });
      //   $.ajax({
      //     method: 'GET',
      //     data: {'id' : this.id },
      //     url: 'delete.php',
      //     success: function(data) {
      //         // Request is successful you have the response in data
      //     }
      // })
      // $.ajax({
      //   method: 'DELETE', // Menggunakan metode DELETE
      //   url: '/admin/products/delete/' + id, // URL yang sesuai dengan rute penghapusan
      //   // success: function(data) {
      //   //     console.log('Produk berhasil dihapus');
      //   //     // Lakukan tindakan setelah penghapusan berhasil, misalnya:
      //   //     // window.location.href = '/desired-route';
      //   // },
      //   // error: function(xhr, status, error) {
      //   //     console.error('Gagal menghapus produk');
      //   // }
      // });
      // $.ajax({
      //   url: '/admin/products/delete/' + id,
      //   type: 'DELETE',
      // });
      // console.log('YO');
      // fetch('/admin/products/delete/' + id, {
      //   method: 'DELETE',
      //   headers: {
      //     'Content-Type': 'application/json', // Set header content type ke application/json
      //   },
      //   body: JSON.stringify({ id: id }),
      // });
      window.location.href = '/admin/products/delete/' + id;
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      return false;
    }
  });
}
