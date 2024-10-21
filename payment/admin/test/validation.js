$(document).ready(function() {
  $('#download-pdf').click(function() {
    $.ajax({
      type: 'POST',
      url: 'test/generatePDF.php',
      data: {},
      success: function(data) {
        var link = document.createElement('a');
        link.href = 'test/generatePDF.php';
        link.download = 'customer_details.pdf';
        link.click();
      }
    });
  });
});