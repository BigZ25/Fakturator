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
            $table->unsignedBigInteger('correction_invoice_id')->nullable();
            $table->string('number');
            $table->string('send_email');
            $table->string('company_nip');
            $table->string('company_name');
            $table->string('company_address');
            $table->string('company_postcode');
            $table->string('company_post');
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
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->foreign('correction_invoice_id')->references('id')->on('invoices')->onDelete('cascade');
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
