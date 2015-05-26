@extends('template.master')

@section('content')
	<h1>Danh sách bài viết</h1>
	<ol>
	@foreach ($posts as  $post) 
			
				<li class="text-primary" data-id="{{ $post->id }}">{{ $post->title }} <small> created by {{$post->user->fullname}}</small></li>
				@if ($post->categories->count())			
						@foreach ($post->categories as $cat)
							<address>Category: {{ $cat->title }}</address>
						@endforeach
				@else
					Không thuộc category
				@endif
			
				<p>{{ $post->content }}</p>
			
	@endforeach
	</ol>


	<p id="test">SEND</p>

<script type="text/javascript">
	//$.noConflict();
	$(document).ready(function() {
		$("#test").click(function(event) {
			//
			//event.preventDefault();
			//var pid = $(this).attr('data-id');

			$.ajax({
			      url: 'viewdata',
			      type: "post",
			      data: {'id':'1','_token':$('meta[name=_token]').attr('content') },
			      success: function(data){
			      	console.log(data);
			        alert(data);
			      }
			    });     
						
		});
	});
</script>


@stop