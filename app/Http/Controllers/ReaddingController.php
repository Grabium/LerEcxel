<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shuchkin\SimpleXLSX;


class ReaddingController extends Controller
{
  public string $localFile = '';
  public array $data = [];
  public SimpleXLSX $xlsx;
  public int $linhasNaoNulas = 0;
  public string $searchColumn = '';


  public function __construct($partialPath, $searchColumn)
  {
    $this->localFile = base_path('/storage/cliente/'.$partialPath);
    $this->searchColumn = $searchColumn;
  }
  
  public function readding()
  {
    
    //$completePath =  '/storage/cliente/'.$path;
    
    
    if ($this->xlsx = SimpleXLSX::parse($this->localFile)) {
      //$this->tableView();//returna uma tabela em html da planilha.
      $this->indexerXlsx();//apenas cria um array mas não exibe. Use dump($data) para ver
      $this->verifyNotVoidRows();//verifica quantidade de linhas não vazias
      return  $this->linhasNaoNulas;
    }else{
      echo SimpleXLSX::parseError();
    }
  }

  public function tableView()
  {
    echo '<table border="1" cellpadding="3" style="border-collapse: collapse">';
    foreach( $this->xlsx->rows() as $r ) {
      echo '<tr><td>'.implode('</td><td>', $r ).'</td></tr>';
    }
    echo '</table>';
  }

  public function indexerXlsx()
  {
    $header_values = $rows = [];
    foreach ( $this->xlsx->rows() as $k => $r ) {
      if ( $k === 0 ) { //onde é Título (linha zero)
        $header_values = $r; //grava o nome do título.
        continue;
      }
      $rows[] = array_combine( $header_values, $r );
    }
    $this->data = $rows;
  }

  public function verifyNotVoidRows()
  {
    $totalDelinhas = count($this->data);
    $linhasVazias = 0;
    foreach($this->data as $k => $r){
      if($r[$this->searchColumn] == ''){
        $linhasVazias ++;
      }
    }
    $this->linhasNaoNulas = ($totalDelinhas - $linhasVazias);
  }
}
