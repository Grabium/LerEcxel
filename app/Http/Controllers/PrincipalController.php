<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
  public function mainTigger(Request $request)
  {
    $completePath = ExcelImportController::saveXlsx($request);
    $qtd = (new ReaddingController)->readding($completePath);
    
    return view('quantidade_de_contratos', [ 'qtd' => $qtd]);
  }
}
