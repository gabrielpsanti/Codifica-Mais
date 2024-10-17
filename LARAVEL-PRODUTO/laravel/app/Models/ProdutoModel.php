<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdutoModel extends Model
{
    use SoftDeletes, Timestamp;
    protected $table = 'produto';
}
