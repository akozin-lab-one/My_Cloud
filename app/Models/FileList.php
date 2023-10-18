<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileList extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id', 'category_id', 'permission_id', 'file_name'];
}
