<div class="col-sm-6">
    <h4>Add Category</h4>
    <hr>
    <form action="{{ route('category.store')}}" class="form-inline" method="post">
        {{csrf_field()}}
        <input type="hidden" name="company_id" value="{{Auth::user()->company_id}}" id="">
        <div class="form-group">
            <label for="name" class="col-sm-2">Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name">
            </div>
        </div>
        <button class="btn btn-success" type="submit">Submit</button>
    </form>
    @error('name')
        <span class="help-block text-color">
            <strong>{{$message}}</strong>
        </span>
    @enderror
</div>