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
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
  <fieldset>
    <legend>Legend</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Username</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputUsername" placeholder="Username">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
      </div>
    </div>
    <div class="form-group modal-footer">
      <div class="col-lg-10 col-lg-offset-2">
        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>


      </div>
      
    </div>
  </div>
  <div id="user-result"></div>
</div>

<script type="text/javascript">
$("#inputUsername").keyup(function (e) { //user types username on inputfiled
   var username = $(this).val(); //get the string typed by user
   $.post('store', {'username':username}, function(data) { //make ajax call to check_username.php
   $("#user-result").html(data); //dump the data received from PHP page
   console.log(data);
   });
});
</script>
@stop