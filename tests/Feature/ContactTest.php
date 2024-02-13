<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactTest extends TestCase
{
    use WithFaker;
    /**
     * Test contact creation
     */
    public function testCreateContact(): void
    {
        $contactData = $this->validContactData();

        // Create a user and authenticate
        $user = User::factory()->create();
        $this->actingAs($user);

        // Use the full route name if you have one
        $response = $this->post(route('contacts.store'), ['contact' => $contactData]);
        $response->assertStatus(302);

        $this->assertDatabaseHas('contacts', $contactData);
    }

    public function testContactUpdate()
{
    // Create a user and authenticate
    $user = User::factory()->create();
    $this->actingAs($user);

    $contact = Contact::factory()->create();

    $updatedContactData = $this->validContactData();

    // Use the full route name if you have one
    $response = $this->patch(route('contacts.update', $contact->id), ['contact' => $updatedContactData]);

    $response->assertStatus(302);  // Assuming a redirect on success

    $this->assertDatabaseHas('contacts', $updatedContactData);
}

    /**
     * Get valid contact data for testing.
     *
     * @return array
     */
    private function validContactData()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail(),
            'contact' => $this->faker->unique()->numerify('#########'),
        ];
    }
}
