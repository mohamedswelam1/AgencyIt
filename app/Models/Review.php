<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class 



Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'reviewer_id',
        'reviewed_employee_id',
    ];
    public function users()
    {
        return $this->belongsTo(User::class,'reviewer_id','id');
    }
    /*
        return information about reviewed employee
     */
    public function reveiwed()
    {
        return $this->belongsTo(User::class,'reviewed_employee_id','id');
    }
    
}
