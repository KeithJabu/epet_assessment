@extends('layouts.app')

@section('content')

    <style>
        .summary {
            margin: 20px;
        }

        .quantity {
            padding-bottom: 15px;
        }

        #back {
            border: 2px solid #d7d6d6;
        }
        #back:hover {
            border: 2px solid #d7d6d6;
            background-color: #15141417;
        }

        #add_to_cart a {
            color: #fff !important;
        }

        .product_meta {
            margin-top: 10px;
        }
    </style>

    <section class="container">
        <h1> Product Item: {{ ucfirst($product_variant['name']) }} </h1>
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col-sm-6">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="100%"
                     xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#55595c"></rect>
                    <text x="50%" y="50%" fill="#eceeef">Thumbnail</text>
                </svg>
            </div>

            <div class="col-sm-6">
                <div class="summary entry-summary">
                    <h1 class="product_title entry-title"> {{ ucfirst($product_variant['name']) }}</h1>
                    <p class="price">
                        <span class="product-Price-amount amount"><bdi><span class="product-Price-currencySymbol">R</span>{{ number_format($product_variant["price"], 2, ',', ' ') }}</bdi></span>
                    </p>

                    <div class="product-product-details__short-description">
                        <p>{{ ucfirst($product_variant->name) }}</p>
                    </div>

                    <form class="cart" action="product/3-beared-gnome/" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="thwepof_product_fields" name="thwepof_product_fields" value="">

                        <button type="button" class="btn btn-primary" id="add_to_cart">
                            <a href="/orders/add_to_cart/{{ $product_variant['id'] }}" >Add to Basket </a>
                        </button>
                    </form>

                    <div class="product_meta">
                        <span class="posted_in">
                            Categories:
                            <a href="/categories/{{ $product_variant['category_id'] }}">
                                {{ $product_variant['category_id'] }}
                            </a
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <button class="btn btn-block" id="back" onclick="history.back()"> Back </button>
        </div>
    </section>
@endsection
