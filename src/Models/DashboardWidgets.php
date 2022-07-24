<?php

namespace Humweb\Thingamabob\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $user_id
 * @property string $name
 */
class DashboardWidgets extends Model
{
    use HasFactory;

    protected $table = 'dashboard_widgets';

    protected $fillable = [
        'user_id',
        'name',
        'widgets'
    ];

    protected $casts = [
        'widgets' => 'array'
    ];
}
