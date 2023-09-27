<!-- resources/views/shop/index.blade.php -->

@extends("foodmaster/staff_layout")
@section("contentb")
@section('title',"Shop List")

@if (Session::has('test'))
{{ Session::get('test') }}
@endif


@if (Session::has('Message'))
<div class="alert {{ Session::get('alert-class') }} alert-dismissible fade show" role="alert">
<p>{{ Session::get('Message') }}</p>

<button type="button" class="close" data-dismiss-"alert" aria-lable-"Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif
<a href="{{ route('shopprocess.create') }}" class ="btn btn-info btn-link">Add new shop</a>
<div class="row mt-3 mb-3">
    <div class="col-4">
        <form action="{{ url('shopprocess/searchprocess') }}" method="GET">
            <input type="search" name="keyword1" id="">
            <input type="search" name="keyword2" id="">
            <button type="submit">Search</button>
        </form>
    </div>
</div>

@if (count($data) === 1)
    one record!
@elseif (count($data) > 1)
    multiple records!
@else
    any records!
@endif

@empty ($data)
    // $record is "empty" .....
@endempty

<table class="table">
<thead class="thead-dark">



<tr>
    <th scope="col">#</th>
    <th scope="col">Shop Name</th>
    <th scope="col">Shop Logo</th>
    <th scope="col">Address</th>
    <th scope="col">Township</th>
    <th scope="col">Member Name</th>
    <th scope="col">City</th>
    <th scope="col">Email</th>
    <th scope="col">Password</th>
    <th scope="col">Action</th>



</tr>
</thead>
<tbody>


@foreach ($data as $shop)
    <tr>
        <th scope="row">{{ $shop->id }}</th>
        <td><a href="/shopprocess/{{ $shop->id }}/edit">{{ $shop->shopname }}</a></td>
        <td>
            <img src="{{asset('upload/'.$shop->shoplogo)}}" width="100" height="100" />
        </td>
        <td>{{ $shop->address }}</td>
        <td>{{ $shop->township }}</td>
        <td>{{ $shop->memberName }}</td>
        <td>{{ $shop->city }}</td>
        <td>{{ $shop->email }}</td>
        <td>{{ $shop->password }}</td>

        

                <td>
                <a href="{{ url('shopprocess/'.$shop->id.'/edit') }}">
                <button type="button" class= "btn btn-warning">Edit</button>

                </a>&nbsp;
                <a href="{{ route('shopprocess.edit',['shopprocess'=>$shop->id]) }}"></a>&nbsp;
                <form action="{{ url('shopprocess',[$shop->id]) }}" method="POST">
                <input type="hidden" name="_method" value="DELETE" />
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            </td>
        

    </tr>
@endforeach
</tbody>
</table>
{{-- {{ $data->links() }} --}}
                    </div>
             </div>

@endsection