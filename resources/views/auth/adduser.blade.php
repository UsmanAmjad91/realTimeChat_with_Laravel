<title>{{ $title }}</title>
@extends('component.master')
@section('header')

@endsection
@section('content')
<div class="container">
	<h3>Add User</h3>
    <div class="form-group">
        <a class="btn btn-info" href="{{ route('users.show') }}">Back</a>
    </div>
	<form action="{{ route('users.create') }}" method="POST" >
		@csrf
		<div class="form-group">
			<label for="name">Name:</label>
			<input id="name" type="text" name="name" class="form-control">
		</div>

        <div class="form-group">
			<label for="email">Email:</label>
			<input id="email" type="email" name="email" class="form-control">
		</div>

        <div class="form-group">
			<label for="Password">Password:</label>
			<input id="password" type="password" name="password" class="form-control">
		</div>

        <div class="form-group">
			<label for="role">Role:</label>
            <select class="form-select col-lg-4 form-control" id="roles" name="roles">
                @if(count($roles))
                @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
               @endforeach
               @else
               <option value="">No Found</option>
               @endif
              </select>
		</div>

		<button class="btn btn-success">Add User</button>
	</form>
</div>
@endsection
@section('footer')

@endsection
