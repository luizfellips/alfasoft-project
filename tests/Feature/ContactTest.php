<?php

namespace Tests\Feature;

use Tests\TestCase;
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

        $response = $this->post('/contacts', ['contact' => $contactData]);
        $response->assertStatus(302);

        $this->assertDatabaseHas('contacts', $contactData);
    }

    public function testContactUpdate()
    {
        $contact = Contact::factory()->create();

        $updatedContactData = $this->validContactData();

        $response = $this->put("/contacts/{$contact->id}", ['contact' => $updatedContactData]);

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
