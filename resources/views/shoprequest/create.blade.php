<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

<h1>Shoprequest Register</h1>
<hr>
<form action="{{ url('shoprequestprocess') }}" method="post" enctype="multipart/form-data">
    @csrf
<div class="form-group">
    <label for="requestdate">Request Date</label>
    <input type="requestdate" class="form-control" name="requestdate" >
</div>
<div class="form-group">
    <label for="shopid">Shop ID</label>
    <input type="text" class="form-control" name="shopid" />
</div>
<div class="form-group">
    <label for="permission">Permission</label>
    <input type="text" class="form-control" name="permission" />
</div>
<div class="form-group">
    <label for="staffid">Staff ID</label>
    <input type="text" class="form-control" name="staffid" >
</div>

<button type="submit" class="btn btn-primary">create shoprequest</button>
</form>

<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

