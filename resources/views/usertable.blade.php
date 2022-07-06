@extends('usertablehead')
@section('content')
	<table class="table table-dark table-striped">
		<tr>
			<td>id</td>
			<td>img</td>
			<td>name</td>
			<td>startTime</td>
			<td>duration</td>
			<td>Login</td>
		</tr>
	@foreach ($users as $user)
			<tr>
				<td>{{$user->id}}</td>
			<td><img src={{$user->img}} alt="img"></td>
				<td>{{$user->firstname}} {{$user->lastname}}</td>
				<td>
					@if($user->attendaces->last())
					 {{$user->attendaces->last()->enterTime
					}}
					@endif
				</td>
				<td>
					@if($user->attendaces->first() && $user->isActive)
					{{Carbon\Carbon::parse($user->attendaces->first()->enterTime)->diffForHumans(Carbon\Carbon::now()) }}
				 @endif
				</td>
				<td>
		<button class="btn btn-primary openModal" data-id="{{$user->id}}" data-isActive="{{$user->isActive}}">
			@if($user->isActive)
			logout
			@else
			login
			@endif
		</button>
				</td>
			</tr>
	@endforeach
	</table>
	@foreach ($errors->all() as $error)
	<div class="alert alert-danger alert-dismissible fade show position-absolute top-0" role="alert">
		{{$error}}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
@endforeach
@endsection

	<div class="userModal">
		<form class="form">
			@csrf
		<h3>enter your password</h3>
		<input type="text" name="code" class="code">
		<button id="send_btn" class="btn btn-success">
		login
				</form>
		<button class="btn btn-danger closeModal">Close</button>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>
