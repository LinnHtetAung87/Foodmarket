@extends("foodmaster/staff_layout")
@section("contentb")
@if (Session::has('Message'))
<div class="alert {{ Session::get('alert-class') }} alert-dismissible fade show" role="alert">
<p>{{ Session::get('Message') }}</p>
<button type="button" class="close" role-dismiss-"alert" aria-lable-"Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif
@foreach ($role as $category)
    @if ($loop->first)
    <select>
    @endif
    <option value="categoryid">Category Name 1</option>
    <option value="2">Category Name 2</option>
    <option value="3">Category Name 3</option>
    @if($loop->last)
    </select>
    @endif
    <a href="{{ route('roleprocess.create') }}" class ="btn btn-info btn-link">Add new role</a>

@endforeach


@if (count($role) === 1)
    one record!
@elseif (count($role) > 1)
    multiple records!
@else
    any records!
@endif

@empty ($role)
    // $record is "empty" .....
@endempty

<table class="table">
<thead class="thead-dark">



<tr>
    <th scope="col">#</th>
    <th scope="col">Name</th>
    <th scope="col">Date</th>
    <th scope="col">Action</th>
</tr>
</thead>
<tbody>


@foreach ($role as $role)
    <tr>
        <th scope="row">{{ $role->id }}</th>
        <td><a href="/roleprocess/{{ $role->id }}/edit">{{ $role->name }}</a></td>


        <td>

            @if(isset($role))
                {{ $role->created_at->toFormattedDateString() }}
            @endif
            <td>
                <a href="{{ url('roleprocess/'.$role->id.'/edit') }}">
                <button type="button" class= "btn btn-warning">Edit</button>

                </a>&nbsp;
                <a href="{{ route('roleprocess.edit',['roleprocess'=>$role->id]) }}"></a>&nbsp;
                <form action="{{ url('roleprocess',[$role->id]) }}" method="POST">
                <input type="hidden" name="_method" value="DELETE" />
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            </td>
        </td>
    </tr>
@endforeach
</tbody>
</table>

                    </div>
             </div>
       @endsection
