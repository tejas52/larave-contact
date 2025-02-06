
    <h2>Import Contacts from XML</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form action="{{ route('contacts.import.process') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="xml_file" required>
        <button type="submit">Import</button>
    </form>
