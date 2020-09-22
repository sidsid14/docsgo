<?php  namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model{
    protected $table = 'docsgo-projects';
    protected $primaryKey = 'project-id'; 
    protected $allowedFields = ['project-id','name', 'description', 'start-date', 'end-date', 'is-active', 'manager-id'];
    
}