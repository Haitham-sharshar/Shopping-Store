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
        <input type="text" class="form-control" value="{{isset($user) ? $user->name : '' }}" id="name" name="name" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" value="{{isset($user) ? $user->email : '' }}"  name="email" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="name">Type</label>
        <select name="type" id="type" class="form-control">
            <option value="admin" {{isset($user) &&  $user->type == 'admin' ? 'checked' : '' }}>Admin</option>
            <option value="client" {{isset($user) &&  $user->type == 'client' ? 'checked' : '' }}>Client</option>
        </select>
    </div>
    <div class="form-group">
        <label for="name">Password</label>
        <input type="password" class="form-control" id="pasword" name="password"  placeholder="Enter Password">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>