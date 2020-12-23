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
        <input type="text" class="form-control" value="{{isset($product) ? $product->name : '' }}" id="name" name="name" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" value="{{isset($product) ? $product->price : '' }}" id="name" name="price" placeholder="Enter price">
    </div>
    <div class="form-group">
        <label for="description">description</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{isset($product) ? $product->description : ''}}</textarea>
    </div>
    @isset($product)
    <img src="{{asset('storage/'.$product->image)}}" width="100px" height="100px">
    @endisset
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" id="image"  name="image" >
    </div>
    <div class="form-group">
        <lable for="category">Category</lable>
        <select name="category_id" id="category" class="form-control">
            @foreach($categories as $category)
                <option value="{{$category->id}}" {{isset($product) && $category->id == $product->category_id ? 'selected' : ''}}>{{$category->name}}</option>
            @endforeach    
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>