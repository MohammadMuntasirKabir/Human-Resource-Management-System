<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Company;
use App\Models\Salary;
use App\Models\Payment;

class Payroll extends Model
{
    protected $fillable = [
        'company_id',
        'year',
        'month',
    ];

    protected $casts = [
        'year' => 'integer',
        'month' => 'integer',
    ];

    protected $appends = ['month_year', 'month_string'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function scopeInCompany(Builder $query, ?int $companyId = null): Builder
    {
        $companyId = $companyId ?? session('company_id');
        return $query->where('company_id', $companyId);
    }

    public function getMonthYearAttribute(): string
    {
        return sprintf('%d-%02d', $this->year, $this->month);
    }

    public function getMonthStringAttribute(): string
    {
        return Carbon::create($this->year, $this->month, 1)->format('F Y');
    }
}