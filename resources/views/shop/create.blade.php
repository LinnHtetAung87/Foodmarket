
@extends("foodmaster/staff_layout")
@section("contentb")
@section('title',"Shop Create")

<form action="{{ url('shopprocess') }}" method="post" enctype="multipart/form-data">
    @csrf
<div class="form-group">
    <label for="shopname">Shop Name</label>
    <input type="text" class="form-control" name="shopname" >
</div>
<div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" name="address" />
</div>
<div class="form-group">
    <label for="township">Township</label>
    <input type="text" class="form-control" name="township" />
</div>
<div class="form-group">
    <label for="memberName">Member Name</label>
    <input type="text" class="form-control" name="memberName" />
</div>
<div class="form-group">
    <label for="city">City</label>
    <input type="text" class="form-control" name="city" >
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email" >
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" >
</div>
<div class="form-group">
    <label for="shoplogo">Shop Logo</label>
    <input type="file" class="form-control" name="shoplogo" >
</div>
<button type="submit" class="btn btn-primary">Create shop</button>
</form>

@endsection

