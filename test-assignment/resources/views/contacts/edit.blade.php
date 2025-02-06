
    <h2>Edit Contact</h2>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf @method('PUT')
        <input type="text" name="name" value="{{ old('name', $contact->name) }}" required>
        <input type="text" name="lastname" value="{{ old('lastname', $contact->lastname) }}">
        <input type="text" name="phone" value="{{ old('phone', $contact->phone) }}" required>
        <button type="submit">Update</button>
    </form>
