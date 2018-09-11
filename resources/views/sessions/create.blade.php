@extends ('layouts.master')

@section ('content')
      <h1>Sign In</h1>
      <hr>
<form method="POST" action="/login">
    {{ csrf_field() }}
  <div class="form-group">
    <label for="email">E-mail</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" required>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Sign In</button>
  </div>
  @include('layouts.errors')
</form>
@endsection
 
