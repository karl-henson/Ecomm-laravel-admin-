@extends('layouts.main')
@section('title', 'Ecomm')

	@section('content')

		<div class="span9" id="content">
			<div class="row-fluid">
				<!-- block -->
				<div class="block">
					@if ( Auth::user()->security_level == 1)
						<div class="navbar navbar-inner block-header">
							<button class="btn btn-primary btn-mini" id="btnAddPerson"><i class="icon-pencil icon-white" ></i> Add Person</button>
						</div>
					@endif

					<div class="navbar navbar-inner block-header">
						<div class="muted pull-left">Persons</div>
				</div>
					<div class="block-content collapse in">
						<div class="span12">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tableData">
								<thead>
									<tr>
										<th>NAME</th>
										<th>COMPANY</th>
										<th>GROUP</th>
			                            <th>OFFICE</th>
			                            <th>CELL</th>
			                            <th>EMAIL</th>
			                            <th>LOCATION</th>
			                    		@if ( Auth::user()->security_level == 1)
											<th>Action</th>
										@endif
									</tr>
								</thead>
								<tbody>
									@foreach ($persons as $person)
										<tr>
											<td>{{$person->firstname}} {{$person->lastname}}</td>
											<td>{{$person->company}}</td>
											<td>{{$person->emgroup}}/td>
			                                <td>{{$person->offcphone}}</td>
											<td>{{$person->cellphone}}</td>
			                                <td>{{$person->email}}</td>
											<td>{{$person->location}}</td>
											@if ( Auth::user()->security_level == 1)
												<td>
													<button class="btn btn-primary btn-mini" onclick="javascript:EditPerson({{$person->id}})"><i class="icon-pencil icon-white" ></i> Edit</button>
												</td>
											@endif
										</tr>	
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- /block -->
			</div>
			<div class="block" id="dialogSite" style="display:none;">
				<div class="block-content collapse in">
					<div class="span12">
					  <fieldset>
						<legend>Person Details</legend>
						<div class="control-group">
						  <label class="control-label" for="focusedInput">First Name</label>
						  <div class="controls">
						  	<input type="hidden" id="hdnid">
							<input class="input-xlarge focused" id="txtfirstname" type="text" value="">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="focusedInput">Last Name</label>
						  <div class="controls">
							<input class="input-xlarge focused" id="txtlastname" type="text" value="">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="focusedInput">Company</label>
						  <div class="controls">
							<input class="input-xlarge focused" id="txtcompany" type="text" value="">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="focusedInput">EM Group</label>
						  <div class="controls">
							<input class="input-xlarge focused" id="txtemgroup" type="text" value="">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="focusedInput">Office Phone</label>
						  <div class="controls">
							<input class="input-xlarge focused" id="txtoffcphone" type="text" value="">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="focusedInput">Cell Phone</label>
						  <div class="controls">
							<input class="input-xlarge focused" id="txtcellphone" type="text" value="">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="focusedInput">Email</label>
						  <div class="controls">
							<input class="input-xlarge focused" id="txtemail" type="text" value="">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="focusedInput">Location</label>
						  <div class="controls">
							<input class="input-xlarge focused" id="txtlocation" type="text" value="">
						  </div>
						</div>
					  </fieldset>
					</div>
				</div>
			</div>
		</div>
		<div id="dialogmsg"></div>

	@endsection

	@section('script')
		<script src="js/persons.js"></script>
	@endsection

	