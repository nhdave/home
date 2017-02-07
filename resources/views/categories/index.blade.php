@extends('layouts.app')

@section('menu')
    <li><a href="{{ url('/home') }}">Dashboard</a></li>
@stop 

@section('header')
    Categories
@stop

@section('content')
@foreach($categories->where('parent_id', null)->chunk(2) as $list)
<div class="row">
	@foreach($list as $listItem)
    <div class="col-md-6">
    	<ul>
    	<li class="list-group-item"><strong>{{$listItem->name}}</strong>
                
                <form action="{{ route('categories.destroy', $listItem->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-xs btn-danger pull-right"><i class="glyphicon glyphicon-xs glyphicon-remove "></i></button>
                </form>
                <span class="pull-right"> | </span>
                <a href="{{url('categories/createSub', $listItem->id)}}" class="btn btn-xs btn-success pull-right"> <span class="glyphicon glyphicon-plus"></span></a>

                
                </li>
        @if (($categories->where('parent_id', $listItem->id)->count()) > 0)
            @include('partials.listSubCategory')
        @endif
        
        </ul>
    </div>

    @endforeach

</div>
<hr>
@endforeach


<div align="center"><a class="btn btn-primary" href="{{ route('categories.create') }}"><i class="glyphicon glyphicon-plus"></i> New Root Category</a><br>
        <a class="btn btn-link" href="{{ url('/home') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
        </div>
        <br>
@stop