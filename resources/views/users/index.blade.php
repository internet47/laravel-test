@extends('template.master')

@section('content')
	<h1>Danh sách User</h1>

	
	<div class="modal fade" id="modal-id">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Profile</h4>
				</div>
				<div class="modal-body">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					{{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


	@foreach ($users as  $user) 
			<dl>
				<dt><a href="/users/show/{{$user->id}}">{{ $user->fullname }}</a></dt>
				<dd>{{ $user->password }}</dd>
				<dd><a href="/users/profile/{{$user->id}}" class="prof" data-id="{{$user->id}}">View Profile</a></dd>
					<ol>
						@foreach ($user->posts as $post)
								<li>{{ $post->title }}</li>
						@endforeach
					</ol>
			</dl>
	@endforeach



<script type="text/javascript">
	$.noConflict();
	jQuery(document).ready(function($) {
		$(".prof",this).click(function(event) {
			event.preventDefault();
			var pid = $(this).attr('data-id');

			var infoModal = $('#modal-id');
			var htmlData ='';
			$.ajax({
			      url: 'users/getprofile',
			      type: "POST",
			      data: {'id':pid,'_token':$('meta[name=_token]').attr('content')},
			      success: function(data){
			      	//console.log(data);
			      	var profile = JSON.parse(data);
			      	 var fullname = profile.fullname;
			        var created_at = profile.created_at;
			         var updated_at = profile.updated_at;
			        var pass = profile.password;

			        htmlData ='<ul><li>Name: '+fullname+'</li><li>Ngày tạo: '+created_at+'</li><li>Ngày cập nhật: '+updated_at+'</li></ul>';
			        infoModal.find('.modal-body').html(htmlData);
			        infoModal.modal('show');
			        
			      }
			    });     
						
		});
	});
</script>

@stop


