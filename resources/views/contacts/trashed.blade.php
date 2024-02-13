<x-layout>
    <div class=" md:grid lg:grid-cols-3 gap-3 space-y-2 md:space-y-0 mt-3">
        @unless (count($contacts) == 0)
            @foreach ($contacts as $contact)
                <x-contact-card :contact="$contact" :trash="true" />
            @endforeach
        @else
            <p> No contacts are currently in the trash.</p>
        @endunless
    </div>
    <div class="Links">
        {{ $contacts->links() }}
    </div>

</x-layout>
