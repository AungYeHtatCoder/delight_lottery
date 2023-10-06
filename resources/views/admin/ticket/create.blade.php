@extends('layouts.admin_app')
	@section('styles')
     
 
	<!-- ================== BEGIN page-css ================== -->
	<link href="{{ asset('admin_app/assets/plugins/tag-it/css/jquery.tagit.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/bootstrap-slider/dist/css/bootstrap-slider.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/blueimp-file-upload/css/jquery.fileupload.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/summernote/dist/summernote-lite.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/spectrum-colorpicker2/dist/spectrum.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/select-picker/dist/picker.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/jquery-typeahead/dist/jquery.typeahead.min.css') }}" rel="stylesheet">
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
									<li class="breadcrumb-item"><a href="#">FORMS</a></li>
									<li class="breadcrumb-item active">FORM PLUGINS</li>
								</ul>
								
								<h1 class="page-header">
									Form Plugins <small>page header description goes here...</small>
								</h1>
								
								<hr class="mb-4">
								<!-- BEGIN #jQueryFileUpload -->
								<div id="jQueryFileUpload" class="mb-5">
									<h4>jQuery file upload</h4>
									<p></p>
									<form id="fileupload" enctype="multipart/form-data">
          {{-- category --}}
          @csrf
          
										{{-- card file --}}
          <div class="card">
											<div class="card-body pb-2">
            <div class="row">
            <div class="col-xl-6">
														<div class="mb-3">
															<label class="form-label">Title <span class="text-danger">*</span></label>
															<input name="title" type="text" class="form-control" >
														</div>
													</div>

             <div class="col-xl-6">
														<div class="mb-3">
															<label class="form-label">Description <span class="text-danger">*</span></label>
															<input name="description" type="text" class="form-control">
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
												{{-- <pre><code class="xml" data-url="{{ asset('admin_app/assets/data/form-plugins/code-8.json')}}"></code></pre>
											</div> --}}
										</div>
          {{-- card file --}}
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
<script>

  $('#fileupload').fileupload({
    url: '{{ route('admin.tickets.store') }}',
    dataType: 'json',
    sequentialUploads: true,
    done: function(e, data) {
      console.log(data.result);
    }
  });
  $('#fileupload').on('fileuploadadd', function (e, data) {
    data.submit();
  });
var handleRenderjQueryFileUpload = function () {
  $("#fileupload").fileupload({
    previewMaxHeight: 80,
    previewMaxWidth: 220,
    url: "{{ route('admin.tickets.store') }}",
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
      url: "{{ route('admin.tickets.store') }}", // Check if this URL is correct
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