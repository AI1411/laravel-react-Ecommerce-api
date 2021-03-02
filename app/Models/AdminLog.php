<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Collection;

class AdminLog extends Model
{
    protected $guarded = [];

    /**
     * @param int $user_id
     * @param string $action
     * @param string $section
     * @return \Illuminate\Database\Eloquent\Builder|Model
     */
    public static function registerLog(int $user_id, string $action, string $section)
    {
        return self::query()->create([
            'user_id' => $user_id,
            'action' => $action,
            'section' => $section,
        ]);
    }
}
