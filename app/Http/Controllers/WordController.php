<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function words()
    {
        $words = Word::all();
//        dd('salom');
        return view('index',['words' => $words]);
    }

    public function word_create()
    {
        return view('create');
    }


    public function word_store(Request $request)
    {
        $words = new Word();
        $words->word = $request->word;
        $words->literature_text = $request->literature_text;
        $words->save();
        return redirect(route('words'));

    }

    public function convertToLiterature(Request $request)
    {
        $word = $request->input('word');
        // Adabiy tilga aylantirish logikasi
        $literatureText = $this->convertToLiteratureLogic($word);
        return $literatureText;
    }

    public function search_create()
    {
        return view("search");

    }
    public function get_translation(Request $request)
    {
        // Foydalanuvchidan Xorazm shevasidagi matnni olish
        $text = $request->input('word');

        // So'zlar va ularning tarjimalarini olish
        $words = explode(' ', $text);
        $translations = [];

        // Har bir so'zni tarjima qilish
        foreach ($words as $word) {
            // Ma'lumotlar bazasidan so'zni topish
            $wordModel = Word::where('word', $word)->first();

            // Ma'lumot topilsa uni qo'shish
            if ($wordModel) {
                $translations[] = $wordModel->literature_text;
            } else {
                $translations[] = $word; // Ma'lumot bazasida topilmagan so'zni o'zi qaytarish
            }
        }

        // Tarjimalarni yuborish
        $translatedText = implode(' ', $translations);

        return response()->json([
            'translation' => $translatedText
        ]);
        }


    public function qidiruv(Request $request){
        $word = $request->word;
        $wordModel = Word::where('word', 'like', $word.'%')->pluck('word')->toArray();
        if ($wordModel) {
            return response()->json([
                'translation' => $wordModel
            ]);
        }else {
            return response()->json([
                'translation' => $word
            ]);
        }
    }

//    private function findTranslation($word)
//    {
//        $wordModel = \App\Models\Word::where('word', $word)->first();
////        dd($wordModel);
//        if ($wordModel) {
//            return response()->json([
//                'translation' => $wordModel->literature_translation
//            ]);
//        }
//        return response()->json([
//            'translation' => $wordModel->word
//        ]);
//    }
}
