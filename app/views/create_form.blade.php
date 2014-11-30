 {{Form::open(["action" => "UserController@store","id"=>"createUser", "class"=>"form-horiontal" ])}}
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
        <div class="form-group">
          {{Form::label('email', 'E-mail', ["class"=>"control-label"])}}
          {{Form::text('email', NULL , ['class'=>'form-control', 'placeholder' => 'type the email here', 'id' => 'email'])}}
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
<script type="text/javascript">
$("#username").focusout(function (e) { 
   var username = $('#username').val(); 
   var password = $('#password').val(); 
   var email = $('#email').val(); 
   $.getJSON('avaibility',
    {
      'username':username
    }, function(data) { 
    console.log(data);
    if(!data.success){
      $("#alert").removeClass('hidden');
      $.each(data.errors, function(key, value){
      $("#errortext").html(value.join(" ")); 
     })}
    else{
    if(!$("#alert").hasClass('hidden')){
      $("#alert").addClass('hidden');
      };
    }
   console.log($("#createUser").serialize());
   });
});

$("#createUser").submit(function(event){
event.preventDefault();
    $.post(
     $( this ).prop( 'action' ), 
     {
      'username':$('#username').val(),
      'password':$('#password').val(),
      'email':$('#email').val()
     }, function(data) {
      console.log(data);
     })
location.reload();
})
</script>