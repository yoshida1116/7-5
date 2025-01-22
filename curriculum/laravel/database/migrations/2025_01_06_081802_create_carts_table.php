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
        Schema::table('carts', function (Blueprint $table) {
            $table->string('size')->nullable()->after('product_id');
            $table->integer('quantity')->default(1)->after('size');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carts', function (Blueprint $table) {
            if (Schema::hasColumn('carts', 'size')) {
                $table->dropColumn('size');
            }
            if (Schema::hasColumn('carts', 'quantity')) {
                $table->dropColumn('quantity');
            }
        });
    }
};
