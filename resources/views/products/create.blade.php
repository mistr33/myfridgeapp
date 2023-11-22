@include('header')
    <h1>Product create</h1>
    
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="POST" action="{{route('product.store')}}">
        @csrf
        @method('post')
        <div class="form-group">
            <label>Тип</label>
            <select name="ptype" class="form-control">
                @foreach($ptype as $pt)
                    <option value="{{$pt->id}}">{{$pt->type_title}}</option>
                @endforeach
            </select>
        </div>
        @error('title') <span style="color:red;">lalala</span> @endif
        <div class="form-group"><label>Название</label><input name="title" class="form-control @error('title') is-invalid @endif " value="{{old('title')}}"/></div>
        <div class="form-group"><label>Фото</label><input name="photo" class="form-control" value="{{old('photo')}}" /></div>
        <div class="form-group"><label>Штрихкод</label><input name="barcode" class="form-control" value="{{old('barcode')}}"/></div>
        <!--<div class="form-group"><label>Рейтинг</label><input name="rating" type="number" class="form-control" /></div>-->
        
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rating" id="inlineRadio1" value="1" @if(old('rating')==1) checked @endif>
            <label class="form-check-label" for="inlineRadio1">1</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rating" id="inlineRadio2" value="2" @if(old('rating')==2) checked @endif>
            <label class="form-check-label" for="inlineRadio2">2</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rating" id="inlineRadio3" value="3" @if(!old('rating')) checked @endif>
            <label class="form-check-label" for="inlineRadio3">3</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rating" id="inlineRadio4" value="4" @if(old('rating')==4) checked @endif>
            <label class="form-check-label" for="inlineRadio4">4</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="rating" id="inlineRadio5" value="5" @if(old('rating')==5) checked @endif>
            <label class="form-check-label" for="inlineRadio5">5</label>
        </div>
        
        <div class="form-group"><input type="submit" value="create"  class="btn btn-primary"></div>
    </form>
    @include('footer')