<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class JobForm extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }

}
