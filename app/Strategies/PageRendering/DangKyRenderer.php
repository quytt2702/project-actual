<?php

namespace App\Strategies\PageRendering;

class DangKyRenderer
{
    public function render()
    {
        return view('sections.layouts.dang_ky')->render();
    }
}
