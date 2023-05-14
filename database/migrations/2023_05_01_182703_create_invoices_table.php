<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('correction_invoice_id')->nullable();
            $table->unsignedBigInteger('buyer_customer_id')->nullable();
            $table->string('number');
            $table->string('send_email')->nullable();
            $table->string('buyer_nip');
            $table->string('buyer_name');
            $table->string('buyer_address');
            $table->string('buyer_postcode');
            $table->string('buyer_city');
            $table->string('recipient_nip')->nullable();
            $table->string('recipient_name')->nullable();
            $table->string('recipient_address')->nullable();
            $table->string('recipient_postcode')->nullable();
            $table->string('recipient_city')->nullable();
            $table->string('seller_nip');
            $table->string('seller_name');
            $table->string('seller_address');
            $table->string('seller_postcode');
            $table->string('seller_city');
            $table->date('sale_date');
            $table->date('issue_date');
            $table->date('payment_date');
            $table->date('paid_date')->nullable();
            $table->tinyInteger('payment_method');
            $table->tinyInteger('is_printed');
            $table->tinyInteger('is_send');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('correction_invoice_id')->references('id')->on('invoices')->onDelete('cascade');
            $table->foreign('buyer_customer_id')->references('id')->on('customers')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomes');
    }
}
