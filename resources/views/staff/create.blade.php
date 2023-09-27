@extends("foodmaster/staff_layout")
@section("contentb")
@section('title',"Staff Create")

<form action="{{ url('staffprocess') }}" method="post" enctype="multipart/form-data">
    @csrf
<div class="form-group">
    <label for="staffname">Staff Name</label>
    <input type="text" class="form-control" name="staffname" >
</div>
<div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" name="address" >
</div>
<div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" class="form-control" name="phone" >
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email" />
</div>
<div class="form-group">
    <label for="password">Password</label>
    <textarea class="form-control" name="password"></textarea>
</div>
<div class="form-group">
    <label for="roleid">Role ID</label>
    <input type="text" class="form-control" name="roleid" >
</div>

<button type="submit" class="btn btn-primary">create staff</button>
</form>

@endsection

