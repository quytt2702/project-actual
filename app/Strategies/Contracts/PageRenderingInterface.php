<?php

namespace App\Strategies\Contracts;

use App\Entities\Url;

interface PageRenderingInterface
{
    public function render(Url $url);
}
