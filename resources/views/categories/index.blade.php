@extends('template.master')

@section('content')
	<h1>Danh sách category</h1>
	@foreach ($cats as  $cat) 
			<dl>
				<dt>{{ $cat->title }}</dt>
			</dl>
	@endforeach
@stop
