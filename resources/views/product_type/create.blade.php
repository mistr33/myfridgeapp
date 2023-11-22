@include('header')
    <h1>Product type</h1>
    create
    <a href="{{route('product_type.index')}}">Go back</a>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="POST" action="{{route('product_type.store')}}">
        @csrf
        @method('post')
        <div><label>Тип продукта</label><input name="type_title" /></div>
        @error('title') <span style="color:red;">lalala</span> @endif
        <div><label>Интервал проверки</label><input name="interval" class="@error('interval') is-invalid @endif "/></div>
        <div><input type="submit" value="create"></div>
    </form>
    @include('footer')