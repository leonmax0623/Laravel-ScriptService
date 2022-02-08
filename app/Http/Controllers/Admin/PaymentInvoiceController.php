<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Finance;
use Illuminate\Http\Request;

class PaymentInvoiceController extends Controller
{
    protected $financeModel;

    public function __construct(){
        $this->financeModel = new Finance();
    }

    public function getPaymentInvoice(){
        if ((isset($_GET['company_name']) && $_GET['company_name'] != '') || (isset($_GET['status']) && $_GET['status'] != '')){
            $data = [];

            if (isset($_GET['company_name']) && $_GET['company_name'] != ''){
                $data['company_name'] = $_GET['company_name'];
            }

            if (isset($_GET['status']) && $_GET['status'] != ''){
                $data['status'] = $_GET['status'];
            }

            if (count($data) > 0) {
                $allPayments = $this->financeModel->getPaymentInvoicesWithFilter($data);

                return view('admin.payment.paymentInvoice', compact('allPayments'));
            }
        }

        $allPayments = $this->financeModel->getAllPaymentInvoices();

        return view('admin.payment.paymentInvoice', compact('allPayments'));
    }

    public function deletePayment(){
        $data = [];
        $data['error'] = true;
        if (isset($_REQUEST['deletePaymentId'])){
            $this->financeModel->deletePayment($_REQUEST['deletePaymentId']);
            $data['error'] = false;
        }
        return $data;
    }

    public function confirmPayment(){
        $data = [];
        $data['error'] = true;
        if (isset($_REQUEST['paymentId'])){
            $data['error'] = $this->financeModel->confirmPayment($_REQUEST['paymentId']);
        }
        return $data;
    }
}
