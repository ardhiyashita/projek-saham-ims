<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
           'date'     => $row[0],
           'emiten_id'=> '1',
           'open'     => $row[1], 
           'close'    => $row[2], 
           'sumber'   => $row[3], 
        ]);
    }
}
