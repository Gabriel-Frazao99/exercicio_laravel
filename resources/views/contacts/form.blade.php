@php
    $disabled = '';
    switch ($type) {
        case 'create':
            $title = 'Create Contact';
            $action = url('/contacts');
            $method = 'POST';
            break;
        case 'show':
            $title = 'Contact Details';
            $action = null;
            $method = null;
            $disabled = 'disabled';
            break;
        case 'edit':
            $title = 'Edit Contact';
            $action = url('/contacts/' . $contact->id);
            $method = 'POST';
            break;
    }
@endphp

@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="m-5">
        <form action="{{ $action }}" method="{{ $method }}">
            @if ($type == 'edit')
                @method('PUT')
            @endif

            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input name="name" type="text" {{ $disabled }} class="form-control"
                    value="{{ old('name', $contact->name ?? null) }}">
                @error('name')
                    <div style="color:var(--bs-danger)">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Contact</label>
                <input name="contact" type="text" {{ $disabled }} class="form-control"
                    value="{{ old('contact', $contact->contact ?? null) }}">
                @error('contact')
                    <div style="color:var(--bs-danger)">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input name="email_address" type="email" {{ $disabled }} class="form-control"
                    value="{{ old('email_address', $contact->email_address ?? null) }}">
                @error('email_address')
                    <div style="color:var(--bs-danger)">{{ $message }}</div>
                @enderror
            </div>

            @if ($type != 'show')
                <button type="submit" class="btn btn-success">Save</button>
            @endif
        </form>

        @if ($type == 'show')
            <div class="d-flex flex-row">
                <button type="button" class="btn btn-warning me-3"
                    onclick="window.location='{{ url('/contacts/' . $contact->id . '/edit') }}'">Edit</button>
                <form class="m-0" action="{{ url('/contacts/' . $contact->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        @endif
    </div>
@endsection
