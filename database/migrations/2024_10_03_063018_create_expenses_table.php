<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    // Loob 'expenses' tabeli
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->id(); // Unikaalne ID
            $table->string('description'); // Kulutuse kirjeldus
            $table->decimal('amount', 10, 2); // Kulutuse summa
            $table->date('date'); // Kulutuse kuupäev
            $table->string('category')->nullable(); // Kategooria, võib olla tühi
            $table->timestamps(); // Loob created_at ja updated_at veerud
        });
    }

    // Kustutab tabeli, kui vaja tagasi võtta
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
