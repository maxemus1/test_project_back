<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClientsUrl extends Migration
{
    public $timestamps = false;
    protected $table = 'clients_url';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_url', function (Blueprint $table) {

            $table->char('client_ip');
            $table->text('from_url');
            $table->text('to_url');
            $table->timestamp('time_click');
            $table->increments('id');
        });

        Schema::table('clients_url', function ($table) {
            $table->foreign('client_ip')->references('client_ip')->on('clients')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients_url');
    }
}
