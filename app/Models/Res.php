<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Res extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

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
    
    protected $fillable = [
        'uid',
        'title',
        'price',
        'visible_address',
        'detail_address',
        'pattern',
        'footage',
        'total_floor',
        'floor'
    ];
}
