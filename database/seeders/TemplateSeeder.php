<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Template::truncate();
        Schema::enableForeignKeyConstraints();

        $templates = [
            // USA Templates (20)
            ['name' => 'aegean', 'template_element' => true, 'type' => 'basic', 'state' => 'usa', 'title' => 'Aegean', 'status' => 1],
            ['name' => 'amethyst', 'template_element' => true, 'type' => 'basic', 'state' => 'usa', 'title' => 'Amethyst', 'status' => 1],
            ['name' => 'box_blue', 'template_element' => true, 'type' => 'basic', 'state' => 'usa', 'title' => 'Box Blue', 'status' => 1],
            ['name' => 'cerulean', 'template_element' => true, 'type' => 'advance', 'state' => 'usa', 'title' => 'Cerulean', 'status' => 1],
            ['name' => 'global_white_check', 'template_element' => true, 'type' => 'advance', 'state' => 'usa', 'title' => 'Global White Check', 'status' => 1],
            ['name' => 'lapis', 'template_element' => true, 'type' => 'basic', 'state' => 'usa', 'title' => 'Lapis', 'status' => 1],
            ['name' => 'olive', 'template_element' => true, 'type' => 'basic', 'state' => 'usa', 'title' => 'Olive', 'status' => 1],
            ['name' => 'paystub_colors', 'template_element' => true, 'type' => 'basic', 'state' => 'usa', 'title' => 'Paystub Colors', 'status' => 1],
            ['name' => 'paystubx', 'template_element' => true, 'type' => 'basic', 'state' => 'usa', 'title' => 'Paystubx', 'status' => 1],
            ['name' => 'paystubx_basic', 'template_element' => true, 'type' => 'basic', 'state' => 'usa', 'title' => 'Paystubx Basic', 'status' => 1],
            ['name' => 'paystubx_blue', 'template_element' => true, 'type' => 'advance', 'state' => 'usa', 'title' => 'Paystubx Blue', 'status' => 1],
            ['name' => 'paystubx_check', 'template_element' => true, 'type' => 'advance', 'state' => 'usa', 'title' => 'Paystubx Check', 'status' => 1],
            ['name' => 'paystubx_district_colors', 'template_element' => true, 'type' => 'advance', 'state' => 'usa', 'title' => 'Paystubx District Colors', 'status' => 1],
            ['name' => 'paystubx_prior', 'template_element' => true, 'type' => 'basic', 'state' => 'usa', 'title' => 'Paystubx Prior', 'status' => 1],
            ['name' => 'pt_blue', 'template_element' => true, 'type' => 'advance', 'state' => 'usa', 'title' => 'PT Blue', 'status' => 1],
            ['name' => 'pt_brown', 'template_element' => true, 'type' => 'advance', 'state' => 'usa', 'title' => 'PT Brown', 'status' => 1],
            ['name' => 'pt_green', 'template_element' => true, 'type' => 'advance', 'state' => 'usa', 'title' => 'PT Green', 'status' => 1],
            ['name' => 'reddish', 'template_element' => true, 'type' => 'basic', 'state' => 'usa', 'title' => 'Reddish', 'status' => 1],
            ['name' => 'tawny', 'template_element' => true, 'type' => 'basic', 'state' => 'usa', 'title' => 'Tawny', 'status' => 1],
            ['name' => 'wood', 'template_element' => true, 'type' => 'basic', 'state' => 'usa', 'title' => 'Wood', 'status' => 1],

            // Canada Templates (9)
            ['name' => 'cerulean', 'template_element' => true, 'type' => 'basic', 'state' => 'canada', 'title' => 'Cerulean', 'status' => 1],
            ['name' => 'emerald', 'template_element' => true, 'type' => 'basic', 'state' => 'canada', 'title' => 'Emerald', 'status' => 1],
            ['name' => 'fog', 'template_element' => true, 'type' => 'basic', 'state' => 'canada', 'title' => 'Fog', 'status' => 1],
            ['name' => 'irish', 'template_element' => true, 'type' => 'advance', 'state' => 'canada', 'title' => 'Irish', 'status' => 1],
            ['name' => 'jam', 'template_element' => true, 'type' => 'advance', 'state' => 'canada', 'title' => 'Jam', 'status' => 1],
            ['name' => 'paystubx_blue_fiotd', 'template_element' => true, 'type' => 'advance', 'state' => 'canada', 'title' => 'Paystubx Blue Fiotd', 'status' => 1],
            ['name' => 'paystubx_camport', 'template_element' => true, 'type' => 'basic', 'state' => 'canada', 'title' => 'Paystubx Camport', 'status' => 1],
            ['name' => 'paystubx_orange', 'template_element' => true, 'type' => 'advance', 'state' => 'canada', 'title' => 'Paystubx Orange', 'status' => 1],
            ['name' => 'stone', 'template_element' => true, 'type' => 'basic', 'state' => 'canada', 'title' => 'Stone', 'status' => 1],

            // UK Templates (8)
            ['name' => 'Taffy', 'template_element' => true, 'type' => 'basic', 'state' => 'uk', 'title' => 'Taffy', 'status' => 1],
            ['name' => 'aegean', 'template_element' => true, 'type' => 'basic', 'state' => 'uk', 'title' => 'Aegean', 'status' => 1],
            ['name' => 'blue_target', 'template_element' => true, 'type' => 'advance', 'state' => 'uk', 'title' => 'Blue Target', 'status' => 1],
            ['name' => 'fog', 'template_element' => true, 'type' => 'basic', 'state' => 'uk', 'title' => 'Fog', 'status' => 1],
            ['name' => 'mint', 'template_element' => true, 'type' => 'basic', 'state' => 'uk', 'title' => 'Mint', 'status' => 1],
            ['name' => 'pin_blue', 'template_element' => true, 'type' => 'advance', 'state' => 'uk', 'title' => 'Pin Blue', 'status' => 1],
            ['name' => 'sage_blue', 'template_element' => true, 'type' => 'basic', 'state' => 'uk', 'title' => 'Sage Blue', 'status' => 1],
            ['name' => 'tawny', 'template_element' => true, 'type' => 'basic', 'state' => 'uk', 'title' => 'Tawny', 'status' => 1],

            // Global Templates (3)
            ['name' => 'global_white_check', 'template_element' => true, 'type' => 'basic', 'state' => 'global', 'title' => 'Global White Check', 'status' => 1],
            ['name' => 'paystub_colors', 'template_element' => true, 'type' => 'basic', 'state' => 'global', 'title' => 'Paystub Colors', 'status' => 1],
            ['name' => 'paystubx_modern', 'template_element' => true, 'type' => 'advance', 'state' => 'global', 'title' => 'Paystubx Modern', 'status' => 1],

            // W2 Form
            ['name' => 'w2form', 'template_element' => true, 'type' => 'basic', 'state' => 'w2form', 'title' => 'W2 Form', 'status' => 1],
        ];

        foreach ($templates as $template) {
            Template::create($template);
        }
    }
}
