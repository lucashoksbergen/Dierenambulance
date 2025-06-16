<?php

namespace Tests\Feature;

use App\Models\Transfer;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransferTest extends TestCase
{
    use RefreshDatabase;

    // Test whether the transfer correctly occurs on logout
    public function test_logout_creates_transfer_entry(): void
    {
        //Arrange
        $user = User::factory()->create();
        $this->actingAs($user);

        $vehicle = Vehicle::factory()->create(['id' => 3]);

        //Act
        $response = $this
            ->withSession(['came_from' => 'logout'])
            ->post(route('transfer.complete'), [
                'vehicle_number' => 3,
                'materials_check' => true,
                'cash_before' => '125',
                'km_start' => '12345',
            ]);


        //Assert
        $this->assertDatabaseHas('transfers', [
            'vehicle_id' => $vehicle->id,
            'cash_before' => '125',
            'km_start' => '12345',
        ]);

        $response->assertRedirect(route('show.login'));
    }


    // Test whether the transfer correctly occurs on login
    public function test_login_updates_existing_transfer_entry(): void
    {


        //Arrange
        $user = User::factory()->create();
        $this->actingAs($user);

        $vehicle = Vehicle::factory()->create(['id' => 3]);

        $transfer = Transfer::factory()->create([
            'vehicle_id' => $vehicle->id,
            'materials_check' => true,
            'cash_after' => '125',
            'km_end' => '12345',
        ]);

        //Act
        $response = $this
            ->withSession(['came_from' => 'login'])
            ->post(route('transfer.complete'), [
                'vehicle_number' => '3',
                'materials_check' => true,
                'cash_after' => '125',
                'km_end' => '12345',
            ]);


        //Assert
        $this->assertDatabaseHas('transfers', [
            'id' => $transfer->id,
            'vehicle_id' => '3',
            'cash_after' => '125',
            'km_end' => '12345',
        ]);

        $response->assertRedirect('/dashboard');
    }

    public function test_login_creates_full_transfers_entry()
    {

        $this->withoutExceptionHandling();

        //Arrange
        $user = User::factory()->create();
        $this->actingAs($user);

        $vehicle = Vehicle::factory()->create(['id' => 3]);


        //Act
        $response = $this->withSession(['came_from' => 'login'])->post(route('transfer.complete'), [
            'vehicle_number' => $vehicle->id,
            'materials_check' => true,
            'cash_after' => '125',
            'km_end' => '12345',
        ]);

        //Assert
        $this->assertDatabaseHas('transfers', [
            'vehicle_id' => '3',
            'cash_after' => '125',
            'km_end' => '12345',
        ]);

        $response->assertRedirect('/dashboard');
    }


}
