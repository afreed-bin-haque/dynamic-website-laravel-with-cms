@extends('admin.admin_master')

@section('admin_main')
<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Set new password</h2>
										</div>
										<div class="card-body">
											<form class="form-pill">
                                            <div class="form-group">
													<input type="password" class="form-control" id="exampleFormControlPassword3" placeholder="Password">
												</div>
												<div class="form-group">
													<input type="password" class="form-control" id="exampleFormControlPassword3" placeholder="Password">
												</div>
                                                <div class="form-group">
													<input type="password" class="form-control" id="exampleFormControlPassword3" placeholder="Password">
												</div>
                                                <div class="form-footer pt-5 border-top">
													<button type="submit" class="btn btn-primary btn-default">Sign in</button>
												</div>
											</form>
										</div>
@endsection
