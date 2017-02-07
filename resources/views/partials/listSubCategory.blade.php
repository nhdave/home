@foreach($categories->where('parent_id', $listItem->id) as $listItem)
<ul>
    	
    <li class="list-group-item"><a href="{{route('categories.show', $listItem->id)}}">{{$listItem->name}}</a>
                                                <form action="{{ route('categories.destroy', $listItem->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                									<input type="hidden" name="_method" value="DELETE">
                    								<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    								<button type="submit" class="btn btn-xs btn-danger pull-right"><i class="glyphicon glyphicon-xs glyphicon-remove"></i></button>
                								</form>
                								<span class="pull-right"> | </span>
                                        		<a href="{{url('categories/createSub', $listItem->id)}}" class="btn btn-xs btn-success pull-right"><span class="glyphicon glyphicon-plus"></span></a>
                                                </li>
        @if (($categories->where('parent_id', $listItem->id)->count()) > 0)
            @include('partials.listSubCategory')
        @endif
        
</ul>
@endforeach