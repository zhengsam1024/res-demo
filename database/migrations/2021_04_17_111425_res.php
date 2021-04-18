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

class Res extends Migration
{
    protected $resTable, $resTableType;

    public function __construct()
    {
        $this->rent = config('migrate.res.rent');
        $this->rentType = config('migrate.res.rent_type');
        $this->rentTypeIdField = config('migrate.res.rent_type') . '_id';
        $this->salesPeople = config('migrate.users.sale');
        $this->foreignSalesPeopleIdField = config('migrate.users.sale') . '_id';
    }

    public function up()
    {
        dump('Migration ['.$this->rentType.'] tables ...');
        Schema::create($this->rentType, function(Blueprint $table) {
            $table->id();
            $table->string('uname')->comment('房屋型態 like(雅房 套房...)');
        });

        dump('Migration ['.$this->rent.'] tables ...');
        Schema::create($this->rent, function(Blueprint $table) {
            $table->uuid('uid');
            $table->string('title');
            $table->decimal('price', 8, 2);
            $table->unsignedBigInteger( $this->rentTypeIdField );
            $table->foreign( $this->rentTypeIdField )
                    ->on( $this->rentType )
                    ->references('id');
            $table->string('visible_address')
                    ->comment('直接可看，上面不會記載詳細地址，只有業務員可看');
            $table->string('detail_address')
                    ->comment('詳細地址');
            $table->string('pattern')
                    ->comment('？房？廳');
            $table->decimal('footage', 8, 2)
                    ->comment('住宅面積？坪數');
            $table->integer('total_floor')->default(1)
                    ->comment('總樓層');
            $table->integer('floor')->default(1)
                    ->comment('樓層');
            $table->unsignedBigInteger( $this->foreignSalesPeopleIdField )
                    ->comment('物件對接業務id');
            $table->foreign( $this->foreignSalesPeopleIdField )
                    ->on( $this->salesPeople )
                    ->references('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists( $this->rentType );
        Schema::dropIfExists( $this->rent );
    }
}
