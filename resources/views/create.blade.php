@extends("layout.layout")

@section("content")
    @if ($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach

    @endif
    <form method="post" enctype="multipart/form-data" action ="{{route('posts.save')}}">
        <label for="title_inp">Title</label>
{{--        <input id="title_inp" type="text" class="form-control {{$errors->first("title") ? 'is-invalid' :''}}" placeholder="enter your text here" name="title">--}}
{{--<hr>--}}
{{--        @if($errors->has("title"))--}}
{{--            <p class="text-danger">{{$errors->first("title")}}</p>    --}}
{{--        @endif--}}
        <input id="title_inp" type="text" class="form-control @error('title') 'is-invalid' @enderror" placeholder="enter your text here" name="title" value="{{old("title")}}">
        <hr>
        @error("title")
            <p class="text-danger">{{$errors->first("title")}}</p>
        @enderror
        <label for="inputText">Input Text</label>
        <input id="inputText" type="text" class="form-control" placeholder="enter your text here" name="post_text"/>

<hr>
        <label for="likes_inp">Likes</label>
        <input id="likes_inp" type="text" class="form-control" placeholder="enter your text here" name="likes"/>

        @csrf
        <button type="submit">save</button>


    </form>


@endsection
