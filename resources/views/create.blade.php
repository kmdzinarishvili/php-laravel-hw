@extends("layout.layout")

@section("content")
    @if ($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach

    @endif
    <form method="post" enctype="multipart/form-data" action ="{{route('posts.save')}}">
        <label for="title_inp">Title</label>
        <input id="title_inp" type="text" class="form-control @error('title') 'is-invalid' @enderror" placeholder="enter your text here" name="title" value="{{old("title")}}">
        <hr>
        @error("title")
            <p class="text-danger">{{$errors->first("title")}}</p>
        @enderror
        <label for="inputText">Input Text</label>
        <input id="inputText" type="text" class="form-control" placeholder="enter your text here" name="post_text"/>
        @error("input")
        <p class="text-danger">{{$errors->first("input")}}</p>
        @enderror
        <hr>
        <label for="likes_inp">Likes</label>
        <input id="likes_inp" type="text" class="form-control" placeholder="enter your text here" name="likes"/>
        @error("likes")
        <p class="text-danger">{{$errors->first("likes")}}</p>
        @enderror
        <div class="form-group">
            <label for="tags">Tags</label>
            <select name="tags[]" id="tags" multiple>
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach


            </select>
        </div>




        @csrf
        <button type="submit">save</button>


    </form>


@endsection
