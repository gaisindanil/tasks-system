<?php 
namespace App\Models;

use CodeIgniter\Model;

class TasksModel extends Model
{
    
    protected $table      = 'tasks';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    

    protected $allowedFields = ['status', 'user_name', 'email', 'text', 'admin_update'];

    
    protected $deletedField  = '';


}