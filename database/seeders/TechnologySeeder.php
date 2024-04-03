<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            'React.js',
            'Django',
            'Spring',
            '.NET'
        ];
        foreach ($technologies as $element) {
            $new_technology = new Technology();

            $new_technology->name = $element;
            $new_technology->slug = Str::slug($new_technology->name);


            $new_technology->save();
        }
    }
}
