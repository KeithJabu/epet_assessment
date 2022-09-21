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
            <h1> Shop </h1>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($products as $product_item)
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

                            <div class="card-body">
                                <p class="card-text">{{ ucfirst($product_item["name"]) }}</p>

                                <p class="card-text pull-right"><b>£ </b>{{ number_format($product_item["price"], 2, ',', ' ') }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        @if (!Auth::check())
                                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                                <a href="/products/{{ $product_item["id"] }}"> View
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                                <a href="orders/add_to_cart/{{ $product_item["id"] }}" >Add to Basket </a>
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                                <a href="/products/{{ $product_item["id"] }}"> View
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-warning">
                                                <a href="/products/edit/{{ $product_item["id"] }}"> Edit
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-danger">
                                                <a
                                                    href="#" onclick="
                                                        var result = confirm('Are you sure you wish to delete this Product?')
                                                            if (result) {
                                                                event.preventDefault();
                                                                document.getElementById('delete-form').submit()
                                                            }
                                                    "> Delete
                                                </a>
                                            </button>
                                        @endif
                                    </div>

                                    <form id="delete-form" action="products/destroy/{{ $product_item["id"] }}" method="POST" style="display: none">
                                        @csrf
                                        <input type="hidden" name="product" value="{{ $product_item["id"] }}">
                                    </form>

                                    <small class="text-muted">
                                            <a href="/categories/{{ $product_item['category_id'] }}">
                                                {{ $product_item['category_id'] }}
                                            </a>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="navigation">
                <span> {{ $products->links() }} </span>
            </div>
        </div>
    </div>
@endsection
