@extends('layouts.app')

@section('content')
    <h1>Product</h1>
    edit
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="POST" action="{{route('product.update',['product'=>$product])}}">
        @csrf
        @method('put')
        <div>
            <label>Тип</label>
            <select name="ptype" class="form-control">
                @foreach($ptypes as $pt)
                    <option value="{{$pt->id}}" @if($pt->id==$product->ptype) selected @endif>{{$pt->type_title}}</option>
                @endforeach
            </select>
        </div>
        @error('title') <span style="color:red;">lalala</span> @endif
        <div>
            <label>Название</label>
            <input name="title" class="form-control" class="@error('title') is-invalid @endif "  value="{{$product->title}}" />
        </div>
        <div>
            <label>Фото</label>
            <input name="photo" class="form-control" value="{{$product->ptyphotope}}" />
        </div>
        <div>
            <label>Штрихкод</label>
            <input name="barcode" class="form-control" value="{{old('barcode')}}" value="{{$product->barcode}}" />
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rating" id="inlineRadio1" value="1" @if($product->rating==1) checked @endif>
            <label class="form-check-label" for="inlineRadio1">1</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rating" id="inlineRadio2" value="2" @if($product->rating==2) checked @endif>
            <label class="form-check-label" for="inlineRadio2">2</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rating" id="inlineRadio3" value="3" @if($product->rating==3) checked @endif>
            <label class="form-check-label" for="inlineRadio3">3</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rating" id="inlineRadio4" value="4" @if($product->rating==4) checked @endif>
            <label class="form-check-label" for="inlineRadio4">4</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rating" id="inlineRadio5" value="5" @if($product->rating==5) checked @endif>
            <label class="form-check-label" for="inlineRadio5">5</label>
        </div>

        <div><input type="submit" value="update" class="btn btn-primary"></div>
    </form>
    @endsection