<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['total','merchant_id','date','comment','receipt','status'];

    public function scopeSearch($query, $term){
        $term = "%$term%";
        $return = $query->where(function($query) use ($term){
            $query->where('total', 'like', $term)
            ->orWhere('date', 'like', $term)
            ->orWhere('comment', 'like', $term)
            ->orWhereHas('merchant', function($query) use ($term){
                $query->where('name', 'like', $term);
            });
        });

        return $return;
    }

    public function merchant(){
        return $this->belongsTo(Merchant::class, 'merchant_id');
    }
}
