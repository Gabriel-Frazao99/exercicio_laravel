@php
    $disabled = '';
    switch ($type) {
        case 'create':
            $action = url('/contacts');
            $method = 'POST';
            break;
        case 'show':
            $action = null;
            $method = null;
            $disabled = 'disabled';
        case 'edit':
            $action = url('/contacts/' . $contact->id);
            $method = 'POST';
            break;
    }
@endphp

<form action="{{ $action }}" method="{{ $method }}">
    @if ($type == 'edit')
        @method('PUT')
    @endif

    @csrf

    <label>Name</label>
    <input name="name" type="text" {{ $disabled }} value="{{ old('name', $contact->name ?? null) }}">
    @error('name')
        <div>{{ $message }}</div>
    @enderror

    <label>Contact</label>
    <input name="contact" type="text" {{ $disabled }} value="{{ old('contact', $contact->contact ?? null) }}">
    @error('contact')
        <div>{{ $message }}</div>
    @enderror

    <label>Email Address</label>
    <input name="email_address" type="text" {{ $disabled }}
        value="{{ old('email_address', $contact->email_address ?? null) }}">
    @error('email_address')
        <div>{{ $message }}</div>
    @enderror

    <button type="button" onclick="window.location='{{ url('contacts') }}'">Home</button>
    @if ($type != 'show')
        <button type="submit">Save</button>
    @else
        <button type="button"
            onclick="window.location='{{ url('/contacts/' . $contact->id . '/edit') }}'">Edit</button>
        <form action="{{ url('/contacts/' . $contact->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>
    @endif

</form>
