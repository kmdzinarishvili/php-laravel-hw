@extends("layout.layout")

@section("content")
    <form method="post" enctype="multipart/form-data" action ="{{route('posts.save')}}">
        <label for="title_inp">Title</label>
        <input id="title_inp" type="text" class="form-control" placeholder="enter your text here" name="title">
<hr>
        <label for="inputText">Input Text</label>
        <input id="inputText" type="text" class="form-control" placeholder="enter your text here" name="post_text"/>

<hr>
        <label for="likes_inp">Likes</label>
        <input id="likes_inp" type="text" class="form-control" placeholder="enter your text here" name="likes"/>

        @csrf
        <button type="submit">save</button>


    </form>


@endsection
