@extends('template.master')

@section('content')
	<h1>Danh sách User</h1>
	@foreach ($users as  $user) 
			<dl>
				<dt>{{ $user->fullname }}</dt>
				<dd>{{ $user->password }}</dd>
					<ol>
						@foreach ($user->posts as $post)
								<li>{{ $post->title }}</li>
						@endforeach
					</ol>
			</dl>
	@endforeach
@stop
