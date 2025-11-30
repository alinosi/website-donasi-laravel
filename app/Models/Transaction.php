<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'program_id',
        'pay_type',
        'status',
        'amount',
    ];
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    protected $casts = [
        'user_id' => 'integer',
        'program_id' => 'integer',
        'amount' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Transaksi milik satu user (donatur).
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Transaksi milik satu program.
     */
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }
}
