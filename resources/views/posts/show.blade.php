@extends ('layouts.master')

@section ('content')
      <h1>{{ $post->title }}</h1>
      {{ $post->body }}

    <hr>
      <div class="comments">
        <ul class="list-group">
          @foreach ($post->comments as $comment)
            <li class="list-group-item">
                <strong>
                    {{ $comment->created_at->diffForHumans() }}:
                </strong>
                {{ $comment->body }}
            </li>
          @endforeach
        </ul>
      </div>
    
    <hr>
    <div class="card">
        <div class="card-body">
            <form action="/posts/{{ $post->id }}/comments" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea class="form-control" id="body" name="body" placeholder="Enter comment" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add comment</button>
                </div>
                @include('layouts.errors')
            </form>
        </div>
    </div>
@endsection
