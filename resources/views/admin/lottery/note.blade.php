{{-- ok --}}

{{-- confirm ok --}}
  <script>
$(document).ready(function () {
  // Function to handle the AJAX request
  function storeLotteryTicket() {
    // Get form data
    var formData = new FormData($("#fileupload")[0]);

    $.ajax({
      url: "{{ route('admin.lotteries.store') }}", // Replace with your route URL
      type: "POST",
      data: formData,
      processData: false, // Prevent jQuery from processing the data
      contentType: false, // Prevent jQuery from setting content type
      success: function (response) {
        // Handle success response here
        console.log(response);
        // Redirect or display a success message to the user
      },
      error: function (xhr, status, error) {
        // Handle error response here
        console.error(xhr.responseText);
        // Display an error message to the user
      },
    });
  }

  // Initialize the file upload plugin
  $('#fileupload').fileupload({
    url: '{{ route('admin.lotteries.store') }}', // Replace with your route URL
    dataType: 'json', // Set the expected response type
    sequentialUploads: true, // Upload files sequentially
    formData: function (form) {
      // Include all form data
      return form.serializeArray();
    },
    done: function (e, data) {
      // Handle success response here
      console.log(data.result);
      // Redirect or display a success message to the user
    },
    fail: function (e, data) {
      // Handle error response here
      console.error('Upload failed:', data.errorThrown);
      // Display an error message to the user
    },
  });

  // You can remove the previous form submission code
  $('#fileupload').on('submit', function (e) {
    e.preventDefault(); // Prevent default form submission
  });

  // Bind click event to form submission button
  $("#fileupload").on("submit", function (e) {
    e.preventDefault(); // Prevent default form submission
    storeLotteryTicket(); // Call the AJAX function
  });
});

var handleRenderjQueryFileUpload = function () {
  $("#fileupload").fileupload({
    previewMaxHeight: 80,
    previewMaxWidth: 220,
    url: "{{ route('admin.lotteries.store') }}",
    disableImageResize: /Android(?!.*Chrome)|Opera/.test(
      window.navigator.userAgent
    ),
    maxFileSize: 50 * 1024 * 1024, // 50MB in bytes
    acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
  });
  $("#fileupload").on("fileuploadchange", function (e, data) {
    $("#fileupload .empty-row").hide();
  });
  $("#fileupload").on("fileuploadfail", function (e, data) {
    if (data.errorThrown === "abort") {
      if ($("#fileupload .files tr").not(".empty-row").length == 1) {
        $("#fileupload .empty-row").show();
      }
    }
  });

  if ($.support.cors) {
    $.ajax({
      url: "{{ route('admin.lotteries.store') }}", // Check if this URL is correct
      type: "HEAD",
    }).fail(function () {
      var alert =
        '<div class="alert alert-danger m-b-0 m-t-15">Upload server currently unavailable - ' +
        new Date() +
        "</div>";
      $("#fileupload #error-msg").removeClass("d-none").html(alert);
    });
  }
};
</script>
{{-- confirm ok end --}}
<script>
  $(document).ready(function () {
    // Function to handle the AJAX request
    function storeLotteryTicket() {
        // Get form data
        var formData = new FormData($("#fileupload")[0]);

        $.ajax({
            url: "{{ route('admin.lotteries.store') }}", // Replace with your route URL
            type: "POST",
            data: formData,
            processData: false, // Prevent jQuery from processing the data
            contentType: false, // Prevent jQuery from setting content type
            success: function (response) {
                // Handle success response here
                console.log(response);
                // Redirect or display a success message to the user
            },
            error: function (xhr, status, error) {
                // Handle error response here
                console.error(xhr.responseText);
                // Display an error message to the user
            },
        });
    }
  });
</script>
{{-- ok --}}
<script>
 $(document).ready(function () {
  // Initialize the file upload plugin
  $('#fileupload').fileupload({
    url: '{{ route('admin.lotteries.store') }}', // Replace with your route URL
    dataType: 'json', // Set the expected response type
    sequentialUploads: true, // Upload files sequentially
    done: function (e, data) {
      // Handle success response here
      console.log(data.result);
      // Redirect or display a success message to the user
    },
    fail: function (e, data) {
      // Handle error response here
      console.error('Upload failed:', data.errorThrown);
      // Display an error message to the user
    },
  });

  // You can remove the previous form submission code
  $('#fileupload').on('submit', function (e) {
    e.preventDefault(); // Prevent default form submission
  });
});

</script>