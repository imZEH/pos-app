// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
  $('#productTable').DataTable(
    { "searchable": true, "targets": [0, 3, 4, 5]}
  );
  
});
