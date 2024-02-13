<x-layout>
    <div class="w-screen flex items-center justify-center">
        <div class="p-10 rounded shadow-sm border-2 border-opacity-35 border-blue-700 max-w-lg w-2/3">
            <div class="mb-0 p-10 bg-white -m-10">
                <h1 class="font-bold text-2xl text-gray-700 text-center">Contact informations</h1>
            </div>
            <div class="grid grid-cols-2 gap-6">
                <div class="flex flex-col mb-4">
                    <label>Contact
                        <span class="block text-xs font-light text-stone-400">The name of the contact</span>
                    </label>
                    <input type="text" placeholder="Contact name" value="{{ $contact->name }}"
                        class="mt-2 px-4 py-2 shadow rounded" disabled />
                </div>
                <div class="flex flex-col mb-4">
                    <label>Email Address
                        <span class="block text-xs font-light text-stone-400">The email address of the contact</span>
                    </label>
                    <input type="text" placeholder="Email address" value="{{ $contact->email }}"
                        class="mt-2 px-4 py-2 shadow rounded" disabled />
                </div>
            </div>
            <div class="flex flex-col mb-4">
                <label>Contact Number
                    <span class="block text-xs font-light text-stone-400">The phone number that belongs to the
                        contact</span>
                </label>
                <input type="text" placeholder="Contact number" value="{{ $contact->contact }}" maxlength="9"
                    class="mt-2 px-4 py-2 shadow rounded" disabled />
            </div>

            <div class="mt-6 flex gap-6">
                <a class="rounded-full text-center bg-blue-500 py-4 px-10 font-bold container transition text-white shadow hover:bg-blue-600"
                    href="{{ route('contacts.edit', ['contact' => $contact->id]) }}">Edit</a>

                <a class="rounded-full text-center bg-red-500 py-4 px-10 font-bold container transition text-white shadow hover:bg-red-600"
                    href="{{ route('contacts.confirmDelete', ['contact' => $contact->id]) }}">Delete</a>
            </div>
        </div>
    </div>
</x-layout>
