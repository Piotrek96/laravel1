@extends("base")
@section("body")

{{Form::open(["action" => ["UserController@addGroup",$id] , "class"=>"form-horiontal" ])}}
@foreach($groups as $group)
 <div class="checkbox">
    <label>
    {{ Form::checkbox("groups[]", $group->id)}}{{$group->group_name}}
    </label>
  </div>

  {{$group->user}}
@endforeach
<div class="form-group modal-footer">
     <div class="col-lg-10 col-lg-offset-2">
	    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
   		<button type="submit" class="btn btn-primary">Submit</button>
	 </div>
</div>
{{Form::close()}}

@stop