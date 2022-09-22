@extends('layouts.app')

@section('content')
    <style>
        /* GLOBAL STYLES
        -------------------------------------------------- */
        /* Padding below the footer and lighter body text */

        body {
            padding-bottom: 3rem;
            color: #5a5a5a;
        }


        /* CUSTOMIZE THE CAROUSEL
        -------------------------------------------------- */

        /* Carousel base class */
        .carousel {
            margin-bottom: 4rem;
        }
        /* Since positioning the image, we need to help out the caption */
        .carousel-caption {
            bottom: 3rem;
            z-index: 10;
        }

        /* Declare heights because of positioning of img element */
        .carousel-item {
            height: 32rem;
        }
        .carousel-item > img {
            position: absolute;
            top: 0;
            left: 0;
            min-width: 100%;
            height: 32rem;
        }


        /* MARKETING CONTENT
        -------------------------------------------------- */

        /* Center align the text within the three columns below the carousel */
        .marketing .col-lg-4 {
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .marketing h2 {
            font-weight: 400;
            margin-top: 10px;
        }
        /* rtl:begin:ignore */
        .marketing .col-lg-4 p {
            margin-right: .75rem;
            margin-left: .75rem;
        }
        /* rtl:end:ignore */


        /* Featurettes
        ------------------------- */

        .featurette-divider {
            margin: 5rem 0; /* Space out the Bootstrap <hr> more */
        }

        /* Thin out the marketing headings */
        .featurette-heading {
            font-weight: 300;
            line-height: 1;
            /* rtl:remove */
            letter-spacing: -.05rem;
        }


        /* RESPONSIVE CSS
        -------------------------------------------------- */

        @media (min-width: 40em) {
            /* Bump up size of carousel content */
            .carousel-caption p {
                margin-bottom: 1.25rem;
                font-size: 1.25rem;
                line-height: 1.4;
            }

            .featurette-heading {
                font-size: 50px;
            }
        }

        @media (min-width: 62em) {
            .featurette-heading {
                margin-top: 7rem;
            }
        }
    </style>

    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
            <!--<button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"></rect></svg>
                <div class="container">
                    <div class="carousel-caption text-end">
                        <h1>Ultimate shopping experience with Buying What counts .</h1>
                        <p>An endless shopping, shipping and buying made simple</p>
                        @if (Auth::check())
                            <p><a class="btn btn-lg btn-primary" href="/category/create">Create New Category</a></p>
                        @else
                            <p><a class="btn btn-lg btn-primary" href="#">Browse Product Shop</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container marketing">
        <!-- Three columns of text below the carousel -->
        <div class="row">

            @foreach ($categories as $category)
                <div class="col-lg-4">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

                    <h2>{{ $category->name}}</h2>
                    <p> {{ $category->description }}</p>
                    <p><a class="btn btn-secondary" href="/category/{{ $category->id }}">View details »</a></p>

                    @if (Auth::check())
                        <p><a class="btn btn-warning" href="/category/edit/{{ $category->id }}">Edit</a></p>
                        <p><a class="btn btn-danger"
                            href="#" onclick="
                                var result = confirm('This will remove the Category and its Products?')
                                    if (result) {
                                        event.preventDefault();
                                        var askAgain = confirm('Are you sure?')
                                        if (askAgain) {
                                            event.preventDefault();
                                            document.getElementById('delete-form').submit()
                                        }
                                    }
                            "> Delete »
                            </a>
                        </p>
                    @endif
                </div>

                <form id="delete-form" action="category/destroy/{{ $category->id }}" method="POST" style="display: none">
                    @csrf
                    <input type="hidden" name="category" value="{{ $category->id }}">
                </form>
            @endforeach
        </div><!-- /.row -->
        <hr class="featurette-divider">


        <!-- /END THE FEATURETTES -->
    </div>
@endsection
