@extends('header')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">List of Countries</h1>
  <table class="table table-striped">
    <thead class="thead-dark">
        <tr>
          <td>Name</td>
          <td>Region</td>
          <td>Capital</td>
          <td>Native name</td>
          <td>Languages</td>
          <td>Currencies</td>
          <td>Flag</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($countries as $country)
        <tr>
            <td>{{$country->name}}</td>
            <td>{{$country->region}}</td>
            <td>{{$country->capital}}</td>
            <td>{{$country->native_name}}</td>
            <td>
                <ul>
                    @foreach(json_decode($country->languages) as $lang)
                        <li>{{$lang->name}}</li>
                    @endforeach
                </ul>
            </td>
            <td>
                <ul>
                    @foreach(json_decode($country->currencies) as $curr)
                        <li>{{$curr->name}}({{$curr->symbol}})</li>
                    @endforeach
                </ul>
            </td>
            <td><img src="{{$country->image}}" height="20px" width="80px"></td>
            <td>
                <a href="{{ route('countries.edit',$country->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('countries.destroy', $country->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection
