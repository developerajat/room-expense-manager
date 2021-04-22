<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromArray;


class UsersListExport implements FromArray, WithHeadings, ShouldAutoSize
{
    protected $data = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
    * @return \Illuminate\Support\Collection
    */

    public function array() : array
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'Id',
            'Name',
            'Email',
            'Phone Number',
            'Verification',
            'Total Donation',
            'Profile Completed',
            'Status',
            'Affiliation',
            'Is Union Member'
        ];
    }
}
