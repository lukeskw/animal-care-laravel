<?php
namespace Tests\Feature;

use App\Http\Middleware\VerifyCsrfToken;
use App\Models\Animal;
use App\Models\User;
use App\Services\AnimalService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\factories\AnimalFactory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;


class AnimalTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->withoutMiddleware(VerifyCsrfToken::class);
        $this->app['config']->set('csrf.disable', true);

    }

    /** @test */
    public function it_displays_animals_on_index_page()
    {
        $response = $this->get(route('animais.index'));

        $response->assertStatus(200);
        $response->assertViewIs('dashboard.dash-animal');
    }

    /** @test */
    public function it_stores_an_animal()
    {
        Session::start();

        $data = Animal::factory()->make()->toArray();

        $response = $this->post(route('animais.store'), $data);

        $response->assertRedirect(route('animais.index'));
        $this->assertDatabaseHas('animals', $data);
    }

    /** @test */
    public function it_shows_animal_edit_form()
    {
        $animal = Animal::factory()->create();

        $response = $this->get(route('animais.edit', $animal->id));

        $response->assertStatus(200);
        $response->assertViewIs('dashboard.dash-animalEdit');
    }

    /** @test */
    public function it_updates_an_animal()
    {
        $animal = Animal::factory()->create();

        $updatedData = Animal::factory()->make()->toArray();

        $response = $this->put(route('animais.update', $animal->id), $updatedData);

        $response->assertRedirect(route('animais.index'));
        $this->assertDatabaseHas('animals', ['id' => $animal->id] + $updatedData);
        $this->assertDatabaseMissing('animals', $animal->toArray());
    }

    /** @test */
    public function it_deletes_an_animal()
    {
        $animal = Animal::factory()->create();

        $response = $this->delete(route('animais.destroy', $animal->id));

        $response->assertRedirect(route('animais.index'));
        $this->assertDatabaseMissing('animals', ['id' => $animal->id]);
    }
}
