@extends('layouts.app')

@section('header')
    <i class="glyphicon glyphicon-plus"></i> Create an Article
@stop

@section('content')
    <div class="row">
    	<div class="col-md-10 col-md-offset-1">

            <form class="form-horizontal" action="{{ route('articles.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('title')) has-error @endif">
                       <label class="control-label col-sm-2" for="title-field">Title</label>
                       <div class="col-sm-8">
                        <input type="text" id="title-field" name="title" class="form-control" value="{{ old("title") }}"/>
                       </div>
                       @if($errors->has("title"))
                        <small><span class="help-block">{{ $errors->first("title") }}</span></small>
                       @endif
                </div>

                <div class="form-group @if($errors->has('body')) has-error @endif">
                       <label>Body</label>
                       <textarea rows="20"  name="body" class="form-control" placeholder="{{ old("body") }}">
                        
                       </textarea>
                       @if($errors->has("body"))
                        <small><span class="help-block">{{ $errors->first("body") }}</span></small>
                       @endif
                </div>

                <div class="form-group @if($errors->has('category_id')) has-error @endif">
                  <label for="category_id" class="control-label col-xs-2">Category ID</label>
                  <div class="col-xs-8">
                    <select id="category_id" name="category_id" class="form-control"/>
                    <option value="" disabled="disabled" selected="selected">Please select a category</option>
                      @foreach( $categories->where('parent_id', null) as $listItem)
                        <option value="{{$listItem->id}}">{{ $listItem->name }}</option>
                        @if (($categories->where('parent_id', $listItem->id)->count()) > 0)
                          @include('partials.selSubCat')
                        @endif
                      @endforeach
                    </select>
                  </div>
                  @if($errors->has("category_id"))
                        <small><span class="help-block">{{ $errors->first("category_id") }}</span></small>
                       @endif
                </div>

                <div class="form-group" align="center">
                    <button type="submit" class="btn btn-primary">Create</button><br>
                    <a class="btn btn-link" href="{{ route('categories.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>
        </div>
    </div>

        
@stop 