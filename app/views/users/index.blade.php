<!-- app/views/users/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Look! I'm CRUDding</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('users') }}">User Alert</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('users') }}">View All users</a></li>
		<li><a href="{{ URL::to('users/create') }}">Create a User</a>
	</ul>
</nav>

<h1>All the users</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Email</td>
			<td>Telephone</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
@if($users)	
	@foreach($users as $user)
		<tr>
			<td>{{ $user->id }}</td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->telephone }}</td>

			<!-- we will also add show, edit, and delete buttons -->
			<td>
				<!-- we will add this later since its a little more complicated than the other two buttons -->

				<!-- show the User (uses the show method found at GET /users/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('users/' . $user->id) }}">Show this User</a>

				<!-- edit this User (uses the edit method found at GET /users/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('users/' . $user->id . '/edit') }}">Edit this User</a>

				<!-- delete the User (uses the destroy method DESTROY /users/{id} -->
				<a class="btn btn-small btn-alert" href="{{ URL::to('users/delete/' . $user->id ) }}">Delete this User</a>

			</td>
		</tr>
	@endforeach
@else
	there aren't users in the data base
@endif
	</tbody>
</table>

</div>
</body>
</html>