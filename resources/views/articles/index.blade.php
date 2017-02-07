@extends('layouts.app')

@section('menu')
<li><a href="{{ url('/home') }}">Dashboard</a></li>
@stop 

@section('header')
<i class="glyphicon glyphicon-align-justify"></i> All Articles 
@stop 

@section('content') 

@unless ($articles->count())
<h3 class="text-center alert alert-info">No Articles</h3> 
@endunless 

@foreach ($articles->chunk(2) as $chunk)
<div class="row">
	@foreach ($chunk as $article)
	<div class="col-xs-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong><h1 align="center">{{ $article->title }}</h1></strong>
			</div>

			<div class="panel-body">
				<h4>{!!$article->body!!}</h4>
			</div>

			<div class="panel-footer">
				<form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete Article? Are you sure?')) { return true } else {return false };">
					<input type="hidden" name="_method" value="DELETE">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
				</form>
			</div>
		</div>
	</div>
	@endforeach
</div>
@endforeach 
@stop 

@section('footer')
<div align="center">
	<a class="btn btn-primary" href="{{ route('articles.create') }}"><i class="glyphicon glyphicon-plus"></i> Create New Article</a><br>
	<a class="btn btn-link" href="{{ url('/home') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
</div>
@parent 
@stop