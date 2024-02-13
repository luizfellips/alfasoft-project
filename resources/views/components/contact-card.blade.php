@props(['contact'])

<a href="{{ route('contacts.show', ['contact' => $contact->id]) }}" class=" hover:scale-105 transition-transform">
    <div class="card border-0 rounded-4">
        <div class="card-header bg-slate-200 border-0 display-6">
            {{ $contact->name }}
        </div>
        <div class="card-body bg-slate-100">
            <h5 class="card-title py-2"><strong>Contact email: </strong>{{ $contact->email }}</h5>
            <h5 class="card-title py-2"><strong>Contact number: </strong>{{ $contact->email }}</h5>
            <div class="Actions">
                <div class="mt-6 flex gap-6">
                    <button type="submit"
                        class="rounded-full bg-blue-500 py-4 px-10 font-bold container transition text-white shadow hover:bg-blue-600">Edit</button>
                    <button type="submit"
                        class="rounded-full bg-red-500 py-4 px-10 font-bold container transition text-white shadow hover:bg-red-600">Delete</button>
                </div>
            </div>
        </div>
    </div>
</a>
