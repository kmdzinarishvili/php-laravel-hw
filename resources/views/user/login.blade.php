<form method="post" action="{{route('post.login')}}">
    @csrf
    <div>
        <label>email</label>
        <input type="email" name="email">
        <label>Password</label>
        <input type="password" name="password">
        <button type="submit">Login</button>
    </div>
</form>

<form method="get" action="{{route('register')}}">
    <h3>Don't have an account</h3>
    <button type="submit">Register</button>
</form>
