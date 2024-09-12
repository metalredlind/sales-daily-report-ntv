<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalSurat extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_team', 'team');
    }
    
    public function userName()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
