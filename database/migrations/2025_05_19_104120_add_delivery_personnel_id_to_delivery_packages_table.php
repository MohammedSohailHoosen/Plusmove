<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('delivery_packages', function (Blueprint $table) {
            $table->foreignId('delivery_personnel_id')
                ->nullable()
                ->constrained('delivery_personnels')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('delivery_packages', function (Blueprint $table) {
            $table->dropForeign(['delivery_personnel_id']);
            $table->dropColumn('delivery_personnel_id');
        });
    }
};
