<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Relations\HasOne;
use illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;



class Career extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    // public function job_form(): HasOne
    // {
    //     return $this->HasOne(JobForm::class, 'id', 'job_form_id');
    // }

}
