<!-- resources/views/staff/edit.blade.php -->

@extends("foodmaster/staff_layout")
@section("contentb")
@section('title',"Staff Edit")

<form action="{{ url('staffprocess',[$staff->id]) }}" method="post">
    @method('PATCH')@csrf
<div class="form-group">
    <label for="name">Staff Name</label>
    <input type="text" class="form-control" name="staffname" value="{{ $staff->staffname }}" />
</div>
<div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" name="address" value="{{ $staff->address }}" />
</div>
<div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" class="form-control" name="phone" value="{{ $staff->phone }}" />
</div>
<div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email" value="{{$staff->email}}" />
</div>


<div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="password" value="{{ $staff->password }}" />
</div>
<div class="form-group">
    <label for="roleid">Role ID</label>
    <input type="text" class="form-control" name="roleid" value="{{ $staff->roleid }}" />
</div>
<button type="submit" class="btn btn-primary">Update staff</button>
</form>
@endsection
