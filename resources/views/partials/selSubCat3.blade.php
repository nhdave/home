@foreach($categories->where('parent_id', $listItem->id) as $listItem) 
<option value="{{$listItem->id}}">{{ str_repeat($spacer, 4).$listItem->name }}</option>
@if (($categories->where('parent_id', $listItem->id)->count()) > 0)
<?php str_pad($spacer, 6, "*", STR_PAD_LEFT); ?>
@include('partials.selSubCat4')
@endif

@endforeach