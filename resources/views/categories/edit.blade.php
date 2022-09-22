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
        <h1 class="category_title entry-title"> Edit: {{ ucfirst($category['name']) }}</h1>
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <form method="post" action="/category/update">
                @csrf
                <input type="hidden" name="category_id" value="{{ $category['id'] }}">

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
                        <label> Category Name </label>
                        <p>
                            <input type="text" class="form-control" name="name" value="{{ ucfirst($category['name']) }}">
                        </p>

                        <label> Category Description </label>
                        <p class="meta_description">
                            <span class="category-description-amount amount">
                                <bdi>
                                    <textarea name="meta_description" class="form-control"> {{ $category["meta_description"] }} </textarea>
                                </bdi>
                            </span>
                        </p>

                        <label> Category key Words </label>
                        <p class="meta_description">
                            <span class="category-description-amount amount">
                                <bdi>
                                    <textarea name="meta_keywords" class="form-control"> {{ $category["meta_keywords"] }} </textarea>
                                </bdi>
                            </span>
                        </p>

                        <label> Category title </label>
                        <p class="meta_description">
                            <span class="category-description-amount amount">
                                <bdi>
                                    <textarea name="meta_title" class="form-control"> {{ $category["meta_title"] }} </textarea>
                                </bdi>
                            </span>
                        </p>

                    </div>
                </div>

                <div class="btn-group btn-group-lg" role="group" aria-label="Basic mixed styles example">
                    <button type="submit" name="submit" class="btn btn-lg btn-success" value="Update"> Update </button>
                    <button type="submit" name="submit" class="btn btn-lg" id="back" value=""> Cancel </button>
                </div>
            </form>
        </div>
    </section>
@endsection
