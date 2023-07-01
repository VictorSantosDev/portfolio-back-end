<?php

namespace Modules\Authentication\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SecretAuthorization extends Model
{
    use HasFactory;

    protected $table = 'secret_authorization';

    /** @var array<string> */
    protected $fillable = [
        'id',
        'secret',
        'active',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
