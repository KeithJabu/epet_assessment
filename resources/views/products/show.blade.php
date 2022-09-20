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
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary"> {{ ucfirst($product_item->name) }}</strong>
                    <h3 class="mb-0">
                        Catergory: <a class="text-dark" href="#"> {{ ucfirst($product_item["category_id"]) }}</a>
                    </h3>
                    <div class="mb-1 text-muted">Nov 12</div>
                    <p class="card-text mb-auto"> {{ ucfirst($product_item->slug) }} </p>
                    <a href="#">Continue reading</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1835c6e999d%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1835c6e999d%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.20000076293945%22%20y%3D%22131%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
            </div>

            <h3 class="mb-0">
                <a class="text-dark" href="#"> Different Product Variants  </a>
            </h3>
            <br>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($product_variants as $product_variant)

                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                            <div class="card-body">
                                <!-- <p class="card-text">{{ ucfirst($product_variant["name"]) }}</p> -->
                                <p class="card-text">{{ ucfirst($product_variant->name) }}</p>

                                <p class="card-text pull-right"><b>ZAR</b> {{ number_format($product_variant["price"], 2, ',', ' ') }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><a href="/products/{{ $product_variant["id"] }}"> View </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Add to Basket</button>
                                    </div>
                                    <small class="text-muted">
                                        <a href="/category/{{ $product_variant['category_id'] }}">
                                            {{ $product_variant['name'] }}
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
