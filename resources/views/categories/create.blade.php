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
        <h1 class="category_title entry-title"> Add New Category</h1>
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <form method="post" action="/categories/store">
                @csrf
                <input type="hidden" name="user_id">

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
                        <label> Category Name </label>
                        <p>
                            <input type="text" class="form-control" name="name" placeholder="Category Name">
                        </p>

                        <label> Category Description </label>
                        <p class="description">
                            <span class="category-description-amount amount">
                                <bdi>
                                    <textarea name="description" class="form-control" placeholder="Category Description"></textarea>
                                </bdi>
                            </span>
                        </p>
                    </div>
                </div>

                <div class="btn-group btn-group-lg" role="group" aria-label="Basic mixed styles example">
                    <button type="submit" name="submit" class="btn btn-lg btn-success" value="add"> Add </button>
                    <button type="submit" name="submit" class="btn btn-lg" id="back" value=""> Cancel </button>
                </div>
            </form>
        </div>
    </section>
@endsection