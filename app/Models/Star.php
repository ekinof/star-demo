<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Star
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $image_url
 * @property string $description
 *
 * @mixin \Eloquent
 */
class Star extends Model
{
    use HasFactory;

    protected $table = 'star';
}
