<form action="{{ route('login') }}" method="POST">
    @csrf

    <label>Email</label>
    <input name="email" type="text" value="{{ old('email') }}">
    @error('email')
        <div>{{ $message }}</div>
    @enderror

    <label>Password</label>
    <input name="password" type="password" value="{{ old('password') }}">
    @error('password')
        <div>{{ $message }}</div>
    @enderror

    <button type="submit">Login</button>

</form>
