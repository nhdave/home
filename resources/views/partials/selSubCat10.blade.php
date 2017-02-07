@foreach($categories->where('parent_id', $listItem->id) as $listItem) 
<option value="{{$listItem->id}}">{{ str_repeat($spacer, 10).$listItem->name }}</option>
@endforeach