<x-layout>
    @if ($errors->any())
        <div class="alert alert-danger">
            <h2 class="fs-4">We could not update this contact.
            </h2>
            <ul>
                @foreach ($errors->all() as $error)
                    <li> - {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="w-screen flex items-center justify-center">
        <div class="p-10 rounded shadow-sm border-2 border-opacity-35 border-blue-700 max-w-lg w-2/3">
            <div class="mb-6 p-10 bg-white -m-10">
                <h1 class="font-bold text-2xl text-gray-700 text-center">Edit a contact</h1>
            </div>
            <form action="{{ route('contacts.update', ['contact' => $contact->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col mb-4">
                        <label>Contact Name
                            <span class="block text-xs font-light text-stone-400">The name of the contact</span>
                        </label>
                        <input type="text" placeholder="Contact name" name="contact[name]"
                            value="{{$contact->name }}" class="mt-2 px-4 py-2 shadow rounded" />
                    </div>
                    <div class="flex flex-col mb-4">
                        <label>Email Address
                            <span class="block text-xs font-light text-stone-400">The email address of the
                                contact</span>
                        </label>
                        <input type="text" placeholder="Email address" value="{{$contact->email }}" name="contact[email]"
                            class="mt-2 px-4 py-2 shadow rounded" />
                    </div>
                </div>
                <div class="flex flex-col mb-4">
                    <label>Contact Number
                        <span class="block text-xs font-light text-stone-400">The phone number that belongs to the
                            contact</span>
                    </label>
                    <input type="text" placeholder="Contact number" name="contact[contact]" value="{{ strval($contact->contact) }}" maxlength="9"
                        class="mt-2 px-4 py-2 shadow rounded" />
                </div>
                <div class="mt-6 flex gap-6">
                    <button type="submit"
                        class="rounded-full bg-green-500 py-4 px-10 fs-3 font-bold container transition text-white shadow hover:bg-green-600">Update</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
