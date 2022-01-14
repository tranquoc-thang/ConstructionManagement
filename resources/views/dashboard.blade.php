@extends('layout')
@section('content')
  <!-- @if (Auth::check())
<div>
Bạn đang đăng nhập với quyền 
@if( Auth::user()->level == 1)
	{{ "SuperAdmin" }}
@elseif( Auth::user()->level == 2)
	{{ "Admin" }}
@elseif( Auth::user()->level == 3)
	{{ "Thành viên" }}
@endif -->
<style>
	.card {
		background-color: #181a1b;
	}
	/* #a59d91 */
	h2,
	h3,
	h4,
	h5{
		color: #c8c3bb;
	}

	h6, p {
		color: #a59d91 !important;
	}
</style>
<div class="content-wrapper">
		<div class="row" style="margin-top: 1rem; margin-bottom: 1rem;">
		<div class="col-sm-4 grid-margin">
			<div class="card">
				<div class="card-body">
					<h5>Materials Cost</h5>
					<div class="row">
						<div class="col-8 col-sm-12 col-xl-8 my-auto">
							<div class="d-flex d-sm-block d-md-flex align-items-center">
								<h2 class="mb-0">
									<?php
										$total= 0;
										for($i = 0; $i < $material_project->count(); $i++) {
											$total += $material_project[$i]->Quantity * $material_project[$i]->Price;
										}
										echo '$'.$total;
									?>
								</h2>
							</div>
						</div>
						<div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
							<i style="font-size: 38px; color: #d1e71d;" class="fas fa-coins"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-4 grid-margin">
			<div class="card">
				<div class="card-body">
					<h5>Salary Cost</h5>
					<div class="row">
						<div class="col-8 col-sm-12 col-xl-8 my-auto">
							<div class="d-flex d-sm-block d-md-flex align-items-center">
								<h2 class="mb-0">
									<?php
										$total= 0;
										$endDate = 0;
										$startDate = 0;
										$totalDay = 0;
										for($i = 0; $i < $employee_project->count(); $i++) {
											for($j = 0; $j < $project->count(); $j++) {
												if($project[$j]->ProjectID == $employee_project[$i]->ProjectID) {
													$endDate = $project[$j]->EndDate;
													$startDate = $employee_project[$j]->StartDate;
													$totalDay = (strtotime($endDate) - strtotime($startDate)) / (60 * 60 * 24);
													for($x = 0; $x < $employee->count(); $x++) {
														if($employee[$x]->EmployeeID == $employee_project[$i]->EmployeeID) {
															for($y = 0; $y < $position->count(); $y++) {
																$total += $position[$y]->Salary * $totalDay;
															}
														}
													}
												}
											}
										}
										echo '$'.$total;
									?>
								</h2>
							</div>
						</div>
						<div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
								<i style="font-size: 38px; color: #15aabf;" class="far fa-money-bill-alt"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-4 grid-margin">
			<div class="card">
				<div class="card-body">
					<h5>Total Budget</h5>
					<div class="row">
						<div class="col-8 col-sm-12 col-xl-8 my-auto">
							<div class="d-flex d-sm-block d-md-flex align-items-center">
								<h2 class="mb-0">
									<?php
										$total= 0;
										for($i = 0; $i < $project->count(); $i++) {
											$total += $project[$i]->Cost;
										}
										echo '$'.$total;
									?>
								</h2>
							</div>
						</div>
						<div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
							<i style="font-size: 38px; color: #fd7e14;" class="fas fa-hand-holding-usd"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row" style="margin-bottom: 1rem">
		<div class="col-md-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-flex flex-row justify-content-between">
						<h4 class="card-title mb-3">Top Projects</h4>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="preview-list">
								@foreach($topproject as $p)
								<div class="preview-item border-bottom">
									<div class="preview-item-content d-sm-flex flex-grow">
										<div class="flex-grow">
											<h6 class="mt-2 ml-3 preview-subject">
												<a href="{{route('projectdetail',['ProjectID' => $p->ProjectID])}}">{{$p->ProjectName}}</a>
											</h6>
											<p class="ml-3 mb-0">Budget: ${{$p->Cost}}</p>
										</div>
										<div class="ml-auto text-sm-right pt-2 pt-sm-0">
											<p style="margin-bottom: 6px;">Manage by: 
												<a href="{{route('employeedetail',['EmployeeID' => $p->EmployeeID])}}">
													<?php
													for($i = 0; $i < $employee->count(); $i++) {
														if($employee[$i]->EmployeeID == $p->EmployeeID) {
															echo $employee[$i]->EmployeeName;
														}
													}
												?>
												</a>
											</p>
											<p class="">
												<?php
													for($i = 0; $i < $employee->count(); $i++) {
														if($employee[$i]->EmployeeID == $p->EmployeeID) {
															echo '<img style="max-width: 40px;" src="images/'.$employee[$i]->Picture.'" alt="">';
														}
													}
												?>
												
											</p>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row" style="margin-bottom: 1rem;">
		<div class="col-xl-3 col-sm-6 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-9">
							<div class="d-flex align-items-center align-self-start">
								<h3 class="mb-0">{{$project->count()}}</h3>
							</div>
						</div>
						<div class="col-3">
							<div class="icon icon-box-success">
								<span class="mdi mdi-arrow-top-right icon-item"></span>
							</div>
						</div>
					</div>
					<h6 class=" font-weight-normal">Total Project</h6>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-9">
							<div class="d-flex align-items-center align-self-start">
								<h3 class="mb-0">{{$employee->count()}}</h3>
							</div>
						</div>
						<div class="col-3">
							<div class="icon icon-box-success">
								<span class="mdi mdi-arrow-top-right icon-item"></span>
							</div>
						</div>
					</div>
					<h6 class=" font-weight-normal">Total Employee</h6>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-9">
							<div class="d-flex align-items-center align-self-start">
								<h3 class="mb-0">{{$user->count()}}</h3>
							</div>
						</div>
						<div class="col-3">
							<div class="icon icon-box-danger">
								<span class="mdi mdi-arrow-bottom-left icon-item"></span>
							</div>
						</div>
					</div>
					<h6 class=" font-weight-normal">Total User</h6>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-9">
							<div class="d-flex align-items-center align-self-start">
								<h3 class="mb-0">{{$position->count()}}</h3>
							</div>
						</div>
						<div class="col-3">
							<div class="icon icon-box-success">
								<span class="mdi mdi-arrow-top-right icon-item"></span>
							</div>
						</div>
					</div>
					<h6 class=" font-weight-normal">Total Position</h6>
				</div>
			</div>
		</div>
	</div>
</div>
@endif
@stop