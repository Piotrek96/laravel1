@extends("base")
@section('body')
<p>{{$user}}</p>
{{HTML::link('create', 'dodaj')}}
@stop
