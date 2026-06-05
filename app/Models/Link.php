<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $link_id
 * @property string $url
 * @property string $code
 * @property int $clicks
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Link extends Model
{
    protected $table = 'links';
    protected $primaryKey = 'link_id';

    protected $fillable = [
        'url',
        'code',
        'clicks',
    ];
}