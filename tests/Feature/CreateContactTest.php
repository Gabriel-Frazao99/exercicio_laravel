<?php

namespace Tests\Feature;

use Tests\TestCase;

use App\Models\User;
use App\Models\Contact;

class CreateContactTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_contact(): void
    {
        $response = $this->postJson('contacts');
        $response->assertStatus(401);

        $user = User::first();

        $response = $this->actingAs($user)
            ->postJson('contacts', [
                'name' => str()->random(10),
                'contact' => fake()->regexify('[0-9]{9}'),
                'email_address' => str()->random(10) . '@test.pt'
            ]);
        $response->assertRedirect('/contacts');

        $contact = Contact::first();

        $response = $this->actingAs($user)
            ->postJson('contacts', [
                'name' => str()->random(10),
                'contact' => $contact->contact,
                'email_address' => str()->random(10) . '@test.pt'
            ]);
        $response->assertStatus(422);

        $response = $this->actingAs($user)
            ->postJson('contacts', [
                'name' => str()->random(10),
                'contact' => fake()->regexify('[0-9]{9}'),
                'email_address' => $contact->email_address
            ]);
        $response->assertStatus(422);
    }
}
