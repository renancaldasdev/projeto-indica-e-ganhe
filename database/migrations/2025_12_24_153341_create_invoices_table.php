<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->foreignId('contract_id')->constrained('contracts')->onDelete('cascade');

            $table->string('erp_invoice_id');
            $table->decimal('amount', 10, 2);

            $table->date('due_date')->comment('Vencimento');
            $table->date('paid_at')->nullable()->comment('Data Pagamento Real');

            $table->boolean('reward_generated')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
