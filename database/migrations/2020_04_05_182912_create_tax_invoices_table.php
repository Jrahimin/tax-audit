<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tax_payer_id');
            $table->string('fiscal_year',32);
            $table->string('tax_amount',32);
            $table->string('tax_amount_in_sentence');
            $table->date('pay_date');
            $table->string('invoice_no',64);
            $table->string('register_no',64);
            $table->string('cheque_no',32);
            $table->string('tax_payer_type');
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tax_invoices');
    }
}
