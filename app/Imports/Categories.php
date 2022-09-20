<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;

class Categories implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Category([
            'id'               => $row[0],
            'name'             => $row[1],
            'meta_title'       => $row[2],
            'meta_description' => $row[3],
            'meta_keywords'    => $row[4],
        ]);
    }
}
