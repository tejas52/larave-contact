
    <h2>Add Contact</h2>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
        <input type="text" name="lastname" placeholder="Last Name (optional)" value="{{ old('lastname') }}">
        <input type="text" name="phone" placeholder="Phone" value="{{ old('phone') }}" required>
        <button type="submit">Save</button>
    </form>
