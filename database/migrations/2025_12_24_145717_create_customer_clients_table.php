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
        Schema::create('customer_clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('erp_client_id')->nullable();
            $table->foreignId('referrer_id')->nullable()->constrained('customer_clients')->nullOnDelete();
            $table->string('referral_code')->nullable();
            $table->foreignId('role_id')->constrained('roles');
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['customer_id', 'user_id']);
            $table->unique(['customer_id', 'erp_client_id']);
            $table->unique(['customer_id', 'referral_code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_clients');
    }
};
