<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('js/js.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <title>{{ $title ?? 'ArticleBlog' }}</title>

    <style>
        #gf {
            font-family: 'Kaushan Script', cursive;
            font-weight: bolder;
        }
    </style>
</head>
<body>
<div class = "container-fluid">

    <div class = "row mt-1">
        <div class = "col-md-12">
            <div id="app">
                <nav class="navbar navbar-expand-lg navbar-dark bg-danger" id="gf">
                <a class="navbar-brand big-letters" href="/">#ArticlesBlog</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse big-letters" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item @linkactive('/')">
                            <a class="nav-link" href="{{ route('main.welcome') }}">Home</a>
                        </li>
                        <li class="nav-item @linkactive('posts')">
                            <a class="nav-link" href="{{ route('post.index') }}">All posts</a>
                        </li>
                        <li class="nav-item @linkactive('categories')">
                            <a class="nav-link" href="{{ route('category.index') }}">Category</a>
                        </li>
                        <li class="nav-item @linkactive('contact')">
                            <a class="nav-link" href="{{ route('main.contact') }}">Contact</a>
                        </li>
                        @auth
                            <li class="nav-item @linkactive('home')">
                                <a class="nav-link" href="{{ route('home.home') }}">My Dashboard</a>
                            </li>
                        @endauth
                    </ul>
                    <span class="navbar-text text-white mr-5">



                        <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                                <li class="nav-item">
                                <a class="nav-link @linkactive('login')" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                    <a class="nav-link @linkactive('register')" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ ucfirst(Auth::user()->name) }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                    </ul>

                    </span>
                    <span class="navbar-text text-white">
                           <span class="time active"><?=date('d-m-Y'); ?></span>
                    </span>
                </div>
            </nav>
            </div>
        </div>
    </div>

    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible mt-4" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Закрыть">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ $message }}
            </div>
        @endif
    </div>

    <div class="min-vh-100">
        @yield ('content')
    </div>

    <div class = "row mt-1" id="gf">
        <div class = "col-md-12">
            <footer class="page-footer font-small bg-light big-letters">
                <div class="row justify-content-around">

                    <div class="footer-copyright py-3 text-center text-secondary col-md-4">© <?=date('Y') ?> Copyright:
                        <a href="#" class="text-secondary">#ArticlesBlog</a>
                    </div>

                    <div class="col-md-4 align-self-center">
                        <form class="form-inline my-2 my-lg-0" action="{{ route('post.search')}}">
                            <input class="form-control mr-sm-2 big-letters" type="search" name="search" aria-label="Search">
                            <button class="btn btn-outline-secondary big-letters my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>

                </div>

            </footer>
        </div>
    </div>

</div>


<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>
</body>
</html>
