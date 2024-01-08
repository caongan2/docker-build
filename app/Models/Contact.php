<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';
    protected $fillable = [
        'email', 'phone', 'name'
    ];

    /** Lọc theo name product
     * @param $query
     * @param $name
     * @return mixed
     */
    public function scopeName($query, $name)
    {
        if ($name) {
            return $query->where('name', 'Like', '%'.$name.'%');
        }else
            return $query;
    }
}
