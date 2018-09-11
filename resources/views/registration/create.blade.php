@extends ('layouts.master')

@section ('content')
      <h1>Registration</h1>
      <hr>
<form method="POST" action="/register">
    {{ csrf_field() }}
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
  </div>
  <div class="form-group">
    <label for="email">E-mail</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" required>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
  </div>
  <div class="form-group">
    <label for="password_confirmation">Password confirmation</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter password confirmation" required>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Register</button>
  </div>
  @include('layouts.errors')
</form>
@endsection
