@extends('layouts.main')
@section('title', 'Ecomm')


	@section('content')
		<div class="span9" id="content">
			<div class="row-fluid">
				<!-- block -->
				<div class="block">
					<div class="navbar navbar-inner block-header">
						<button class="btn btn-primary btn-mini" id="btnAddEquip"><i class="icon-pencil icon-white" ></i> Add Equipment</button>
					</div>
					<div class="navbar navbar-inner block-header">
						<div class="muted pull-left">Equipments</div>
					</div>
					<div class="block-content collapse in">
						<div class="span12">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="tableData">
								<thead>
									<tr>										
										<th>PART #</th>
										<th>DESCRIPTION</th>
										<th>MANUFACTUER</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach ( $equips as $equip )
										<tr>
											<td>{{$equip->partnum}}</td>
											<td>{{$equip->partdesc}}</td>
											<td>{{$equip->partmfr}}</td>
											<td>
												<button class="btn btn-primary btn-mini" onclick="javascript:EditEquipment({{$equip->id_equip}})"><i class="icon-pencil icon-white" ></i> Edit</button>
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
			<div class="block" id="dialogEquip" style="display:none;">
				<div class="block-content collapse in">
					<div class="span12">
					  <fieldset>
						<legend>Equipment Details</legend>
						<div class="control-group">
						  <label class="control-label" for="focusedInput">Part Number</label>
						  <div class="controls">
						  	<input type="hidden" id="hdnid_equip">
							<input class="input-xlarge focused" id="txtpartnum" type="text" value="">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="focusedInput">Description</label>
						  <div class="controls">
							<input class="input-xlarge focused" id="txtpartdesc" type="text" value="">
						  </div>
						</div>
						<div class="control-group">
						  <label class="control-label" for="focusedInput">Part MFR</label>
						  <div class="controls">
							<input class="input-xlarge focused" id="txtpartmfr" type="text" value="">
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
		<script src="js/equips.js"></script>
	@endsection

