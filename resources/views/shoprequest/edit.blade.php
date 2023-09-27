<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

<h1>Edit shoprequest Information</h1>
<hr>
<form action="{{ url('shoprequestprocess',[$shoprequest->id]) }}" method="post">
    @method('PATCH')@csrf
<div class="form-group">
    <label for="requestdate">Request Date</label>
    <input type="text" class="form-control" name="requestdate" value="{{ $shoprequest->requestdate }}" />
</div>
<div class="form-group">
    <label for="shopid">Shop ID</label>
    <input type="text" class="form-control" name="shopid" value="{{$shoprequest->shopid}}" />
</div>
<div class="form-group">
    <label for="permission">Permission</label>
    <input type="text" class="form-control" name="permission" value="{{ $shoprequest->permission }}" />
</div>
<div class="form-group">
    <label for="staffid">Staff ID</label>
    <input type="text" class="form-control" name="staffid" value="{{ $shoprequest->staffid }}" />
</div>
<button type="submit" class="btn btn-primary">Update shoprequest</button>
</form>

<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

