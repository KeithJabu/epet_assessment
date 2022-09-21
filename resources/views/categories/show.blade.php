@extends('layouts.app')

@section('content')
    <style>
        .w-5 { display: none; }
        .navigation {
            text-align: center;
            line-height: 3;
            margin-top: 20px;
            font-weight: 600;
        }

        p { /*display: inline;*/ }
    </style>

    <div class="album py-5 bg-light">
        <div class="container">
            <h1> Shop for Category: {{ ucfirst($category["name"]) }} </h1>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($products as $product)
                        <div class="col">
                            <div class="card shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                                <div class="card-body">
                                    <p class="card-text">{{ ucfirst($product["name"]) }}</p>

                                    <p class="card-text pull-right"><b>ZAR</b>{{ number_format($product["price"], 2, ',', ' ') }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><a href="/products/{{ $product["id"] }}"> View </button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Add to Basket</button>
                                        </div>
                                        <small class="text-muted">
                                            <a href="/category/{{ $product['category_id'] }}">
                                                {{ $category['name'] }}
                                            </a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
