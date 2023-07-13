<?php

namespace App\Imports;

use App\Models\Paper;
use Maatwebsite\Excel\Concerns\ToModel;

class PaperImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Paper([
            'paper_name' => $row[1],
            'paper_type'=> $row[2],
            'available'=> $row[3],
            //
        ]);
    }
}
