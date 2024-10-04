<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetGoalsTable extends Migration
{
    // Loob uue tabeli 'budget_goals'
    public function up()
    {
        Schema::create('budget_goals', function (Blueprint $table) {
            $table->id(); // Unikaalne ID
            $table->string('description'); // Eesmärgi kirjeldus
            $table->decimal('goal_amount', 10, 2); // Eesmärgi summa
            $table->decimal('current_amount', 10, 2)->default(0); // Praegune summa, vaikimisi 0
            $table->timestamps(); // Loob created_at ja updated_at veerud
        });
    }

    // Kustutab tabeli, kui vaja tagasi võtta
    public function down()
    {
        Schema::dropIfExists('budget_goals');
    }
}
