<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PDFController;
use App\Models\Company;
use App\Models\Finance;
use PDF;
use App\Models\Module;

class FinancesController extends Controller{

    public $finance;

    public function __construct(){
        $this->finance = new Finance();
    }

    public function index(){
        if (auth()->user()->id != null){
            $info = auth()->user()->info;
            $dateCreate = isset(auth()->user()->created_at) ? auth()->user()->created_at : '';
            $financeActivity = $this->finance->getFinanceActivity(auth()->user()->id);
            $allFinanceActivity = $this->finance->getFinanceActivity(auth()->user()->id,true);
            $userTariff = $this->finance->getUserTariff(auth()->user()->id);
            $useTariffDay = date('t') - date('d') + 1;
            $module = new Module();
            $activeModule = $module->getActiveModule(auth()->user()->id);
            return view('pages.account.finances.finances', compact('info','financeActivity','dateCreate','activeModule','userTariff','useTariffDay','allFinanceActivity'));
        }else{
            return redirect('/login');
        }
    }

    public function makePaymentInvoice(){
        if (auth()->user()->id == null) {
            return redirect('/login');
        }

        $userId = auth()->user()->id;

        if (isset($_REQUEST['payType']) && isset($_REQUEST['amount'])) {
            $dateCreate = date('Y-m-d H:i:s');
            $amount = $_REQUEST['amount'];
            $data = [
                'amount' => $amount,
                'date' => $dateCreate,
            ];

            if ($_REQUEST['payType'] == 2) {
                $paymentId = $this->finance->createNewPaymentInvoice($userId, $data);

                if ($paymentId) {
                    $company = new Company();
                    $userCompany = $company->getUserCompany($userId);

                    if ($userCompany != null) {
                        $pdfController = new PDFController();

                        $dataForPdf = [
                            'payment_id' => $paymentId,
                            'date' => $pdfController->rusMonthDate("d M Y", strtotime($dateCreate)),
                            'company_name' => $userCompany->name,
                            'inn' => $userCompany->inn,
                            'kpp' => $userCompany->kpp,
                            'ogrn' => $userCompany->ogrn,
                            'legal_address' => $userCompany->legal_address,
                            'amount' => number_format($amount, 2, ',', ''),
                            'strAmount' => $pdfController->ucfirst_utf8($pdfController->num2str($amount)),
                        ];

                        $pdf = PDF::loadView('pages.account.finances.paymentInvoice', compact('dataForPdf'));
                        return $pdf->download('paymentInvoice.pdf');
                    } else {
                        return redirect('/account/finance?needToAddCompany');

                    }
                }
            }
        }

        return redirect('/account/finance');
    }
}
