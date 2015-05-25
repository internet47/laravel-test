@extends ('template.master')

@section('content')

Xin chào <h1>{{$user->fullname }}</h1>
<p>{{$user->password }}</p>
<p>{{$user->created_at }}</p>
<p>{{$user->updated_eat }}</p>

<p>Những bài đã đăng:</p>
<ul>
	@foreach ($user->posts as $post)
	<li>{{$post->title}}</li>
	@endforeach
</ul>

@stop
