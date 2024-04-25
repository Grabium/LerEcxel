<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
  public function mainTigger(Request $request)
  {
    $column = $request["searchColumn"];
    $partialPath = ExcelImportController::saveXlsx($request);
    $qtd = (new ReaddingController($partialPath, $column))->readding();
    DeletingController::excludXlsx($partialPath);
    return view('quantidade_de_contratos', [ 'qtd' => $qtd, 'column' => $column]);
  }
}
