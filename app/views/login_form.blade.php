 @if(!Request::ajax())
 @extends("base")
 @section('body')
 @endif
 {{Form::open(["action" => "UserController@login","id"=>"createUser", "class"=>"form-horiontal" ])}}
      <div class="modal-body">
  			<fieldset>
		    <div class="alert alert-danger hidden" id="alert" role="alert">
  				<span class="sr-only">Error:</span>
  				<p id="errortext"></p>
	   		</div>
    		<div class="form-group">
    		  {{Form::label('username', 'Username', ["class"=>"control-label"])}}
    		  {{Form::text('username', NULL ,['class'=>'form-control', 'placeholder' => 'type the username here', 'id'=>'username'])}}
   			</div>
   			<div class="form-group">
    		  {{Form::label('password', 'Password', ["class"=>"control-label"])}}
    		  {{Form::password('password', ['class'=>'form-control', 'placeholder' => 'type the password here','id'=>'password'])}}
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
@if(!Request::ajax())
@stop
@endif