@extends("layout.layout")

@section("content")
    <a href="{{ url('/posts') }}" class="text-sm text-gray-700 underline"> Home </a>
    <a href="{{ url('/my-posts') }}" class="text-sm text-gray-700 underline"> My Posts </a>

    <form method="post" enctype="multipart/form-data" action ="{{route('posts.update', $post->id)}}">
        @csrf
        @method("PUT")
        <div class="box-body">
                    <label for="title_inp">Title</label>
                    <input id="title_inp" type="text" class="form-control" value="{{old("title", $post->title)}}" name="title">
                    <hr>
                    <label for="inputText">Input Text</label>
                    <input id="inputText" type="text" class="form-control" value="{{old("text", $post->post_text)}}"  name="post_text"/>

                    <hr>
                    <label for="likes_inp">Likes</label>
                    <input id="likes_inp" type="text" class="form-control" value="{{old("text", $post->likes)}}"  name="likes"/>
                    <br>
            <select name="tags[]" id="tags" multiple>
                @foreach($tags as $tag)
                    {{$has_tag = DB::table('post_tag')->where('post_id', '=', $post->id)->where('tag_id', '=', $tag->id)->exists()}}
                    @if($has_tag)
                        <option value="{{$tag->id}}" selected="selected">{{$tag->name}}</option>
                    @else
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endif

                @endforeach


            </select>

                    <button id="edit-button" type="submit">SAVE</button>
        </div>

    </form>


@endsection
