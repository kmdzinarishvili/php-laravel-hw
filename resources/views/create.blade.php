@extends("layout.layout")

@section("content")
    @if ($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach

    @endif
    <form method="post" enctype="multipart/form-data" action ="{{route('users.store')}}" enctype="multipart/form-data">
        <label for="title_inp">Name</label>
        <input id="title_inp" type="text" class="form-control @error('title') 'is-invalid' @enderror" placeholder="enter your text here" name="title" value="{{old("name")}}">
        <hr>
        @error("title")
            <p class="text-danger">{{$errors->first("title")}}</p>
        @enderror
        <hr>
        <label for="image_inp">{{__('File Upload')}}</label>
        <input id="image_inp" type="file" class="form-control" name="image"/>
        @error("image")
        <p class="text-danger">{{$errors->first("likes")}}</p>
        @enderror





        @csrf
        <button type="submit">save</button>


    </form>


@endsection
