@extends ('layouts.layout')

@section ('content')

    <div class="container">

        <div class="row mt-5 mb-3">
            <div class="col-md-12">

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/images/slider_1.jpg" class="d-block w-30" width="1500" height="300" style="filter: grayscale(90%); ">
                        </div>
                        @php
                            $banners = scandir('../public/images');
                            $output_banners = array_slice($banners, 3);
                        @endphp
                        @for ($i = 1; $i < count($output_banners); $i++)
                            <div class="carousel-item">
                                <img src="/images/{{ $output_banners[$i] }}" class="d-block w-30" width="1500" height="300" style="filter: grayscale(90%);">
                            </div>
                        @endfor

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <h3 class="font-weight-bold">About this blog</h3>
                <p class="text-justify">You can register to post an article or use ready-made credentials:</p>
                <p class="text-justify">Login: user@example.com <br>Password:123</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mt-5 mb-5">
                <div class="card-deck">
                    @foreach($posts as $post)
                        <div class="card">
                            <div id="pic_welcome_wrapper" class="shadow-sm p-3 mb-5 bg-white rounded">
                                <a href="{{ route('post.show', $post->id) }}">
                                    @isset($post->image)
                                        <img src="{{ $post->image }}" class="card-img-top" id="pic">
                                    @else
                                        <img src="{{ asset('images/no_image.jpg') }}" class="card-img-top" id="pic">
                                    @endisset
                                </a>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('post.show', $post->id) }}"><h5 class="card-title">{{ $post->title }}</h5></a>
                                <p class="card-text">{{ $post->excerpt }}...</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Added
                                    @php
                                        $days = round((time() - $post->created_at) / 86400);
                                        if ($days < 1) {
                                            echo 'today';
                                        }
                                        else if($days == 1) {
                                            echo '1 day ago';
                                        }
                                        else {
                                            echo $days . ' days ago';
                                        }
                                    @endphp
                                </small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>

@endsection
