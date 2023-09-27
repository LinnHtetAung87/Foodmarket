@extends("staff_layout")
@section("contentb")
@section('title',"shoprequestList")

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


<a href="{{ route('shoprequestprocess.create') }}" class ="btn btn-info btn-link">Add new shoprequest</a>
<div class="row mt-3 mb-3">
    <div class="col-4">
        <form action="{{ url('shoprequestprocess/searchprocess') }}" method="GET">
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
    <th scope="col">Request Date</th>
    <th scope="col">Shop ID</th>
    <th scope="col">Permission</th>
    <th scope="col">Staff ID</th>
    <th scope="col">Action</th>


</tr>
</thead>
<tbody>


@foreach ($data as $shoprequest)
    <tr>

        <th scope="row">{{ $shoprequest->id }}</th>
        <td><a href="/shoprequestprocess/{{ $shoprequest->id }}/edit"></a></td>
        <td>
            @if(isset($shoprequest))
                {{ $shoprequest->created_at->toFormattedDateString() }}
            @endif
        </td>
        <td>{{ $shoprequest->shopid }}</td>
        <td>{{ $shoprequest->permission }}</td>
        <td>{{ $shoprequest->staffid }}</td>
        
        <td>
                <a href="{{ url('shoprequestprocess/'.$shoprequest->id.'/edit') }}">
                <button type="button" class= "btn btn-warning">Edit</button>

                </a>&nbsp;
                <a href="{{ route('shoprequestprocess.edit',['shoprequestprocess'=>$shoprequest->id]) }}"></a>&nbsp;
                <form action="{{ url('shoprequestprocess',[$shoprequest->id]) }}" method="POST">
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

