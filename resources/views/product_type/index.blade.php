@include('header')
    <h1>product types</h1>
    index
    @if(session()->has('succ'))
        {{session('succ')}}
    @endif
    <a href="{{route('product_type.create')}}">Add more</a>
    <table border=1>
        <tr>
            <th>id</th>
            <th>type_title</th>
            <th>interval</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
        @foreach($product_type as $ptype)
        <tr>
            <td>{{$ptype->id}}</td>
            <td>{{$ptype->type_title}}</td>
            <td>{{$ptype->interval}}</td>
            <td><a href="{{route('product_type.edit',['product_type'=>$ptype])}}">edit</a></td>
            <td>
                <form method="post" action="{{route('product_type.delete',['product_type'=>$ptype])}}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    @include('footer')