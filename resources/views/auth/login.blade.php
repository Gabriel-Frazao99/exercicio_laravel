@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="m-5">
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input name="email" type="email" class="form-control" value="{{ old('email') }}">
                @error('email')
                    <div style="color:var(--bs-danger)">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input name="password" type="password" class="form-control" value="{{ old('password') }}">
                @error('password')
                    <div style="color:var(--bs-danger)">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
@endsection
