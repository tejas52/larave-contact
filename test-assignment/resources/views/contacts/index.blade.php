
    <h2>Contacts</h2>
    <a href="{{ route('contacts.create') }}">Add Contact</a>
    
   

    @if ($contacts->isEmpty())
        <p>No contacts found.</p>
    @else
        <ul>
            <li>Name</li><li>Last Name</li><LI>Phone</LI>
            @foreach ($contacts as $contact)
                <li>
                    {{ $contact->name }} {{ $contact->lastname ?? '' }} - {{ $contact->phone }}
                    <a href="{{ route('contacts.edit', $contact->id) }}">Edit</a>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
