<?php

namespace App\Http\Controllers;

use App\Imports\MoviesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;

class ExcelImportController extends Controller
{
  public static function saveXlsx(Request $request)
  {
    // Ensure that the 'file' field is present, is a file and is either in xlsx or xls format
    /*$request->validate([
      'file' => 'required|file|mimes:xlsx,xls',
    ]);*/

    //dd($_FILES);

    //$file = $request->file('changedFile');
    // Handle File Upload
    if($request->hasFile('changedFile')){
        // Get filename with the extension
        $filenameWithExt = $request->file('changedFile')->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('changedFile')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore= $filename.'_'.time().'.'.$extension;
      
        // Upload Image
        //no arquivo config\filesystems.php, há configurações para o salvamento de arquivos.
        //o drive disks configura o salvamento em: /storage/storage_path('cliente')/'planilhasUpadas'
        $path = $request->file('changedFile')->storeAs('planilhasUpadas', $fileNameToStore);
      
    } else {
        $fileNameToStore = 'vazio';
    }

    $completePath =  '/storage/cliente/'.$path;

    return $completePath;
    
  }
}
