<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_category');
            $table->foreignId('company_id');
            $table->foreignId('project_id');
            $table->foreignId('module_id');
            $table->string('page_name');
            $table->string('remarks');
            $table->string('subject');
            $table->integer('created_by')->nullable();
            $table->integer('assign_by')->nullable();
            $table->integer('assign_to')->nullable();
            $table->string('issue_details');
            $table->string('status');
            $table->string('priority');
            $table->string('severity');
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
        Schema::dropIfExists('tickets');
    }
};
