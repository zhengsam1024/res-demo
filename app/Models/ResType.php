<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResType extends Model
{
    public $timestamps = false; 

    public function __construct()
    {
        parent::__construct();
        $this->table = config('migrate.res.rent_type');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uname',
    ];
}
