<?php

namespace App\Strategies\PageRendering;

class DangNhapRenderer
{
    public function render()
    {
        return view('sections.layouts.dang_nhap')->render();
    }
}
