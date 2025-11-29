<div>
    <button type="button" onclick="window.location='{{ url('/contacts/create') }}'">Add</button>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Email Address</th>
                <th />
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->contact }}</td>
                    <td>{{ $contact->email_address }}</td>
                    <td><button onclick="window.location='{{ url('/contacts/' . $contact->id) }}'">Show</button>
                    <td><button type="button"
                            onclick="window.location='{{ url('/contacts/' . $contact->id . '/edit') }}'">Edit</button>
                    </td>
                    <td>
                        <form action="{{ url('/contacts/' . $contact->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
