@props(['contact'])

<div class="ContactCard hover:scale-105 transition-transform">
    <a href="{{ route('contacts.show', ['contact' => $contact->id]) }}">
        <div class="card border-0 rounded-3xl">
            <div class="card-header bg-slate-200 border-0 display-6">
                {{ $contact->name }}
            </div>
            <div class="card-body bg-slate-100">
                <h5 class="card-title py-2"><strong>Contact email: </strong>{{ $contact->email }}</h5>
                <h5 class="card-title py-2"><strong>Contact number: </strong>{{ $contact->contact }}</h5>
                <div class="mt-6 flex gap-6">
                    <a class="rounded-full text-center bg-blue-500 py-4 px-10 font-bold container transition text-white shadow hover:bg-blue-600"
                        href="{{ route('contacts.edit', ['contact' => $contact->id]) }}">Edit</a>

                    <a class="rounded-full text-center bg-red-500 py-4 px-10 font-bold container transition text-white shadow hover:bg-red-600"
                        href="{{ route('contacts.confirmDelete', ['contact' => $contact->id]) }}">Delete</a>
                </div>
            </div>
        </div>
    </a>
</div>
