@include('header')
    <h1>Product type</h1>
    edit
    id={{$product_type->id}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="POST" action="{{route('product_type.update',['product_type'=>$product_type])}}">
        @csrf
        @method('put')
        <div>
            <label>Тип продукта</label>
            <input name="type_title" value="{{$product_type->type_title}}" />
        </div>
        @error('title') <span style="color:red;">lalala</span> @endif
        <div>
            <label>Интервал проверки</label>
            <input name="interval" class="@error('interval') is-invalid @endif "  value="{{$product_type->interval}}" />
        </div>
        <div><input type="submit" value="update"></div>
    </form>
    @include('footer')