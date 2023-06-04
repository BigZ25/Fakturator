<?php

namespace Tests\Feature\Security\Policy;

use App\Models\Modules\Customers\Customer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerPolicyTest extends TestCase
{
    use RefreshDatabase;

    public function testActiveUserCanStoreUpdateDestroy()
    {
        $user = User::factory()->create(['is_active' => true])->first();

        //store
        $data = Customer::factory()->definition();
        $response = $this->actingAs($user)->post(route('customers.store'), $data);
        $response->assertOk();
        $customerId = entityId($response->json());

        //update
        $data = Customer::factory()->definition();
        $response = $this->actingAs($user)->put(route('customers.update', $customerId), $data);
        $response->assertOk();

        //destroy
        $response = $this->actingAs($user)->delete(route('customers.destroy', $customerId));
        $response->assertOk();
    }

    public function testNoActiveUserCantStoreUpdateDestroy()
    {
        $user = User::factory()->create(['is_active' => false])->first();
        $customer = Customer::factory()->create(['user_id' => $user->id]);
        $data = Customer::factory()->definition();

        //store
        $response = $this->actingAs($user)->post(route('customers.store'), $data);
        $response->assertStatus(403);

        //update
        $data = Customer::factory()->definition();
        $response = $this->actingAs($user)->put(route('customers.update', $customer->id), $data);
        $response->assertStatus(403);

        //destroy
        $response = $this->actingAs($user)->delete(route('customers.destroy', $customer->id));
        $response->assertStatus(403);
    }

    public function testUserCantShowEditUpdateDestroyOtherUserCustomer()
    {
        $otherUser = User::factory()->create()->first();
        $customer = Customer::factory()->create(['user_id' => $otherUser->id]);
        $user = User::factory()->create(['is_active' => true])->first();

        //show
        $response = $this->actingAs($user)->get(route('customers.show', $customer->id));
        $response->assertStatus(403);

        //edit
        $response = $this->actingAs($user)->get(route('customers.edit', $customer->id));
        $response->assertStatus(403);

        //update
        $data = Customer::factory()->definition();
        $response = $this->actingAs($user)->put(route('customers.update', $customer->id), $data);
        $response->assertStatus(403);

        //destroy
        $response = $this->actingAs($user)->delete(route('customers.destroy', $customer->id));
        $response->assertStatus(403);
    }
}
