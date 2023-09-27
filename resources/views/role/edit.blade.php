@extends("foodmaster/staff_layout")
@section("contentb")

<h1>Edit role Information</h1>
<hr>
<form action="{{ url('roleprocess',[$role->id]) }}" method="post">
    @method('PATCH')@csrf

<div class="form-group">
    <label>Role Name</label>
    <input type="text" class="form-control" name="name" value="{{$role->name}}" />
</div>

<button type="submit" class="btn btn-primary">Update role</button>
</form>




@endsection


