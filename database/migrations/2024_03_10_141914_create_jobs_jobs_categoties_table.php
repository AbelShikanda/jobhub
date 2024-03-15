<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsJobsCategotiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_jobs_categoties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('job_id')->constrained('jobs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('job_category_id')->constrained('jobs_categories')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('jobs_jobs_categoties');
    }
}
