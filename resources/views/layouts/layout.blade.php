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


    <title>ArticleBlog</title>
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
            <nav class="navbar navbar-expand-lg navbar-dark bg-danger" id="gf">
                <a class="navbar-brand" href="/">#ArticlesBlog</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{ Request::path() == '/' ? 'active' : ''}}">
                            <a class="nav-link" href="{{ route('main.welcome') }}">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item {{ strpos(Request::path(), 'post') !== false ? 'active' : ''}}">
                            <a class="nav-link" href="{{ route('post.index') }}">All posts</a>
                        </li>
                        <li class="nav-item {{ strpos(Request::path(), 'categor') !== false ? 'active' : ''}}">
                            <a class="nav-link" href="{{ route('category.index') }}">Category</a>
                        </li>
                        <li class="nav-item {{ strpos(Request::path(), 'create') !== false ? 'active' : ''}}">
                            <a class="nav-link" href="{{ route('post.create') }}">Create post</a>
                        </li>
                    </ul>
                    <span class="navbar-text text-white mr-5">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item {{ Request::path() == 'login' ? 'active' : ''}}">
                                    <a class="nav-link" href="/login">Login</a>
                                </li>
                                <li class="nav-item {{ Request::path() == 'register' ? 'active' : ''}}">
                                    <a class="nav-link" href="/register">Registration</a>
                                </li>
                            </ul>
                    </span>
                    <span class="navbar-text text-white">
                           <span class="time"><?=date('d-m-Y'); ?></span>
                    </span>
                </div>
            </nav>
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
            <footer class="page-footer font-small bg-light">
                <div class="row justify-content-around">

                    <div class="footer-copyright py-3 text-center text-secondary col-md-4">© <?=date('Y') ?> Copyright:
                        <a href="#" class="text-secondary">#ArticlesBlog</a>
                    </div>

                    <div class="col-md-4 align-self-center">
                        <form class="form-inline my-2 my-lg-0" action="{{ route('post.search')}}">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search">
                            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
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
