<?php

namespace Tests\Feature\Security\Policy;

use App\Models\Modules\Invoices\Invoice;
use App\Models\Modules\Invoices\InvoiceItem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvoicePolicyTest extends TestCase
{
    use RefreshDatabase;

    public function testActiveUserCanStoreUpdateDestroy()
    {
        $user = User::factory()->create(['is_active' => true])->first();

        //store
        $data = Invoice::factory()->definition();
        $data['items'][] = InvoiceItem::factory()->definition();
        $response = $this->actingAs($user)->post(route('invoices.store'), $data);
        $response->assertOk();
        $invoiceId = entityId($response->json());

        //update
        $data = Invoice::factory()->definition();
        $data['items'][] = InvoiceItem::factory()->definition();
        $response = $this->actingAs($user)->put(route('invoices.update', $invoiceId), $data);
        $response->assertOk();

        //destroy
        $response = $this->actingAs($user)->delete(route('invoices.destroy', $invoiceId));
        $response->assertOk();
    }

    public function testNoActiveUserCantStoreUpdateDestroy()
    {
        $user = User::factory()->create(['is_active' => false])->first();
        $invoice = Invoice::factory()->create(['user_id' => $user->id]);
        $data = Invoice::factory()->definition();
        $data['items'][] = InvoiceItem::factory()->definition();

        //store
        $response = $this->actingAs($user)->post(route('invoices.store'), $data);
        $response->assertStatus(403);

        //update
        $data = Invoice::factory()->definition();
        $data['items'][] = InvoiceItem::factory()->definition();
        $response = $this->actingAs($user)->put(route('invoices.update', $invoice->id), $data);
        $response->assertStatus(403);

        //destroy
        $response = $this->actingAs($user)->delete(route('invoices.destroy', $invoice->id));
        $response->assertStatus(403);
    }

    public function testUserCantShowEditUpdateDestroyOtherUserInvoice()
    {
        $otherUser = User::factory()->create()->first();
        $invoice = Invoice::factory()->create(['user_id' => $otherUser->id]);
        $user = User::factory()->create(['is_active' => true])->first();

        //show
        $response = $this->actingAs($user)->get(route('invoices.show', $invoice->id));
        $response->assertStatus(403);

        //edit
        $response = $this->actingAs($user)->get(route('invoices.edit', $invoice->id));
        $response->assertStatus(403);

        //update
        $data = Invoice::factory()->definition();
        $data['items'][] = InvoiceItem::factory()->definition();
        $response = $this->actingAs($user)->put(route('invoices.update', $invoice->id), $data);
        $response->assertStatus(403);

        //destroy
        $response = $this->actingAs($user)->delete(route('invoices.destroy', $invoice->id));
        $response->assertStatus(403);
    }
}
