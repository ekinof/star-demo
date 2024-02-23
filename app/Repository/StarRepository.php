<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Star;
use App\Repository\Abstract\BaseRepository;

class StarRepository extends BaseRepository
{
    public function __construct(Star $model)
    {
        parent::__construct($model);
    }
}
