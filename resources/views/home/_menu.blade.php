<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link @linkactive('home')" href="{{ route('home.home') }}">Posts <span class="badge bg-primary rounded-pill">{{ Auth::user()->posts->count() }}</span></a>
            <a class="nav-link @linkactive('home/post/create')" href="{{ route('home.create') }}">Create post</a>
            <a class="nav-link @linkactive('home/profile')" href="{{ route('home.profile') }}">My profile</a>
        </div>
    </div>
</nav>


