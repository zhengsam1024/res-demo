<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
* 建立物件的migrate
*   包括房屋型態…等等的 
*   相依於業務員, 房東
* 
 */

class SalesPeople extends Migration
{

    public function __construct()
    {
        $this->salesPeople = config('migrate.users.sale');
    }

    public function up()
    {
        dump('Migration ['.$this->salesPeople.'] tables ...');
        Schema::create($this->salesPeople, function(Blueprint $table) {
            $table->id();
            $table->string('account');
            $table->string('password');
            $table->string('name');
            $table->enum('gender', ['male', 'female']);
            $table->string('line_id');
            $table->json('contacts');
            $table->boolean('status')->default(FALSE);
            $table->date('last_logined_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists( $this->salesPeople );
    }
}
