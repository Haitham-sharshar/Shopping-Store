@csrf
@if($errors)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif
<hr>
<form>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" value="{{isset($category) ? $category->name : '' }}" id="name" name="name" placeholder="Enter Name">
    </div>
    @isset($category)
    <img src="{{asset('storage/'.$category->image)}}" width="100px" height="100px">
    @endisset
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="image"   name="image" >
    </div>


    <button type="submit" class="btn btn-primary">Save</button>
</form>