@extends('template.master')

@section('content')
	<h1>Danh sách User</h1>

	<a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Trigger modal</a>
	<div class="modal fade" id="modal-id">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Modal title</h4>
				</div>
				<div class="modal-body">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	@foreach ($users as  $user) 
			<dl>
				<dt><a href="/users/show/{{$user->id}}">{{ $user->fullname }}</a></dt>
				<dd>{{ $user->password }}</dd>
					<ol>
						@foreach ($user->posts as $post)
								<li>{{ $post->title }}</li>
						@endforeach
					</ol>
			</dl>
	@endforeach
@stop
