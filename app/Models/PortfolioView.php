<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioView extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'visitor_ip', 'visited_at'];

    public $timestamps = false;
}
