@extends('template.master')

@section('content')
	<h1>Danh sách bài viết</h1>
	<ol>
	@foreach ($posts as  $post) 
			
				<li class="text-primary">{{ $post->title }} <small> created by {{$post->user->fullname}}</small></li>
							

					@foreach ($post->categories as $cat)
						<address>Category: {{ $cat->title }}</address>
					@endforeach
			
				<p>{{ $post->content }}</p>
			
	@endforeach
	</ol>
@stop