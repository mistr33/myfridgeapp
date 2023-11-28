@extends('layouts.app')

@section('content')
  <h1>Fridge app</h1>

<ul>
    <li>Fridge list</li>
    <li><a href="{{route('product.index')}}">products list</a></li>
    <li><a href="{{route('product_type.index')}}">product types</a></li>
</ul>
@endsection