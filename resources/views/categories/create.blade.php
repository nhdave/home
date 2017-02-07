@extends('layouts.app')

@section('menu')
    <li><a href="{{ url('/home') }}">Dashboard</a></li>
@stop

@section('header')
    <i class="glyphicon glyphicon-plus"></i> Create a Root Category
@stop

@section('content')
    <div class="row">
    	<div class="col-md-6 col-md-offset-3">

            <form class="form-horizontal" action="{{ route('categories.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label class="control-label col-sm-2" for="name-field">Name</label>
                       <div class="col-sm-8">
                        <input type="text" id="name-field" name="name" class="form-control" value="{{ old("name") }}"/>
                       </div>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
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