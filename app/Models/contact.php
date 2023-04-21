<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;
    protected $table='Contact';
    protected $fillable=[
        'user_id',
        'content',
        'type',
        'phone',
        'project',
        'reason',
        'time_start',
        'time_end',
        'status',
        'dealine',
    ];
    public function users(){
        return $this->belongsTo(User::class);
    }
}
