@extends('layouts.main')
@section('title', 'Ecomm')


	@section('content')

		<div class="span9" id="content">
			<div class="row-fluid">
			<!-- block -->
				<div class="block">
					<div class="navbar navbar-inner block-header">
						<button class="btn btn-primary btn-mini" id="btnAddsite"><i class="icon-pencil icon-white" ></i> Add Site</button>
					</div>
					<div class="navbar navbar-inner block-header">
						<div class="muted pull-left">Sites</div>
					</div>
					<div class="block-content collapse in">
						<div class="span12">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tableData">
								<thead>
									<tr>
										<th>SITE CLLI</th>
										<th>NAME</th>
										<th>TYPE</th>
			                            <th>OPSMGR</th>
			                            <th>SITE TECH</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($sites as $site)
										<tr>
											<td>{{$site->siteclli}}</td>
											<td>{{$site->sitename}}</td>
											<td>{{$site->sitetype}}</td>
			                                <td>{{$site->opsmgr}}</td>
											<td>{{$site->sitetech}}</td>
			                                <td>
												<button class="btn btn-primary btn-mini" onclick="javascript:EditSite({{$site->sites_id}})"><i class="icon-pencil icon-white" ></i> Edit Site</button>
											</td>
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
						<legend>Site Details</legend>
						<div class="control-group">
						  <label class="control-label" for="focusedInput">Equipment</label>
						  <div class="controls">
						  	<input type="hidden" id="hdnsiteid">
							<input class="input-xlarge focused" id="txtsiteclli" type="text" value="">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="focusedInput">Name</label>
						  <div class="controls">
							<input class="input-xlarge focused" id="txtsitename" type="text" value="">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="focusedInput">Address</label>
						  <div class="controls">
							<input class="input-xlarge focused" id="txtaddress" type="text" value="">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="focusedInput">City</label>
						  <div class="controls">
							<input class="input-xlarge focused" id="txtcity" type="text" value="">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="focusedInput">State</label>
						  <div class="controls">
							<input class="input-xlarge focused" id="txtstate" type="text" value="">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="focusedInput">Zip</label>
						  <div class="controls">
							<input class="input-xlarge focused" id="txtzip" type="text" value="">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="focusedInput">Type</label>
						  <div class="controls">
							<input class="input-xlarge focused" id="txtsitetype" type="text" value="">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="focusedInput">Manager</label>
						  <div class="controls">
							<input class="input-xlarge focused" id="txtopsmgr" type="text" value="">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="focusedInput">Tech</label>
						  <div class="controls">
							<input class="input-xlarge focused" id="txtsitetech" type="text" value="">
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
		<script src="js/sites.js"></script>
	@endsection

