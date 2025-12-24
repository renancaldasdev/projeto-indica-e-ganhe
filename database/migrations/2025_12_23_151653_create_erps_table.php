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
        Schema::create('erps', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique()->comment('Nome legível, ex: IXC Soft');
            $table->string('slug')->unique()->comment('Identificador interno, ex: ixc_soft');

            $table->boolean('active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('erps');
    }
};
