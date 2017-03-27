@extends('layouts.main')
@section('title', 'Ecomm')


	@section('content')

		<div class="span9" id="content">
			<div class="row-fluid">
				<div class="block">
					<div class="navbar navbar-inner block-header">
						<div class="muted pull-left">Email Notifications</div>
					</div>
					<div class="block-content collapse in">
						<center><button class="btn btn-primary btn-mini" id="addUser"><i class="icon-pencil icon-white" ></i> Add</button></center>
						<div class="span12" id="divdata" style="width:95%;">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="dialogmsg"></div>
		<div id="dialogAddUser" style="display:none;">
			<div class="row-fluid">
				<div class="block-content collapse in">
					<div class="span12">
						Name:<br><input type="text" id="userName">
					</div>
					<div class="span12">
						Email:<br><input type="text" id="email">
					</div>
					<div class="span12">
						Percent:<input type="text" id="percent" value="0">
					</div>
				</div>
			</div>
		</div>

	@endsection

	@section('script')
		<script src="js/notifications.js"></script>
	@endsection

