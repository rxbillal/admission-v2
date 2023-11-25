<?php

namespace App\Imports;

use App\Models\JambInfo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;

class JambImport implements ToCollection
{
    public function __construct()
    {
        set_time_limit(-1);
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $row)
    {
        foreach ($row->slice(1) as $row)
        {
            JambInfo::where('j_no',$row[1])->update([
                'j_eng_subject' => 'English',
                'j_eng_score' => $row[14],
                'j_subject1' => $row[8],
                'j_subject1_score' => $row[9],
                'j_subject2' =>  $row[10],
                'j_subject2_score' =>  $row[11],
                'j_subject3' =>  $row[12],
                'j_subject3_score' =>  $row[13],
            ]);
        }
       /* return new JambInfo([
            //
        ]);*/
    }
}
