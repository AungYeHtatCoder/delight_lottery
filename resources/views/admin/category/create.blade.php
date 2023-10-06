@extends('layouts.admin_app')
@section('content')
  <div class="row">
   <div class="col-md-8">
    	<div id="formGrid" class="mb-5">
									<h4>Permission Create <span> <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Back To LotteryCategory Dashboard</a></span></h4>
									<p></p>
									<div class="card">
										<div class="card-body">
											<form action="{{ route('admin.categories.store') }}" method="post">
            @csrf
												<div class="mb-3 row">
													<label for="inputEmail3" class="col-sm-2 col-form-label">LotteryCategory Name</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="inputEmail3" name="category_name">
													</div>
												</div>
												
												<div class="form-group row">
													<div class="col-sm-10 offset-sm-2">
														<button type="submit" class="btn btn-outline-theme">Create New LotteryCategory</button>
													</div>
												</div>
											</form>
										</div>
									
									</div>
								</div>
   </div>

  </div>
@endsection