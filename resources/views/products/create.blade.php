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

        label {
            display: inline-block;
            font-size: 24px;
        }

        .form-control {
            background: #fff !important;
        }`
    </style>

    <section class="container">
        <h1 class="product_title entry-title"> Create New Product</h1>
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <form method="post" action="/products/store">
                @csrf
                <input type="hidden" name="product_id" value="user_id">

                <div class="col-sm-6">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="100%"
                            xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"></rect>
                        <text x="50%" y="50%" fill="#eceeef">Thumbnail</text>
                    </svg>

                    <!--<label for="img">Select image:</label>
                    <input type="file" id="img" name="img" accept="image/*"> -->
                </div>

                <div class="col-sm-6">
                    <div class="summary entry-summary">
                        <label> Product Name </label>
                        <p>
                            <input type="text" class="form-control" name="name" placeholder="Product Name">
                        </p>

                        <label>Slug </label>
                        <p class="slug">
                                <bdi>
                                    <input type="text" class="form-control" name="slug" placeholder=" Enter slug text  ">
                                </bdi>
                            </span>
                        </p>

                        <div class="product_meta">
                            <label> Categories:</label>
                            <p>
                                <select name="category[]"  class="form-select form-select-lg mb-3 selectpicker" multiple="multiple" data-live-search="true">
                                    <option>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category["id"] }}" > {{ ucfirst($category['name']) }} </option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="btn-group btn-group-lg" role="group" aria-label="Basic mixed styles example">
                    <button type="submit" name="submit" class="btn btn-lg btn-success" value="add"> Add </button>
                    <button type="submit" name="submit" class="btn btn-lg" id="back" onclick="history.back()"> Cancel </button>
                </div>
            </form>
        </div>
    </section>
@endsection


