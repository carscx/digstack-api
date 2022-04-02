<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleAbility extends Model
{
    use HasFactory;

    protected $table    = 'role_abilities';
    protected $guarded  = [];
    protected $hidden   = ['created_at', 'updated_at'];
    protected $with     = ['abilities'];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function abilities()
    {
        return $this->belongsTo(Ability::class, 'ability_id', 'id');
    }
}
