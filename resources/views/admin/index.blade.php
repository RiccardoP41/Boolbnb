@extends('layouts.app')
@section('content')
{{-- @if (session('status'))
<div class="alert alert-success">
  {{ session('status')}}
</div>
@endif --}}

{{-- INSERIRE CARDS X APPARTAMENTI --}}
<table class="table mx-auto col-8 mt-3">
  <thead class="thead-light">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Visibilità</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($apartments as $apartment)
    <tr>
      <th scope="row">{{ $apartment->id }}</th>
      <td><a href="{{ route('apartments.show', $apartment->id )}}">{{ $apartment->titolo }}</a></td>
      <td><input {{($apartment->attivo==1) ? 'checked' : ''}} type="checkbox" class="custom-control-input flagAttivo"
          data-apartmentId="{{ $apartment->id }}" id="flagAttivo{{ $apartment->id }}">
        <label class="custom-control-label" for="flagAttivo{{ $apartment->id }}">Visibile / Nascondi </label></td>
      <td><a href="{{ route('apartments.edit', $apartment->id )}}">Edit</a></td>

      <td>
        <form action="{{ route('apartments.destroy', $apartment->id )}}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" name="button" class="btn btn-danger btn-delete-alert">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="text-center mt-5">
  <button type="button" class="btn btn-primary mx-auto offset-lg-4" name="button"><a class="text-light" href="{{ route('apartments.create')}}">Aggiungi appartamento</a></button>
</div>

  @endsection
