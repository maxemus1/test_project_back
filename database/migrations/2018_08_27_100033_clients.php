<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clients extends Migration
{
    protected $primaryKey = 'client_ip';
    public $timestamps = false;
    protected $table = 'clients';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {

            $table->char('client_ip')->unique();
            $table->text('browser_name');
            $table->text('os_name');
        });
    }

    /**
     * Reverse the migrations.php artisan migrate
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
