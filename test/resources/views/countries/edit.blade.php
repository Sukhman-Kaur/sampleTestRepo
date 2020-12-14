@extends('header')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Edit a Country</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('countries.update',$country->id) }}">
          @csrf
          <div class="form-group">
              <label for="first_name">Name</label>
          <input type="text" class="form-control" name="name" value="{{$country->name}}"/>
          </div>

          <div class="form-group">
              <label for="last_name">Region</label>
              <input type="text" class="form-control" name="region" value="{{$country->region}}"/>
          </div>

          <div class="form-group">
              <label for="email">Capital</label>
              <input type="text" class="form-control" name="capital" value="{{$country->capital}}"/>
          </div>
          <div class="form-group">
              <label for="city">Native Name</label>
              <input type="text" class="form-control" name="native_name" value="{{$country->native_name}}"/>
          </div>
          <div class="form-group">
              <label for="country">Languages</label>
              <input type="text" class="form-control" name="languages"/>
          </div>
        <p>
        Currencies: <input type="submit" id="addCurrency" value="+">
        <div id="curr_fields"></div>
        </p>
          <button type="submit" class="btn btn-primary-outline">Add Currency</button>
      </form>
  </div>
</div>
</div>
@endsection
