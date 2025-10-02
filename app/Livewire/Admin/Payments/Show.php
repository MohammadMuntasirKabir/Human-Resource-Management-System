<?php

namespace App\Livewire\Admin\Payments;

use App\Models\Salary;
use Livewire\Component;
use App\Models\Payroll;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class Show extends Component
{
    public $payroll;
    public function mount($id){
        $this->payroll = Payroll::inCompany()->find($id);
    }

    public function generatePayslip($id){
        $salary = Salary::find($id);
        $pdf = PDF::loadView('pdf.payslip', ['salary' => $salary]);
        $pdf->setPaper(array(0,0,400,1500), 'portrait');
        $filePath = storage_path(Str::slug($salary->employee->name) . '-payslip.pdf');
        $pdf->save($filePath);
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
    public function render()
    {
        return view('livewire.admin.payments.show');
    }
}
