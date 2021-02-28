<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAccessLog extends Model
{
    protected $guarded = [];

    public static function register_log(array $data)
    {
        return self::query()->create($data);
    }
}
