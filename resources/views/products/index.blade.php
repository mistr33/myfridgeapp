@extends('layouts.app')

@section('content')

    <h1>product</h1>
    index
    @if(session()->has('succ'))
        {{session('succ')}}
    @endif
<div class="row">
    <a href="{{route('product.create')}}"><input type=button class="btn btn-primary" value="Add more"></a>
</div>

<div class="row">
    <table border=1 class="table">
        <tr>
            <th>id</th>
            <th>title</th>
            <th>type</th>
            <th>photo</th>
            <th>rating</th>
            <th>barcode</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
        @foreach($products as $prod)
        <tr>
            <td>{{$prod->id}}</td>
            <td>{{$prod->title}}</td>
            <td>{{$ptype[$prod->ptype]->type_title}}</td>
            <td>{{$prod->photo}}</td>
            <td>{{$prod->rating}}</td>
            <td>{{$prod->barcode}}</td>
            <td><a href="{{route('product.edit',['product'=>$prod])}}">edit</a></td>
            <td>
                <form method="post" action="{{route('product.delete',['product'=>$prod])}}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
    @endsection