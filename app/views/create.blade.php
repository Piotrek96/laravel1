@extends("base")
@section('body')

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Create an user</h4>
      </div>
      {{Form::open(["action" => "UserController@store", "class"=>"form-horiontal" ])}}
      	<div class="modal-body">
  			<fieldset>
		    <div class="alert alert-danger hidden" id="alert" role="alert">
  				<span class="sr-only">Error:</span>
  				<p id="errortext"></p>
			</div>
    		<div class="form-group">
    		  {{Form::label('username', 'Username', ["class"=>"control-label"])}}
    		  {{Form::text('username', NULL ,['class'=>'form-control', 'placeholder' => 'type the username here'])}}
   			</div>
   			<div class="form-group">
    		  {{Form::label('password', 'Password', ["class"=>"control-label"])}}
    		  {{Form::password('password', ['class'=>'form-control', 'placeholder' => 'type the password here'])}}
   			</div>
   		  </div>	
  		  <div class="form-group modal-footer">
 		     <div class="col-lg-10 col-lg-offset-2">
    		    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
        		<button type="submit" class="btn btn-primary">Submit</button>
    		  </div>
    	</div>
  		</fieldset>
		{{Form::close()}}
      
    </div>
  </div>
  <div id="user-result">
  	
  </div>
</div>

<script type="text/javascript">
$.post('form/create', function(data) { 
   	$("#formcontent").html(data);
});
</script>
@stop