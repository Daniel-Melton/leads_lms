
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('country');
            $table->string('time_zone');
            $table->enum('gender', ['male', 'female']);
            $table->string('email');
            $table->string('phone');
            $table->unsignedBigInteger('status_id');
            $table->string('source');
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->dateTime('reminder_at')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('agent_id')->references('id')->on('agents');
        });
    }

    public function down()
    {
        Schema::dropIfExists('leads');
    }
}