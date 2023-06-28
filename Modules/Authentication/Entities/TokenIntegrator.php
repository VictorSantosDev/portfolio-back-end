<?php

namespace Modules\Authentication\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class TokenIntegrator extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'token_integrator';

    /** @var array<string> */
    protected $fillable = [
        'id',
        'name',
        'token',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
