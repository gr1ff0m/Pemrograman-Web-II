<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $dbGroup = 'default';
    protected $allowedFields = ['username', 'password'];
}
