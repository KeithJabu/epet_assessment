@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    </br>
                    </br>
                    <h3> Lets Begin </h3>
                    </br>
                    <a href='/category'> View All Categories </a>
                    </br>
                    <a href='/products'> View Products Categories </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
