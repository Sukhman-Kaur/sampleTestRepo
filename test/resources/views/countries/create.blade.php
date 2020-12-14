@extends('header')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a Country</h1>
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
      <form method="post" action="{{ route('countries.store') }}">
          @csrf
          <div class="form-group">
              <label for="first_name">Name</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="last_name">Region</label>
              <input type="text" class="form-control" name="region"/>
          </div>

          <div class="form-group">
              <label for="email">Capital</label>
              <input type="text" class="form-control" name="capital"/>
          </div>
          <div class="form-group">
              <label for="city">Native Name</label>
              <input type="text" class="form-control" name="native_name"/>
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
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<script>

    countCurr=0;
    $(document).ready(function(){
	$('#addCurrency').click(function(event){
		event.preventDefault();
        var source=$('#Currency-template').html();
        countCurr++;
		$('#curr_fields').append(source.replace(/@COUNT@/g, countCurr));
	});
});
</script>
<script id="Currency-template" type="text">
	<div id="Currency@COUNT@">
        <p>Name: <input type="text" name="Currency_@COUNT@_name" value=""/><br>
            <p>Symbol: <input type="text" name="Currency_@COUNT@_symbol" value=""/>
        <!--<input type="button" value="-"
        onclick="('#Currency@COUNT@').remove();return false;"
            value="" />--!>
		</p>
	</div>
</script>
