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
        type: 'DELETE',
        // data: { id: id },
        url: '/admin/products/delete/' + id,
        success: function (data) {
          console.log('Produk berhasil dihapus');
          // window.location.href = '/desired-route';
        },
        error: function (xhr, status, error) {
          console.error('Gagal menghapus produk');
        },
      });
      //   $.ajax({
      //     method: 'GET',
      //     data: {'id' : this.id },
      //     url: 'delete.php',
      //     success: function(data) {
      //     }
      // })
      // $.ajax({
      //   method: 'DELETE',
      //   url: '/admin/products/delete/' + id,
      //   // success: function(data) {
      //   //     console.log('Produk berhasil dihapus');
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
      //     'Content-Type': 'application/json',
      //   },
      //   body: JSON.stringify({ id: id }),
      // });
      window.location.href = '/admin/products/delete/' + id;
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      return false;
    }
  });
}
function deleteById(path, id) {
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
      window.location.href = path + id;
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      return false;
    }
  });
}

$(document).ready(function () {
  // console.log('yo');
  $(document).on('click', '#editAdminBtn', OpenModalPopUpEditAdminn);
  $(document).on('click', '#editCategoryBtn', OpenModalPopUpEditCategory);
});

function OpenModalPopUpEditCategory() {
  let id = $(this).closest('tr').find('.categoryId').val();
  let category = $(this).closest('tr').find('.categoryName').val();
  console.log(id);
  console.log(category);
  $('#category_Id').val(id);
  $('#category_Name').val(category);
}

function OpenModalPopUpEditAdminn() {
  console.log('yo');
  let idAdmin = $(this).closest('tr').find('.idAdmin').val();
  let nameAdmin = $(this).closest('tr').find('.nameAdmin').val();
  let emailAdmin = $(this).closest('tr').find('.emailAdmin').val();
  let phoneAdmin = $(this).closest('tr').find('.phoneAdmin').val();
  let addressAdmin = $(this).closest('tr').find('.addressAdmin').val();
  console.log(idAdmin);
  console.log(nameAdmin);
  console.log(emailAdmin);
  console.log(phoneAdmin);
  console.log(addressAdmin);
  $('#id_Admin').val(idAdmin);
  $('#name_Admin').val(nameAdmin);
  $('#email_Admin').val(emailAdmin);
  $('#phone_Admin').val(phoneAdmin);
  $('#address_Admin').val(addressAdmin);
}

// const cart = document.getElementById('#btnnCart');
const cart = document.querySelectorAll('.btnCart');
const cartMenu = document.getElementById('cart-menu');
cart.forEach(function (button) {
  button.addEventListener('click', function () {
    cartMenu.classList.toggle('hidden');
  });
});
