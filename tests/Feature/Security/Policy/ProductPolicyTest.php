<?php

namespace Tests\Feature\Security\Policy;

use App\Models\Modules\Products\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductPolicyTest extends TestCase
{
    use RefreshDatabase;

    public function testActiveUserCanStoreUpdateDestroy()
    {
        $user = User::factory()->create(['is_active' => true])->first();

        //store
        $data = Product::factory()->definition();
        $response = $this->actingAs($user)->post(route('products.store'), $data);
        $response->assertOk();
        $productId = entityId($response->json());

        //update
        $data = Product::factory()->definition();
        $response = $this->actingAs($user)->put(route('products.update', $productId), $data);
        $response->assertOk();

        //destroy
        $response = $this->actingAs($user)->delete(route('products.destroy', $productId));
        $response->assertOk();
    }

    public function testNoActiveUserCantStoreUpdateDestroy()
    {
        $user = User::factory()->create(['is_active' => false])->first();
        $product = Product::factory()->create(['user_id' => $user->id]);
        $data = Product::factory()->definition();

        //store
        $response = $this->actingAs($user)->post(route('products.store'), $data);
        $response->assertStatus(403);

        //update
        $data = Product::factory()->definition();
        $response = $this->actingAs($user)->put(route('products.update', $product->id), $data);
        $response->assertStatus(403);

        //destroy
        $response = $this->actingAs($user)->delete(route('products.destroy', $product->id));
        $response->assertStatus(403);
    }

    public function testUserCantShowEditUpdateDestroyOtherUserProduct()
    {
        $otherUser = User::factory()->create()->first();
        $product = Product::factory()->create(['user_id' => $otherUser->id]);
        $user = User::factory()->create(['is_active' => true])->first();

        //show
        $response = $this->actingAs($user)->get(route('products.show', $product->id));
        $response->assertStatus(403);

        //edit
        $response = $this->actingAs($user)->get(route('products.edit', $product->id));
        $response->assertStatus(403);

        //update
        $data = Product::factory()->definition();
        $response = $this->actingAs($user)->put(route('products.update', $product->id), $data);
        $response->assertStatus(403);

        //destroy
        $response = $this->actingAs($user)->delete(route('products.destroy', $product->id));
        $response->assertStatus(403);
    }
}
