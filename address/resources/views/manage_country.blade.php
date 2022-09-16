@extends('/layout')

@section('size_select','active')

@section('page_title','Manage Size')

@section('container')
    <h3>Manage Country</h3>

    <div class="card-body">
        <a href="{{url('/country')}}">
        <button type="button" class="btn btn-success">Back</button>
        </a>
    </div>

    
        <div class="card">
            <div class="card-header">Manage Country</div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Country</h3>
                </div>
                <hr>

                <form action="{{route('country.manage_country_process')}}" method="post" >
                    @csrf

                    <div class="form-group">
                        <label for="country" class="control-label mb-1">Country</label>
                        <input id="country" value="{{$country}}" name="country" type="text" class="form-control" aria-required="true" aria-invalid="false" required >
                    </div>

                    @error('country')
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