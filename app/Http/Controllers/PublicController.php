<?php

namespace App\Http\Controllers;

use App\Models\Resources\Company;
use App\Models\Resources\Offer;
use App\Models\Catalogo;
use Illuminate\Support\Facades\Log;


class PublicController extends Controller
{

    protected $_companyModel;
    protected $_catalogModel;

    public function __construct() {
        $this->_companyModel = new Company;
        $this->_offerModel = new Offer;
        $this->_catalogModel = new Catalogo;
    }

    public function showHome() {
        return view('home');        
    }

    public function showAziende() {
        $aznd = $this->_companyModel->getAzienda();   
        return view('aziende')
                    ->with('aziende', $aznd);
    }

    public function showCatalogo() {
        //$cat = $this->_offerModel->getCatalogo(); 
        $aznd = $this->_companyModel->getAzienda();
        $azndOff = $this->_catalogModel->getAziendaWithOffer($this->_companyModel->getAziendaID());
        return view('catalogo')
                    ->with('aziende', $aznd)
                    ->with('offerteAznd', $azndOff);
                    //->with('catalogo', $cat)
    }
}
