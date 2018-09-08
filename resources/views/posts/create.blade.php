@extends ('layouts.master')

@section ('content')
      <h1>Create post</h1>
      <hr>
<form method="POST" action="/posts">
    {{ csrf_field() }}
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control" id="body" name="body" placeholder="Enter post"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Publish</button>
</form>
@endsection
