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
        Schema::create('agriculture_advice', function (Blueprint $table) {
            $table->id();
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('agriculture_advice')->nullable()->collation('utf8_general_ci');
            $table->string('sarok_potro_no')->nullable()->collation('utf8_general_ci');
            $table->string('sarok_date')->nullable();
            $table->string('purbavaser_somoykal')->nullable();
            $table->string('purbavaser_sarsongkhep')->nullable()->collation('utf8_general_ci');
            $table->string('table_data')->nullable()->collation('utf8_general_ci');
            $table->string('sms_krishi_poramorsho')->nullable()->collation('utf8_general_ci');
            $table->string('dhan_gacher_briddhi_porjay')->nullable()->collation('utf8_general_ci');
            $table->string('dhan_gacher_briddhi_porjay_details')->nullable()->collation('utf8_general_ci');
            $table->string('krishi_tattik_bebosthapona')->nullable()->collation('utf8_general_ci');
            $table->string('sesh_pani_bebosthapona')->nullable()->collation('utf8_general_ci');
            $table->string('rog_balai_bebosthapona')->nullable()->collation('utf8_general_ci');
            $table->string('poka_makor_bebosthapona')->nullable()->collation('utf8_general_ci');
            $table->string('sorirtattik_bebosthapona')->nullable()->collation('utf8_general_ci');
            $table->string('mrittika_bebosthapona')->nullable()->collation('utf8_general_ci');
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('agriculture_advice');
    }
};
