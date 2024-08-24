Register

@if(session()->has('error'))
    <div class="alert alert-danger">{{session()->get('error')}}</div>
@endif

@if(session()->has('success'))
    <div class="alert alert-success">{{session()->get('success')}}</div>
@endif

<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Register</button>
</form>