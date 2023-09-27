
@extends("foodmaster/staff_layout")
@section("contentb")
@section('title',"Shop Edit")

<form action="{{ url('shopprocess',[$shop->id]) }}" method="post">
    @method('PATCH')@csrf
<div class="form-group">
    <label for="shopname">Shop Name</label>
    <input type="text" class="form-control" name="shopname" value="{{ $shop->shopname }}">
</div>
<div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" name="address" value="{{$shop->address}}" />
</div>
<div class="form-group">
    <label for="township">Township</label>
    <input type="text" class="form-control" name="township" value="{{$shop->township}}" />
</div>
<div class="form-group">
    <label for="memberName">Member Name</label>
    <input type="text" class="form-control" name="memberName" value="{{ $shop->memberName }}" />
</div>

<div class="form-group">
    <label for="city">City</label>
    <input type="text" class="form-control" name="city" value="{{ $shop->city }}" />
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email" value="{{ $shop->email }}" />
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" value="{{ $shop->password }}" />
</div>
<div class="form-group">
    <label for="shoplogo">Shop Logo</label>
    <input type="file" class="form-control" name="shoplogo" value="{{ $shop->shoplogo }}" />
</div>
<button type="submit" class="btn btn-primary">Update shop</button>
</form>

@endsection
