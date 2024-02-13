<x-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-200 overflow-hidden sm:rounded-lg">
                <div class="p-6 fs-4 text-gray-900">
                    {{ __('Actions') }}
                    <div class="Actions relative w-96 flex flex-col gap-6 pt-6 mb-3">
                        <a href="{{ route('contacts.create') }}"
                            class="rounded-full bg-blue-500 py-4 text-center font-bold container transition text-white shadow hover:bg-blue-600">Register
                            a new contact</a>
                        <a href="{{ route('contacts.trashed') }}"
                            class="rounded-full bg-red-500 py-4 fs-5 text-center font-bold container transition text-white shadow hover:bg-red-600">View
                            deleted contacts</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layout>
