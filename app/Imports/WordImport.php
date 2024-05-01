<?php

namespace App\Imports;

use App\Models\Word;
//use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class WordImport implements ToCollection,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
//    public function model(array $row)
//    {
//        return new Word([
//            'id'     => $row['id'],
//            'word'    => $row['word'],
//            'literature_text' => $row['literature_text'],
//        ]);
//    }
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            Word::create([
                'id' => $row['id'],
                'word' => $row['word'],
                'literature_text' => $row['literature_text'],
            ]);
        }
    }
}
