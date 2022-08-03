<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoftwareVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software_versions', function (Blueprint $table) {
            $table->id();
            $table->integer('software_id');
            $table->string('version');
            $table->string('link_download');
            $table->text('version_desc');
            $table->float('version_size');
            $table->integer('user_last_modified_id');
            $table->softDeletes();
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
        Schema::dropIfExists('software_versions');
    }
}
