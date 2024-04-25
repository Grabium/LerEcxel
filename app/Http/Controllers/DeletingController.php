<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DeletingController extends Controller
{
  public static function excludXlsx($partialPath)
  {
    /**
    * seria assim:
    * public static function excludXlsx($completePath)
    * Mas $completePath possuiria o argumento de storage_path('cliente') de /config/filesystems.php 
    * também possui o primeiro argumento de ->storeAs('planilhasUpadas', $fileNameToStore)
    * que pertence ao ExcelImportController.php resultando em:
    * "/storage/cliente/planilhasUpadas/testePHP_1714052161.xlsx"
    * Estes argumentos (/storage/cliente) precisam ser excluídos para o arquivo ser deletado.
    * Seria necessário excluir este pedaço do endereço. para ter apenas a pasta customizada e nome do arquivo.
    * $partialPath = substr_replace($completePath, '', 0, 16);//apaga "/storage/cliente"
    * dump($completePath);//'/planilhasUpadas/nome_do_arquivo_com_extensão'
    * O problema foi resolvido trazendo desde já o nome 
    * parcial do endereço do arquivo desde o controller que salva com storageAs()
    * como solução mais elegante e abstrata.
    **/
    
    Storage::disk('local')->delete($partialPath);
  }
}
