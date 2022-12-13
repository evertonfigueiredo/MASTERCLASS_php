<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Produto
 *
 * @property $id
 * @property $name
 * @property $value
 * @property $description
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Produto extends Model
{

  use SoftDeletes;

  static $rules = [
    'name' => 'required',
    'value' => 'required|numeric',
    'description' => 'required',
  ];

  protected $perPage = 5;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'value', 'description'];
}
