<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Material;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class IncomeStatementController extends Controller
{
    public function index(Request $request)
{
    // Default to current month and year
    $month = $request->input('month', Carbon::now()->format('m'));
    $year = $request->input('year', Carbon::now()->format('Y'));

    // Filter Sales Revenue
    $salesRevenue = Order::where('status', 'delivered')
        ->whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->sum('total_amount');

    // Filter Inventory Materials
    $inventoryMaterials = Material::whereMonth('created_at', $month)
        ->whereYear('created_at', $year)
        ->selectRaw('SUM(unit_cost * quantity) as total_cost')
        ->value('total_cost');

    // Get Salary Debit from Input
    $salaryDebit = $request->input('salary_debit', 0); // Default to 0 if not provided
    $salaryCredit = $salaryDebit + $inventoryMaterials;

    // Calculate Net Income
    $netIncome = $salesRevenue - $salaryCredit;

    return view('income-statement', compact('month', 'year', 'salesRevenue', 'inventoryMaterials', 'netIncome', 'salaryDebit', 'salaryCredit'));
}



    public function generatePdf(Request $request)
    {
        $month = $request->input('month', Carbon::now()->format('m'));
        $monthWord = Carbon::create()->month((int)$month)->format('F');
        $year = $request->input('year', Carbon::now()->format('Y'));

        $salesRevenue = Order::where('status', 'delivered')
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('total_amount');

        $inventoryMaterials = Material::whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->selectRaw('SUM(unit_cost * quantity) as total_cost')
            ->value('total_cost');

        // Retrieve salary_debit input from the request
        $salaryDebit = $request->input('salary_debit', 0); // Default value if not provided
        $salaryCredit = $salaryDebit + $inventoryMaterials;

        $salariesExpense = $salaryDebit + $salaryCredit;

        $netIncome = $salesRevenue - $salariesExpense;

        $pdf = Pdf::loadView('income-statement-pdf', compact('month', 'year', 'salesRevenue', 'inventoryMaterials', 'netIncome', 'salariesExpense', 'monthWord', 'salaryDebit'));

        return $pdf->download('income-statement.pdf');
    }




}
