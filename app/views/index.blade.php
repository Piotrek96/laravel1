@extends("base")
@section('body')
<div class="col-lg-12">
@if(Auth::check())
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal" id="openModalCreateUser">
Create user
</button>
@else  
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal" id="openModalLogin">
Login
</button>
@endif
</div>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal-title</h4>
      </div>
      <div id="formcontent">
     </div>
    </div>
  </div>
  	<div id="user-result">
  	</div>
</div>
<div class="col-lg-5">
<table class="table">
<tr>
	<th>Username</th>
	<th>Email</th>
	<th></th>
	<th></th>
</tr>
@foreach ($users as $user) 
<tr>
	<td>{{$user->username}}</td>
	<td>{{isset($user->details->email) ?  $user->details->email : " " }}</td>
	<td>{{HTML::link('/edit','edytuj')}}</td>
	<td>{{HTML::linkAction("UserController@groupForm",'Zarządzaj Grupami',array($user->id))}}</td>
</tr>

@endforeach
</table>
</div>
<script type="text/javascript">
$("#openModalCreateUser").click(function(){
	$.post('form/create', function(data) { 
   	$("#formcontent").html(data);
    $("#myModalLabel").text("Create an user");
});
});

$("#openModalLogin").click(function(){
  $("#myModalLabel").text("Log in");
  $.post('form/login', function(data) { 
    $("#formcontent").html(data);
});
});
</script>
@stop
