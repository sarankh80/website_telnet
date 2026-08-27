<?php

namespace App\Http\Controllers;

use App\Repositories\Admin\Fetch\AppRepository;

abstract class Controller
{
    public function __construct(
        protected AppRepository $repository
    ) {}
}
