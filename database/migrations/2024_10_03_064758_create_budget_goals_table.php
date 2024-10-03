<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetGoalsTable extends Migration
{
    public function up()
    {
        Schema::create('budget_goals', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->decimal('goal_amount', 10, 2);
            $table->decimal('current_amount', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('budget_goals');
    }
}
