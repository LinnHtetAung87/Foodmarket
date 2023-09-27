@extends("foodmaster/staff_layout")
@section("contentb")


<hr>
<form action="{{ url('roleprocess') }}" method="post">
    @csrf

<div class="form-group">
    <label>Role Name</label>
    <input type="text" class="form-control" name="name" />
</div>

<button type="submit" class="btn btn-primary">Create Role</button>

</form>
@endsection


