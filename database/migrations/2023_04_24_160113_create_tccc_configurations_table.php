<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTcCcConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tc_cc_configurations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('tc_intro_text')->nullable();
            $table->text('tc_instruction')->nullable();
            $table->text('tc_file')->nullable();
            $table->text('tc_notification_option')->nullable();
            $table->bigInteger('tc_start_num')->unsigned()->nullable();
            $table->bigInteger('tc_current_num')->unsigned()->nullable();
            $table->bigInteger('mz_academic_year_tc')->unsigned()->nullable();
            $table->text('cc_instruction')->nullable();
            $table->text('cc_notification_option')->nullable();
            $table->bigInteger('cc_start_num')->unsigned()->nullable();
            $table->bigInteger('cc_current_num')->unsigned()->nullable();
            $table->bigInteger('mz_academic_year_cc')->unsigned()->nullable();
            $table->string('formattype_tc');
           
            $table->foreign('mz_academic_year_cc')->references('id')->on('academic_years');
            $table->foreign('mz_academic_year_tc')->references('id')->on('academic_years');
          
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
        Schema::dropIfExists('tc_cc_configurations');
    }
}
