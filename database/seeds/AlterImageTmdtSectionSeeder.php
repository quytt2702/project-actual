<?php

use Illuminate\Database\Seeder;

use App\Entities\TmdtSection;

class AlterImageTmdtSectionSeeder extends Seeder
{
    public function run()
    {
        $tmdts = TmdtSection::all();
        foreach ($tmdts as $tmdt) {
            $tmdt->update([
                'image' => "/images/tmdt_images/section_{$tmdt->id}.png"
            ]);
        }
    }
}
