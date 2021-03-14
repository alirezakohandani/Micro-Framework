<?php

namespace App\Traits;

use Hekmatinasser\Verta\Verta;

trait SolarYear
{
    /**
     * Convert Gregorian date to solar
     *
     * @return void
     */
    public function changeToSolarYear()
    {
        $records = $this->read();
        
        foreach($records as  $k=>$v)
        {
            $v = new Verta($v['created_at']);
            return $v->formatDifference(); 
        }
    }
}