<?php

namespace Humweb\Thingamabob\Contracts;

use Illuminate\Http\Request;

interface Widget
{

    public function data(Request $request): array;

    public function getTitle(): string;
}
