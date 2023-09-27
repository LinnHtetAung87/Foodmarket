<!-- resources/views/staff/index.blade.php -->

@extends("foodmaster/staff_layout")
@section("contentb")
@section('title',"staffList")

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
<a href="{{ route('staffprocess.create') }}" class ="btn btn-info btn-link">Add new staff</a>
<div class="row mt-3 mb-3">
    <div class="col-4">
        <form action="{{ url('staffprocess/searchprocess') }}" method="GET">
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
    <th scope="col">Name</th>
    <th scope="col">Address</th>
    <th scope="col">Phone</th>
    <th scope="col">Email</th>
    <th scope="col">Password</th>
    <th scope="col">Role ID</th>
    <th scope="col">Action</th>


</tr>
</thead>
<tbody>


@foreach ($data as $staff)
    <tr>
        <th scope="row">{{ $staff->id }}</th>
        <td><a href="/staffprocess/{{ $staff->id }}/edit">{{ $staff->staffname }}</a></td>
        <td>{{ $staff->address }}</td>
        <td>{{ $staff->phone }}</td>
        <td>{{ $staff->email }}</td>
        <td>{{ $staff->password }}</td>
        <td>{{ $staff->roleid }}</td>

        

                <td>
                <a href="{{ url('staffprocess/'.$staff->id.'/edit') }}">
                <button type="button" class= "btn btn-warning">Edit</button>

                </a>&nbsp;
                <a href="{{ route('staffprocess.edit',['staffprocess'=>$staff->id]) }}"></a>&nbsp;
                <form action="{{ url('staffprocess',[$staff->id]) }}" method="POST">
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




