<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
        protected $table = 'programs';

        protected $fillable = [
        'program_name',
        'descriptions',
        'image',
        'funds_collected',
        'target_funds',
        'image',
        'is_active'
    ];
    
    protected $casts = [
        'target_funds' => 'integer',
        'funds_collected' => 'integer',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

       public function transactions()
    {
        return $this->hasMany(Transaction::class, 'program_id', 'id');
    }
}
