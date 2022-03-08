<?php

namespace App\Seeders;

use App\Http\Models\Category;
use Faker\Factory;


class CategorySeeder {

    private static $amountOfRecords = 10;

    public static function run() {
        // $categories = self::seed();
    }

    private static function seed() {
        $categories = [];
        for($i = 0; $i < self::$amountOfRecords; $i++) {
            $randomCategory = self::generate();

            $category = new Category();
            $category->title = $randomCategory;
            $category->slug = self::slugify($randomCategory);
            $category->save();
            $categories[] = $category;
        }

        return $categories;
    }

    private static function generate() {
        $faker = Factory::create();

        return $faker->word();
    }

    private static function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}

