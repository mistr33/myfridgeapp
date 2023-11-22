@include('header')
    <h1>product</h1>
    index
    @if(session()->has('succ'))
        {{session('succ')}}
    @endif

    <a href="{{route('product.create')}}">Add more</a>

    <table border=1>
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
    @include('footer')