<?php 

namespace App\Models;

use App\Models\Model;

class User extends Model {
  protected $tableName = 'users';
  protected $fillable = ['name'];
  protected $visible = ['id', 'name'];
}
