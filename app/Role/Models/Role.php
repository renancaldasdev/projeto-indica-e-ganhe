<?php

namespace App\Role\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static static create(array $attributes = [])
 * @method static static find($id, $columns = ['*'])
 * @method static static findOrFail($id, $columns = ['*'])
 * @mixin Builder
 */
class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug'
    ];
}
