<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Employee;
use App\Models\Designation;

class Contract extends Model
{
    protected $fillable = [
        'employee_id',
        'designation_id',
        'start_date',
        'end_date',
        'rate_type',
        'rate',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'rate' => 'decimal:2',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function scopeInCompany(Builder $query, ?int $companyId = null): Builder
    {
        $companyId = $companyId ?? session('company_id');
        return $query->whereHas('designation.department.company', fn ($q) => $q->where('id', $companyId));
    }

    public function scopeActive(Builder $query, ?string $date = null): Builder
    {
        $date = $date ?? now();
        return $query->where('start_date', '<=', $date)->where('end_date', '>=', $date);
    }

    public function isActive(?string $date = null): bool
    {
        $date = $date ? Carbon::parse($date) : now();
        return $this->start_date->lte($date) && $this->end_date->gte($date);
    }

    public function getDurationAttribute(): string
    {
        return $this->start_date->diffForHumans($this->end_date, ['absolute' => true]);
    }

    public function scopeSearchByEmployee(Builder $query, string $name): Builder
    {
        return $query->whereHas('employee', fn ($q) => $q->where('name', 'like', "%{$name}%"));
    }

    public function getTotalEarnings(string $monthYear): float
    {
        $date = Carbon::parse($monthYear);
        $monthStart = $date->copy()->startOfMonth();
        $monthEnd = $date->copy()->endOfMonth();

        if ($this->rate_type === 'monthly') {
            // Check if contract is active during this month
            if ($this->start_date->lte($monthEnd) && $this->end_date->gte($monthStart)) {
                return (float) $this->rate;
            }
            return 0;
        }

        // Daily rate
        $effectiveStart = $this->start_date->gt($monthStart) ? $this->start_date : $monthStart;
        $effectiveEnd = $this->end_date->lt($monthEnd) ? $this->end_date : $monthEnd;

        if ($effectiveStart->gt($effectiveEnd)) {
            return 0;
        }

        $workingDays = $effectiveStart->diffInDays($effectiveEnd) + 1;
        return (float) ($this->rate * $workingDays);
    }
}