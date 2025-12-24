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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_client_id')->constrained('customer_clients')->onDelete('cascade');
            $table->string('erp_contract_id')->comment('ID do contrato no ERP');
            $table->string('status')->default('pending')->comment('active, pending, canceled');
            $table->date('activation_date')->nullable();
            $table->boolean('reward_generated')->default(false);
            $table->timestamps();
            $table->unique(['customer_client_id', 'erp_contract_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
