@extends('layouts.app')

@section('content')
    <h2>Contacts</h2>
    <a href="{{ route('contacts.create') }}">Add Contact</a>
    @if ($contacts->isEmpty())
        <p>No contacts found.</p>
    @else
        <table width="100%">
            <tr><td>Name</td><td>Last Name</td><td>Phone</td></tr>
            @foreach ($contacts as $contact)
                <tr>
                
                    <td>{{ $contact->name }}</td> <td>{{ $contact->lastname ?? '' }}</td><td>{{ $contact->phone }}</td>
                    <td><a href="{{ route('contacts.edit', $contact->id) }}">Edit</a></td>
                    <td><form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif

    @endsection

