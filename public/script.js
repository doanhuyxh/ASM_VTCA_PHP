$(document).ready(function () {
  $("#tblProduct").DataTable({
    sPaginationType: "full_numbers",
    aaSorting: [[0, "asc"]],
    iDisplayLength: 5,
    aLengthMenu: [
      [5, 10, 25, 50, 100, -1],
      [5, 10, 25, 50, 100, "All"],
    ],
  });
});


function Delete(id) {
  Swal.fire({
    title: "Bạn có chắc chắn muốn xoá sản phẩm này không?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes",
  }).then((result) => {
    if (result.value) {
      fetch(`http://localhost:81/ASM_PHP_VTCA/admin/Product/Delete?id=${id}`).then(()=>{
        window.location.reload();
      });
    }
  });
}

function Edit(id) {
  fetch(`http://localhost:81/ASM_PHP_VTCA/admin/Product/GetProductById?id=${id}`).then(res=>res.json()).then(data=>{
    $('#editProduct').modal("show");
    console.log(data);
    $("#edit_id").val(data[0]);
    $("#edit_code").val(data[1]);
    $("#edit_name").val(data[2]);
    $("#edit_cate").val(data[3]);
    $("#edit_price").val(data[4]);
    
  })
}