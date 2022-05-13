<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wallpapers = [
            [
                "value" => "default",
                "text" => "Default",
                "group" => "Base"
            ],
            [
                "value" => "gray",
                "text" => "Gray",
                "group" => "Base"
            ],
            [
                "value" => "metro",
                "text" => "Metro",
                "group" => "Base"
            ],
            [
                "value" => "material",
                "text" => "Material",
                "group" => "Base"
            ],
            [
                "value" => "material-teal",
                "text" => "Material Teal",
                "group" => "Base"
            ],
            [
                "value" => "bootstrap",
                "text" => "Bootstrap",
                "group" => "Base"
            ],
            [
                "value" => "black",
                "text" => "Black",
                "group" => "Base"
            ]
        ];

        foreach ($wallpapers as $wallpaper) {
            Theme::create($wallpaper);
        }
    }
}
