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
