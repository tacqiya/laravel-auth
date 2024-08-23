Login

@if(session()->has('error'))
    <div class="alert alert-danger">{{session()->get('error')}}</div>
@endif

@if(session()->has('success'))
    <div class="alert alert-success">{{session()->get('success')}}</div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
</form>