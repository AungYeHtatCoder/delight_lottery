@extends('layouts.admin_app')
	@section('styles')
	<!-- ================== BEGIN page-css ================== -->
	@include('layouts.create_css')
	<!-- ================== END page-css ================== -->
@endsection
@section('content')
			<!-- BEGIN container -->
			<div class="container">
				<!-- BEGIN row -->
				<div class="row justify-content-center">
					<!-- BEGIN col-10 -->
					<div class="col-xl-10">
						<!-- BEGIN row -->
						<div class="row">
							<!-- BEGIN col-9 -->
							<div class="col-xl-12">
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
									<li class="breadcrumb-item active">Lottery Ticket Create Dashboard</li>
								</ul>
								
								<h1 class="page-header">
									Back To Lottery Ticket Dashboard  <small><a href="{{ route('admin.lotteries.index')}}" class="btn btn-primary">< Back</a></small>
								</h1>
								
								<hr class="mb-4">
								<!-- BEGIN #jQueryFileUpload -->
								<div id="jQueryFileUpload" class="mb-5">
									<h4>New Lottery Ticket Create</h4>
									<p></p>
									<form id="fileupload" enctype="multipart/form-data">
          @csrf
          <div class="card">
											<div class="card-body pb-2">
												<div class="col-xl-6 mt-5">
             <div class="small text-inverse text-opacity-50 mb-1"><b class="fw-bold">Choose Lottery Ticket Category</b></div>
             @foreach($categories as $item)
                 <div class="form-group mb-4">
                     <div class="form-check mt-3">
                         <input name="category_id" class="form-check-input" type="checkbox" value="{{$item->id}}" id="defaultCheck1">
                         <label class="form-check-label" for="defaultCheck1">{{ $item->category_name }}</label>
                     </div>
                 </div>
             @endforeach
         </div>

           <div class="row">
            <div class="col-xl-6">
             <div class="form-group mb-4">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Ticket No</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="inputEmail3" name="ticket_no">
													</div>
												</div>
           </div>

           <div class="col-xl-6">
             <div class="form-group mb-4">
													<label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="inputEmail3" name="ticket_price">
													</div>
												</div>
           </div>

           </div>
          <div class="row">
            <div class="col-xl-6">
														<div class="mb-3">
															<label class="form-label">Lottery Start Date <span class="text-danger">*</span></label>
															<input name="start_date" type="text" class="form-control" id="datepicker-default" placeholder="dd/mm/yyyy">
														</div>
													</div>

             <div class="col-xl-6">
														<div class="mb-3">
															<label class="form-label">Lottery Start Date <span class="text-danger">*</span></label>
															<input name="end_date" type="text" class="form-control" id="datepicker-component" placeholder="dd/mm/yyyy">
														</div>
													</div>
          </div>

												<div class="fileupload-buttonbar mb-2">
													<div class="d-block d-lg-flex align-items-center">
														<span class="btn btn-outline-theme fileinput-button me-2 mb-1">
															<i class="fa fa-fw fa-plus"></i>
															<span>Add files...</span>
															<input type="file" name="files">
														</span>
														<button type="submit" class="btn btn-outline-default me-2 mb-1 start">
															<i class="fa fa-fw fa-upload"></i>
															<span>Start upload</span>
														</button>
														<button type="reset" class="btn btn-outline-default me-2 mb-1 cancel">
															<i class="fa fa-fw fa-ban"></i>
															<span>Cancel upload</span>
														</button>
														<button type="button" class="btn btn-outline-default me-2 mb-1 delete">
															<i class="fa fa-fw fa-trash"></i>
															<span>Delete</span>
														</button>
														<div class="form-check ms-2 mb-1">
															<input type="checkbox" id="toggle-delete" class="form-check-input toggle">
															<label for="toggle-delete" class="form-check-label">Select Files</label>
														</div>
													</div>
												</div>
												<div id="error-msg"></div>
											</div>
											<div class="table-responsive text-nowrap">
												<table class="table table-card mb-0 fs-13px">
													<thead>
														<tr class="fs-12px">
															<th class="pt-2 pb-2 w-25">PREVIEW</th>
															<th class="pt-2 pb-2 w-25">FILENAME</th>
															<th class="pt-2 pb-2 w-25">SIZE</th>
															<th class="pt-2 pb-2 w-25">ACTION</th>
														</tr>
													</thead>
													<tbody class="files">
														<tr class="empty-row">
															<td colspan="4" class="text-center p-3">
																<div class="text-inverse text-opacity-30 mb-2"><i class="fa fa-file-archive fa-3x"></i></div> 
																No file uploaded
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="card-arrow">
												<div class="card-arrow-top-left"></div>
												<div class="card-arrow-top-right"></div>
												<div class="card-arrow-bottom-left"></div>
												<div class="card-arrow-bottom-right"></div>
											</div>
											<div class="hljs-container">
										</div>
									</form>
								</div>
							
							</div>
							<!-- END col-9-->
							<!-- BEGIN col-3 -->
							{{-- <div class="col-xl-3">
							
							</div> --}}
							<!-- END col-3 -->
						</div>
						<!-- END row -->
					</div>
					<!-- END col-10 -->
				</div>
				<!-- END row -->
			</div>
			<!-- END container -->
	
	<!-- END #app -->
	@endsection
 @section('scripts')
	<!-- BEGIN template-upload -->
	<script id="template-upload" type="text/x-tmpl">
	{% for (var i=0, file; file=o.files[i]; i++) { %}
		<tr class="template-upload">
			<td>
				<span class="preview d-flex justify-content-center flex-align-center" style="height: 80px"></span>
			</td>
			<td>
				<p class="name mb-1">{%=file.name%}</p>
				<strong class="error text-danger"></strong>
			</td>
			<td>
				<p class="size mb-2">Processing...</p>
				<div class="progress progress-sm mb-0 h-10px progress-striped active"><div class="progress-bar bg-theme" style="min-width: 2em; width:0%;"></div></div>
			</td>
			<td nowrap>
				{% if (!i && !o.options.autoUpload) { %}
					<button class="btn btn-outline-theme btn-sm d-block w-100 start" disabled>
						<span>Start</span>
					</button>
				{% } %}
				{% if (!i) { %}
					<button class="btn btn-outline-default btn-sm d-block w-100 cancel mt-2">
						<span>Cancel</span>
					</button>
				{% } %}
			</td>
		</tr>
	{% } %}
	</script>
	<!-- END template-upload -->
	<!-- BEGIN template-download -->
	<script id="template-download" type="text/x-tmpl">
	{% for (var i=0, file; file=o.files[i]; i++) { %}
		<tr class="template-download">
			<td>
				<span class="preview d-flex justify-content-center flex-align-center" style="height: 80px">
					{% if (file.thumbnailUrl) { %}
						<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
					{% } %}
				</span>
			</td>
			<td>
				<p class="name">
					{% if (file.url) { %}
						<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
					{% } else { %}
						<span>{%=file.name%}</span>
					{% } %}
				</p>
				{% if (file.error) { %}
					<div><span class="label label-danger">Error</span> {%=file.error%}</div>
				{% } %}
			</td>
			<td>
				<span class="size">{%=o.formatFileSize(file.size)%}</span>
			</td>
			<td nowrap>
				{% if (file.deleteUrl) { %}
					<button class="btn btn-outline-danger btn-sm btn-block delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
						<span>Delete</span>
					</button>
					<div class="form-check mt-2">
						<input type="checkbox" id="{%=file.deleteUrl%}" name="delete" value="1" class="form-check-input toggle">
						<label for="{%=file.deleteUrl%}" class="form-check-label"></label>
					</div>
				{% } else { %}
					<button class="btn btn-outline-default btn-sm d-block w-100 cancel">
						<span>Cancel</span>
					</button>
				{% } %}
			</td>
		</tr>
	{% } %}
	</script>
	<!-- END template-download -->
	<!-- ================== BEGIN page-js ================== -->
	@include('layouts.create_js')
	<!-- ================== END page-js ================== -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.31/dist/sweetalert2.all.min.js"></script>

<!-- Include SweetAlert library -->

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
        //console.log(response);
        // Display a SweetAlert success message
        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: 'Lottery Ticket Created Successfully',
        });
      },
      error: function (xhr, status, error) {
        // Handle error response here
        console.error(xhr.responseText);
        // Display a SweetAlert error message
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Lottery Ticket Creation Failed',
        });
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
      //console.log(data.result);
						let timerInterval
						Swal.fire({
								title: 'Lottery Ticket Created Successfully!',
								html: 'I will close in <b></b> milliseconds.',
								timer: 2000,
								timerProgressBar: true,
								didOpen: () => {
										Swal.showLoading()
										const b = Swal.getHtmlContainer().querySelector('b')
										timerInterval = setInterval(() => {
												b.textContent = Swal.getTimerLeft()
										}, 100)
								},
								willClose: () => {
										clearInterval(timerInterval)
								}
						}).then((result) => {
								/* Read more about handling dismissals below */
								if (result.dismiss === Swal.DismissReason.timer) {
										console.log('I was closed by the timer')
								}
						})
    },
    fail: function (e, data) {
      // Handle error response here
      console.error('Upload failed:', data.errorThrown);
      // Display a SweetAlert error message
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Lottery Ticket Creation Failed',
      });
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
		// Bind click event to cancel button
  $("#fileupload").on("click", ".cancel", function () {
    var $this = $(this);
    var data = $this.data();
    if (data && data.jqXHR) {
      data.jqXHR.abort(); // Cancel the upload
      $this.closest("tr").remove(); // Remove the canceled file from the table
    }
  });

  // Bind click event to delete button
  $("#fileupload").on("click", ".delete", function () {
    var $this = $(this);
    var data = $this.data();
    if (data && data.jqXHR) {
      data.jqXHR.abort(); // Cancel the upload
      $this.closest("tr").remove(); // Remove the canceled file from the table
    }
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

@endsection