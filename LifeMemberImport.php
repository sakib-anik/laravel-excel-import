<?php

namespace App\Imports;

use App\Models\LifeMember;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LifeMemberImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new LifeMember([
            'lm_no'          => $row['lm_no'],
            'name'           => $row['name'],
            'status'         => $row['status'] ?? null,
            'status_remarks' => $row['status_remarks'] ?? null,
            'is_abroad'      => $row['is_abroad'] ?? 0,
            'address'        => $row['address'] ?? null,
        ]);
    }
}
