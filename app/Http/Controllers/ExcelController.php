<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
public function index()
 {
 
        Excel::create('Laravel Excel', function($excel) {
 
            $excel->sheet('Usuarios', function($sheet) {
 
                $products = Usuario::all();
 
                $sheet->fromArray($products);
 
            });
        })->export('xls');
 
 }
}
