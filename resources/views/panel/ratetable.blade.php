<?php
$totalApplicants = $applicantsTotal;
$notRated = $totalApplicants - $rated;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Interview - Rate Table</title>

	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-multiselect.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/sweetalert.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/pace.green.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/ladda.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">

	<style>
		html, body {
			background-color: #fff;
			color: #636b6f;
			font-family: 'Roboto';
			height: 100vh;
			margin: 0;
		}
	</style>

	<!-- Scripts -->
	<script>
		window.Laravel = <?php echo json_encode([
			'csrfToken' => csrf_token(),
			]); ?>
		</script>
		<script type="text/javascript" src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('/js/bootstrap-multiselect.js') }}"></script>
		<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
		<script type="text/javascript" data-pace-options='{ "ajax": true }' src="{{asset('js/pace.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/spin.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/ladda.min.js')}}"></script>
	</head>
    <!--<div id="data">
            
</div>-->
<body class="ash">
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">

				<!-- Collapsed Hamburger -->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
					<span class="sr-only">Interview</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- Branding Image -->
				<a class="navbar-brand" href="{{ url('/') }}">
					{{ config('app.name', 'Interview') }}
				</a>
			</div>

			<div class="collapse navbar-collapse" id="app-navbar-collapse">
				<!-- Left Side Of Navbar -->
				<ul class="nav navbar-nav">
					&nbsp;
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="/dashboard">Interview</a></li>
					<li><a href="/rate2">Rating Table</a></li>
					<li><a href="/panelists">Panelists</a></li>
					<li><a href="/comments">Comments</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li>
								<a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
									<i class="fa fa-power-off"></i> Logout
								</a>
								<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="table-responsive col-md-12">
				<table class="table table-hover table-striped">
					<caption>List of Applicants -  Total Applicants: {{$totalApplicants}}</caption>
					<!--<caption>Rated: {{$rated}}  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Not Yet Rated: {{$notRated}}</caption>-->
					<thead>
						<tr>
							<th>#</th>
							<th>Photo</th>
							<th>Name</th>
							<th>Date of Birth(Age)</th>
							<th>Reference Number</th>
							<th>Uploaded Files</th>
							<th>Test Score</th>
							<th>Options</th>
						</tr>
					</thead>
					<tbody>
						<?php $index=0; ?>
						<input type="hidden" name="total" id="total" value="{{count($skills)}}">
						<input type="hidden" name="skillToken" id="skillToken" value="{{ csrf_token() }}">
						<input type="hidden" name="user" id="user" value="{{Auth::user()->name}}">
						@foreach($applicants as $applicant)
						<tr>
							<th>{{$index+=1}}</th>
							<th>
								<img class="img-circle u-image" id="appimg" alt="image" src="{{ asset('uploads') }}/{{$applicant->image}}" style="width: 50px;height: 50px;">
							</th>
							<th>{{$applicant->f_name}} {{$applicant->l_name}}</th>
							<th>{{$applicant->dob}} ({{$applicant->age}})</th>
							<th>{{$applicant->ref_num}}</th>
							<th>
								<a href="" class="view" id="view{{$index}}" name="view{{$index}}" data-toggle="tooltip" title="Click here to view documents uploaded by {{$applicant->f_name}} {{$applicant->l_name}}" user="{{$applicant->id}}">
									<img alt="pdf" class="img-thumbnail d-image" src="{{asset('img/pdf.png')}}">
									<input type="hidden" id="view_token{{$index}}" name="view_token{{$index}}" value="{{csrf_token()}}">
								</a>
							</th>
							<th>{{$applicant->textscore}}</th>
							<th>
								<?php $rr[] = '';foreach($rateTable as $ratee){$rr[]=$ratee->ref_num;}?>
								@if(array_search($applicant->ref_num, $rr))
								<span class="badge ratebg">Rated</span>
								@else
								<div class="btn-group">
									<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fa fa-cogs"></i> Action <span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li>
											<a href="#rate{{$index}}" data-toggle="modal">
												<i class="fa fa-edit"></i> Rate
											</a>
										</li>
										<!--<li role="separator" class="divider"></li>
										<li>
											<a href="#" id="delete{{$index}}" onclick="deletemember({{$index}});">
											<i class="fa fa-trash-o"></i> Delete
											</a>
										</li>-->
									</ul>
								</div>
								@endif
							</th>
						</tr>
						<div class="modal fade" id="rate{{$index}}">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title" id="myModalLabel">Rate - {{$applicant->f_name}} {{$applicant->l_name}}</h4>
									</div>
									<div class="modal-body">
										<?php $serial = 0; ?>
										<div class="panel panel-default">
											<div class="panel-heading">
												Rate - {{$applicant->f_name}} {{$applicant->l_name}} for each of the following categories.
											</div>
											<div class="panel-body">
												<div class="row">
													<div class="col-md-12">
														<div class="col-md-1">
															#
														</div>
														<div class="col-md-9">
															Skill/Qualification
														</div>
														<div class="col-md-2">
															Grade
														</div>
													</div>
													<?php $serial = 0; ?>
													<form method="POST" id="form{{$index}}">
														@foreach($skills as $skill)
														<input type="hidden" name="ref_num{{$index}}" id="ref_num{{$index}}" value="{{$applicant->ref_num}}">
														<div class="col-md-12">
															<div class="col-md-1">
																{{$serial+=1}}
																<!--<input type="hidden" name="cserial" name="cserial" value="{{$serial}}">-->
															</div>
															<div class="col-md-9">
																{{$skill->skill}}
																<input type="hidden" name="skillname{{$serial}}" id="skillname{{$serial}}" value="{{$skill->skill}}">
															</div>
															<div class="col-md-2">
																<select id="skillvalue{{$serial}}" name="skillvalue{{$serial}}">
																	@for($i=1; $i<=5; $i++)
																	<option value="{{$i}}">{{$i}}</option>
																	@endfor
																</select>
															</div>
															<br><br><br>
														</div>
														@endforeach
														<div class="col-md-12">
															<div class="form-group">
																<label for="comments">Final Comments - What are your recommendations.</label>
																<textarea class="form-control" id="comments{{$index}}" name="comments{{$index}}"></textarea>
															</div>
														</div>
													</form>
												</div>
											</div>
											<div class="panel-footer">
												Key: 1 - Poor | 2 - Good | 3 - Average | 4 - Very Good | 5 - Excellent
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Cancel</button>
										<button type="submit" class="btn btn-success" onclick="submitrate({{$index}});"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Save changes</button>
									</div>
								</div>	
							</div>
						</div>
						@endforeach
						<script type="text/javascript">
							$(document).ready(function() {
								$('select').multiselect({
									enableFiltering: true,
									buttonWidth: '100%'
								});
								$(".view").tooltip();
								$(".view").click(function(e) {
									e.preventDefault();
									var viewdoc = $(this).attr('id');
									var viewref = $(this).attr('user');
									var id = viewdoc[viewdoc.length - 1];
									var token = $("#view_token"+id).val()
									var docData = {'viewref':viewref, '_token':token}
									$.post('/documents', docData, function(data,xhr,status) {
										var i = 0; 
										for(i = 0; i < data.length; i++) {
											window.open('localhost:8000/uploads/'+data[i].document, "document"+i);
										}
									});
								});
							});
						</script>
					</tbody>
				</table>
				{{ $applicants->links() }}
			</div>
		</div>
	</div>
</body>
</html>