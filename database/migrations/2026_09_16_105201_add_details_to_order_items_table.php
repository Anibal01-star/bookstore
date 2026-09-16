<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->foreignId('book_id')
                ->after('order_id')
                ->constrained('books')
                ->cascadeOnDelete();

            $table->integer('quantity')
                ->after('book_id')
                ->default(1);

            $table->decimal('price', 12, 2)
                ->after('quantity');

            $table->decimal('subtotal', 12, 2)
                ->after('price');
        });
    }

    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['book_id']);
            $table->dropColumn([
                'book_id',
                'quantity',
                'price',
                'subtotal',
            ]);
        });
    }
};