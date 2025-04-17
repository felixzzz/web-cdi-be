<?php

namespace App\Enums;

enum InvestorReportType: string
{
    case AnnualReport = 'annual_report';
    case FinancialReport = 'financial_report';
    case Prospectus = 'prospectus';
    case GMS = 'gms';
    case Disclosure = 'disclosure';

    public function word()
    {
        return match ($this->value) {
            'annual_report' => 'Annual Report',
            'financial_report' => 'Financial Report',
            'prospectus' => 'Prospectus',
            'gms' => 'GMS',
            'disclosure' => 'Disclosure'
        };
    }
}
