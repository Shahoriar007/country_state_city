@extends('/layout')

@section('page_title','Size')

@section('size_select','active')

@section('container')

    {{session('message')}}

    <div class="card-body">
        <a href="{{url('/state/manage_state')}}">
        <button type="button" class="btn btn-success">Add State</button>
        </a>

        <h1>Checking branching</h1>
    </div>

    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>

                @foreach($result as $list)

                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->country_id}}</td>
                    <td>{{$list->state}}</td>
                    <td>

                        <a href="{{url('/state/manage_state/')}}/{{$list->id}}">
                            <button type="button" class="btn btn-success">Edit</button>
                        </a>


                        <a href="{{url('/state/delete/')}}/{{$list->id}}">
                            <button type="button" class="btn btn-danger">Delete</button>
                        </a>

                        
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>

        <br><br>

        <!-- Soft Deletes -->
        
    </div>
@endsection