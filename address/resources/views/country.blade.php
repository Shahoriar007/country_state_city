@extends('/layout')

@section('page_title','Size')

@section('size_select','active')

@section('container')

    {{session('message')}}

    <div class="card-body">
        <a href="{{url('/country/manage_country')}}">
        <button type="button" class="btn btn-success">Add Country</button>
        </a>
    </div>

    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Country</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>

                @foreach($result as $list)

                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->country}}</td>
                    <td>

                        <a href="{{url('/country/manage_country/')}}/{{$list->id}}">
                            <button type="button" class="btn btn-success">Edit</button>
                        </a>

                        


                        <a href="{{url('/country/delete/')}}/{{$list->id}}">
                            <button type="button" class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>

        <br><br>

        <!-- Soft Deletes -->
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Country</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>

                @foreach($trashPosts as $list)

                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->country}}</td>
                    <td>

                        <a href="{{url('/country/restore_country/')}}/{{$list->id}}">
                            <button type="button" class="btn btn-success">Restore</button>
                        </a>

                        <a href="{{url('/country/permanent_delete/')}}/{{$list->id}}">
                            <button type="button" class="btn btn-danger">Permanent Delete</button>
                        </a>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
@endsection