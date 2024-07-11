<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Option;
use Tests\TestCase;
use App\Http\Controllers\PropertyController;
use App\Models\Property;
use Illuminate\Support\Facades\Notification; // Ajoutez cette ligne
use App\Notifications\ContactRequestNotification;

class PropertyTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_send_not_found_on_non_existent_property(): void
    {
        $response = $this->get('/biens/non-inventore-rerum-dolore-incidunt-quia-repudiandae-et-1');
        $response->assertStatus(404);
    }

    public function test_ok_on_property(): void
    {
        /** @var Property $property */
        $property = Property::factory()->create();

        $url = '/biens/' . $property->getSlug() . '-' . $property->id;

        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);

        $response = $this->get($url);
        $response->assertStatus(200); 
        $response->assertSee($property->name); // Vérifie que le nom de la propriété est dans la réponse
    }

    public function test_error_on_contact():void 
    {
        /** @var Property $property */
        $property = Property::factory()->create();
        $url = "/biens/{$property->id}/contact";
        $response = $this->post($url, [
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'doe',
            'message' => 'Pouvez-vous nous recontacter'
        ]);

        $response->assertRedirect();
        $response->assertSessionHasErrors(['email']);
        $response->assertSessionHasInput('email', 'doe');
    }

    public function test_ok_on_contact():void 
    {
        Notification::fake();
        /** @var Property $property */
        $property = Property::factory()->create();
        $url = "/biens/{$property->id}/contact";
        $response = $this->post($url, [
            'firstname' => 'John',
            'lastname' => 'Doe',
            'phone' => '00000000000000000',
            'email' => 'johnny@gmail.com',
            'message' => 'Pouvez-vous nous recontacter'
        ]);

        // $response->assertRedirect();
        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('success');
        Notification::assertSentOnDemand(ContactRequestNotification::class);
    }
}
