<?php

namespace App\Http\Controllers;

use DOMPDF;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;


class PDFController extends Controller
{

    public function invoiceHtml(){

        $data = [
            'vendor' => 'PROVA',
             'user' => 'Sergi'

        ];
        return view ('receipt',$data);
    }

    public function downloadInvoice(){
        if (! defined('DOMPDF_ENABLE_AUTOLOAD')) {
            define('DOMPDF_ENABLE_AUTOLOAD', false);
        }
        if (file_exists($configPath = base_path().'/vendor/dompdf/dompdf/dompdf_config.inc.php')) {
            require_once $configPath;
        }
        $dompdf = new Dompdf();
        $data = [
            'vendor' => 'PROVA',
             'user' => 'Sergi'

        ];

        $dompdf->load_html($this->view($data)->render());
        //$dompdf->load_html("<h1>hola</h1>");
        $dompdf->render();
        return $this->download($dompdf->output());
    }

   public function download($pdf){


       //$filename = $data['product'].'_'.$this->date()->month.'_'.$this->date()->year.'.pdf';
       $filename = "hola.pdf";
       return new Response($pdf, 200, [

           'Content-Description' => 'File Transfer',
           //'Content-Disposition' => 'attachment; filename="'.$filename.'"',
           'Content-Transfer-Encoding' => 'binary',
           'Content-Type' => 'application/pdf',
       ]);
   }


    /**
     * Get the View instance for the invoice.
     *
     * @param  array  $data
     * @return \Illuminate\View\View
     */
    public function view(array $data)
    {
        return View::make('receipt', $data
        );
    }

}
