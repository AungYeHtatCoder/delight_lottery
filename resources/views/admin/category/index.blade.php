@extends('layouts.admin_app')
@section('styles')
<link href="{{ asset('admin_app/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet">
	<link href="{{ asset('admin_app/assets/plugins/bootstrap-table/dist/bootstrap-table.min.css') }}" rel="stylesheet">
@endsection
@section('content')
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
									<li class="breadcrumb-item active">Lottery Category Dashboard</li>
								</ul>

								<h1 class="page-header">
									Lottery Category Dashboard <small>page header description goes here...</small>
								</h1>

								<hr class="mb-4">

								<!-- BEGIN #datatable -->
								<div id="datatable" class="mb-5">
									<h4><a href="{{ route('admin.categories.create') }}" class="btn btn-primary">New Lottery Category Create</a></h4>
									<p></p>
									<div class="card">
										<div class="card-body">
											<table id="datatableDefault" class="table text-nowrap w-100">
												<thead>
													<tr>
														<th>#</th>
														<th>Lottery Category Name</th>
														<th>Created At</th>
														<th>Updated At</th>
														<th>Action</th>

													</tr>
												</thead>
           <tbody>
               @foreach($categories as $key => $category)
               <tr>
														<td>{{ ++$key }}</td>
														<td>{{ $category->category_name }}</td>
														<td>{{ $category->created_at->format('F j, Y') }}</td>
              <td>{{ $category->updated_at->format('F j, Y') }}</td>
              <td>
                  <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                  <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-info btn-sm">Show</a>
                  <form class="d-inline" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Del</button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<!-- END col-9-->
						</div>
						<!-- END row -->
					</div>
					<!-- END col-10 -->
				</div>
				<!-- END row -->
 @include('sweetalert::alert')

			</div>
@endsection

@section('scripts')
<script src="{{ asset('admin_app/assets/plugins/@highlightjs/cdn-assets/highlight.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/js/demo/highlightjs.demo.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/plugins/bootstrap-table/dist/bootstrap-table.min.js') }}"></script>
	<script src="{{ asset('admin_app/assets/js/demo/table-plugins.demo.js') }}"></script>
	<script src="{{ asset('admin_app/assets/js/demo/sidebar-scrollspy.demo.js') }}"></script>
	<!-- ================== END page-js ================== -->
@endsection
