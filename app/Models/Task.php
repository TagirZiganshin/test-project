<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = "task";
    public $timestamps = false;
    use HasFactory;
    public function status() {
    return $this->belongsTo(Status::class, 'id_status', 'id');
}
    protected $fillable = [
        "id_user",
        "id_category",
        "id_status",
        "description",
        "image"
    ];
}
