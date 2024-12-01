<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_xxxxxx_create_book_reservation_table.php

public function up()
{
    Schema::create('reservation_books', function (Blueprint $table) {
        $table->id();
        $table->foreignId('book_id')->constrained('books');
        $table->foreignId('reservation_id')->constrained('reservations');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation__books');
    }
};
