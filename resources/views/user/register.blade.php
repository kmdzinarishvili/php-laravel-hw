@extends("layout.layout")

@section("content")
    @if ($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach

    @endif
    <form method="post" enctype="multipart/form-data" action ="{{route('post.register')}}">
        <label for="name">Name</label>

        <input id="name" type="text" class="form-control " placeholder="enter your name here" name="name">
        <hr>
        @error("name")
        <p class="text-danger">{{$errors->first("name")}}</p>
        @enderror
        <label for="email">Email</label>
        <input id="email" type="text" class="form-control " placeholder="enter your email here" name="email" >
        <hr>
        @error("email")
        <p class="text-danger">{{$errors->first("email")}}</p>
        @enderror
        <label for="password">Password</label>
        <input id="password" type="password" class="form-control" placeholder="enter your password here" name="password"/>
        @error("password")
        <p class="text-danger">{{$errors->first("password")}}</p>
        @enderror
        @csrf
        <button type="submit">save</button>


    </form>


@endsection
