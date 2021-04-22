<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;
use Auth;

class DashboardController extends Controller
{
    /**
     * Display The data on Dashboard.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {
        $data['totalUsers'] = 0;
        $data['totalInvoices'] = 0;
        $data['paid'] = 0;
        $data['unpaid'] = 0;
        return view('admin.dashboard', $data);
    }

    public function userDashboard(Request $request)
    {
        $user = Auth::user();

        $fromDate = $request->from ?? null;
        $toDate = $request->to ?? date('Y-m-d');

        if ($fromDate) {
           
        }

        $data['totalInvoices'] = 0;
        $data['paid'] = 0;
        $data['unpaid'] = 0;

        return view('admin.userDashboard', $data);
    }
}
