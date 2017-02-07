@extends('layouts.app')

@section('menu')
    <li><a href="{{ url('/home') }}">Dashboard</a></li>
@stop

@section('header')
    <i class="glyphicon glyphicon-align-justify"></i> {{$category->name}} Credential Records
@stop

@section('content')
    <div class="row">
    <div class="col-md-10 col-md-offset-1">
    @if($credentials->count())
                <table class="table table-condensed table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>USER NAME</th>
                            <th>PASSWORD</th>
                            <th>LINKS</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($credentials as $credential)

                            <tr>
                                <td>{{$credential->id}}</td>
                                <td>{{$credential->name}}</td>
                                <td>{{$credential->user_name}}</td>
                                <td>{{$credential->password}}</td>
                                <td>@foreach($credential->links as $link)
                                <a href="{{$link->url}}" target="_blank">{{"$link->label  "}}</a>
                                @endforeach</td>
                                <td class="text-right">
                                    
                                    <a class="btn btn-xs btn-warning" href="{{ route('credentials.edit', $credential->id) }}"><i class="glyphicon glyphicon-edit"></i></a>
                                    <form action="{{ route('credentials.destroy', $credential->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row" align="center">
                    {!! $credentials->render() !!}
                </div>
                                
                @else
                    <h3 class="text-center alert alert-info">Empty!</h3>
            @endif
    </div>
    </div>
@endsection
@section('footer')
    <div align="center">
        <a class="btn btn-primary" href="{{ route('credentials.create') }}"><i class="glyphicon glyphicon-plus"></i> Create New Credential</a><br>
        <a class="btn btn-link" href="{{ route('categories.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
    </div>  
    @parent

@stop