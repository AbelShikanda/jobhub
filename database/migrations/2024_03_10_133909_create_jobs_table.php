<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('job_title', 100);
            $table->foreignId('org_id')->constrained('organizations')->onDelete('cascade')->onUpdate('cascade');
            $table->text('description')->nullable(); 
            $table->text('responsibilities')->nullable();
            $table->text('requirements')->nullable();
            $table->decimal('salary_range', 10, 2)->nullable();
            $table->date('deadline_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
