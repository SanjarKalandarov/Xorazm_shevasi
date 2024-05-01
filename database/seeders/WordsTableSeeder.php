<?php

namespace Database\Seeders;

use App\Models\Word;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wordTranslations = [
            'vaj' => 'narsa',
            'adam' => 'odam',
            'dil' => 'til',
            'al' => 'ol',
            'nichiksan' => 'yaxshimisan',
            'gashir' => 'sabzi',
            "g'alting" => 'chuqur',
            "dig'iriq" => 'chumchuq',
            'qarinja' => 'chumoli',
            'uchak' => 'tom',
            'yumirta' => 'tuxum',
            "yo'k" => "yo'q",
            'ertang' => 'ertaga',
            'miyman' => 'mexmon',
            'burunch' => 'guruch',
            'ad' => 'ism',
            'novvi' => 'nima',
            'berda' => 'bu yerda',
            'dur' => 'tur',
            "ba'r" => 'ber',
            'garak' => 'kerak',
            'gun' => 'kun',
            'yap' => 'ariq',
            'atiz' => 'ekin maydoni',
            'naszvay' => 'rayhon',
            "h'az" => 'mazza',
            "kulta" => "bog'",
            "xo'shroy" => 'chiroyli',
            "lash" => 'gavda',
            "jorap" => 'paypoq',
            "pa'tik" => 'ship',
            "payir" => 'hamirturush',
            "adan" => 'poygoh',
            "sulgi" => 'sochiq',
            "sipsa" => 'supirgi',
            "da'liz" => "da'hliz",
            "giyim" => 'kiyim',
            "go'ynak" =>"ko'ylak",
            "keyp" =>"kayf",
            "akkal" =>"olib kel",
            "t'aka" =>"yostiq",
            "xaraz" =>"te'girmon",
            "uyitqi" =>"tomizg'i",
            "otashkir" =>"otash kurak",
            "dabbi" =>"semiz",
            "varsaqi" =>"vaysaqi",
            "dish" =>"tish",
            "ag'iz" =>"og'iz",
            // Qolgan ma'lumotlar
        ];

        // Ma'lumotlar bazasiga so'zlar va ularning tarjimalarini qo'shish
        foreach ($wordTranslations as $word => $translation) {
            Word::create([
                'word' => $word,
                'literature_text' => $translation,
            ]);
        }

    }
}
