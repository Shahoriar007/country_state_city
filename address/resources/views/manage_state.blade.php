@extends('/layout')

@section('size_select','active')

@section('page_title','Manage Size')

@section('container')
    <h3>Manage State</h3>

    <div class="card-body">
        <a href="{{url('/state')}}">
        <button type="button" class="btn btn-success">Back</button>
        </a>
    </div>

    
        <div class="card">
            <div class="card-header">Manage State</div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">State</h3>
                </div>
                <hr>

                <form action="{{route('state.manage_state_process')}}" method="post" >
                    @csrf

                    <div class="form-group">
                        <label for="country_id" class="control-label mb-1">Country</label>
                        <select id="country_id" name="country_id" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                           
                        <option>Select Countries</option>

                            @foreach($country as $list)
                                @if($country_id==$list->id)
                                    <option selected value="{{$list->id}}">
                                @else
                                    <option value="{{$list->id}}">
                                @endif
                                    {{$list->country}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="state" class="control-label mb-1">State</label>
                        <input id="state"  value="{{$state}}" name="state" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                    </div>

                    

                    @error('state')
                    {{$message}}
                    @enderror

                    
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                           Submit
                        </button>
                    </div>

                    <input type="hidden" name="id" value="{{$id}}">
                </form>
            </div>
        </div>
    
@endsection