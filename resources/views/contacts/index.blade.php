@extends('layouts.app')

@section('title', 'Contacts')

@section('content')
    <div>
        @if (auth()->user())
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-success me-2"
                    onclick="window.location='{{ url('/contacts/create') }}'">Add
                    Contact</button>
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email Address</th>
                    @if (auth()->user())
                        <th />
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->contact }}</td>
                        <td>{{ $contact->email_address }}</td>
                        @if (auth()->user())
                            <td>
                                <div class="d-flex flex-row justify-content-evenly align-items-center">
                                    <button type="button" class="btn btn-primary"
                                        onclick="window.location='{{ url('/contacts/' . $contact->id) }}'">Show</button>
                                    <button type="button" class="btn btn-warning"
                                        onclick="window.location='{{ url('/contacts/' . $contact->id . '/edit') }}'">Edit</button>
                                    <form class="m-0" action="{{ url('/contacts/' . $contact->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
