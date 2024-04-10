<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class LoanDetails extends Controller
{
    function GetLoanDetailsList(){

        $psSql = " SELECT a.*, concat(b.first_name, ' ', b.last_name) as user_name, b.contact_no, b.email "
               . "   FROM lbc_loan_details a, users b "
               . "  WHERE a.lbc_borrower_code = b.usercode ";


        $psLoanDetails = DB::select(DB::Raw( $psSql ));

        $psStatusCd = "SUCCESS";

        return view('LoanDetailsList', ['psLoanDetails' =>  $psLoanDetails]);
    }
}
