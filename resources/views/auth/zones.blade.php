@if(count($zones)>0)
    <option value="">Choose state</option>
    @foreach($zones as $zone)
        <option value="{{$zone->id}}">{{ $zone->name}}</option>

    @endforeach

@endif