@extends('template.master')

@section('content')
	<h1>Danh sách bài viết</h1>
	<ol>
	@foreach ($posts as  $post) 
			
				<li class="text-primary">{{ $post->title }} <small> created by {{$post->user->fullname}}</small></li>
					<p>{{$post->categories }}</p>
				@if ($post->categories)

					@foreach ($post->categories as $cat)
						<address>{{ $cat->title }}</address>
					@endforeach
				@else
						<p>Không có</p>
				@endif

				<p>{{ $post->content }}</p>
			
	@endforeach
	</ol>
@stop