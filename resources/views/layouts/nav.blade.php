<header>
  <nav class="site-header sticky-top py-1">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
      <a href="/" class="nav-link active">Home</a>
      <a href="/posts" class="nav-link">Posts</a>
      <a href="/tasks" class="nav-link">Tasks</a>
      @if (Auth::check())
        <span class="nav-link ml-auto">{{ Auth::user()->name }}</span>
      @endif
    </div>
  </nav>
</header>
<hr>
