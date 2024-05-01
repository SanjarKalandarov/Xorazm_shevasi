<?php

namespace App\Http\Controllers;

use App\Imports\WordImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function index()
    {
        return view('import');

    }
    public function import_excel(Request $request)
    {
        Excel::import(new WordImport(),$request->file('file'));
        return back()->with('success', 'Excel file imported successfully');
    }

}
