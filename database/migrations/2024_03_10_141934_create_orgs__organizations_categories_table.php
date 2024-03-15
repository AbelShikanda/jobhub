<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrgsOrganizationsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orgs__organizations_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('org_id')->constrained('organizations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('org_category_id')->constrained('organizations_categories')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('orgs__organizations_categories');
    }
}
