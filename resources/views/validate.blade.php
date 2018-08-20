@extends('admin.layouts.master')

@section('master.content')

<form action="{{ route('admin.validate') }}" method="POST">

  {{ csrf_field() }}

  <input type="text" name="title" value="{{ old('title') }}">
  <input type="text" name="content" value="{{ old('content') }}">

  @if ($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif

  <button type="submit">SUBMIT</button>
</form>

@endsection
