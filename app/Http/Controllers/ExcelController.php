<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Exports\JeuxExport;
use Maatwebsite\Excel\Facades\Excel;
  
class ExcelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('excel.import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new JeuxExport, 'jeux.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        
    }
}
