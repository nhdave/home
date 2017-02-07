@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="jumbotron" align="center">
                <h1>Dashboard</h1>
                <hr>
                <h4>You are logged in!</h4>
                <a href="{{url('/categories')}}">Categories</a>
                <a href="{{url('/articles')}}">Articles</a>
            </div>
         </div>
              
          </div>
            
    </div>
</div>
@endsection
