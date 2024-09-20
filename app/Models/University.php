<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable=[
        'uni_name',
        'uni_website',
        'uni_phone',
        'email',
        'uni_logo' ,
        'uni_type',
        'uni_address',
        'uni_established_year',
        'uni_description',
    ];

    public function address(){
        return $this->hasOne(Address::class);
    }
}
