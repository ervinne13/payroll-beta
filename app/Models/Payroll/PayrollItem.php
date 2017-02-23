<?php

namespace App\Models\Payroll;

use App\Models\HR\PolicyPayrollItem;
use App\Models\SGModel;

class PayrollItem extends SGModel {

    protected $table      = "payroll_item";
    protected $primaryKey = "code";
    protected $fillable   = [
        "code", "is_active", "description", "payslip_display_string", "standard", "taxable", "type", "computation_basis", "requires_employee_amount"
    ];

    public function __construct(array $attributes = array()) {
        parent::__construct($attributes);        
    }

    public function scopeForProcessing($query, $employeeCode, $policyCode) {
        $payrollItem = $this;

        return $query
                        ->leftJoin('policy_payroll_item', "policy_payroll_item.payroll_item_code", '=', "{$payrollItem->table}.code")
                        ->leftJoin('employee_payroll_item_computation', "employee_payroll_item_computation.payroll_item_code", '=', "{$payrollItem->table}.code")
                        ->where("policy_code", $policyCode)
                        ->where(function($query) use ($employeeCode) {
                            return $query
                                    ->where("employee_code", $employeeCode)
                                    ->orWhereNull("employee_payroll_item_computation.employee_code");
                        })
                        ->orderBy("policy_payroll_item.computation_source")
        ;
    }

    public function scopeDependenciesFirst($query) {
        return $query
                        ->orderBy("policy_payroll_item.computation_source")
                        ->orderBy("{$this->table}.description")
        ;
    }

    public function policyPayrollItem() {
        return $this->hasOne(PolicyPayrollItem::class, 'payroll_item_code');
    }

    public function employeePayrollItemComputation() {
        return $this->hasOne(EmployeePayrollItemComputation::class, 'payroll_item_code');
    }

    public function scopeWithPolicyComputationSource($query, $policyCode) {

        $payrollItem = $this;

        return $query
//                        ->addSelect('computation_source')
                        ->leftJoin('policy_payroll_item', "policy_payroll_item.payroll_item_code", '=', "{$payrollItem->table}.code")
                        ->where("policy_payroll_item.policy_code", $policyCode)
//                        ->leftJoin('policy_payroll_item', function($join) use($policyCode, $payrollItem) {
//                            $join->on("policy_code", '=', DB::raw($policyCode));
//                            $join->on("policy_payroll_item.payroll_item_code", '=', "{$payrollItem->table}.code");
//                        })
        ;
    }

    public function scopeWithEmployeeAmount($query, $employeeCode) {

        $payrollItem = $this;

        return $query
//                        ->addSelect('amount')
                        ->leftJoin('employee_payroll_item_computation', "employee_payroll_item_computation.payroll_item_code", '=', "{$payrollItem->table}.code")
                        ->where("employee_payroll_item_computation.employee_code", $employeeCode)
        ;
//                        ->leftJoin('employee_payroll_item_computation', function($join) use($employeeCode, $payrollItem) {
//                            $join->on("employee_code", '=', DB::raw($employeeCode));
//                            $join->on("employee_payroll_item_computation.payroll_item_code", '=', "{$payrollItem->table}.code");
//                        });        
    }

}
