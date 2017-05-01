<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class UniqueIdentifier 
{
    public static function generate($table)
    {
        $flag = false;

        while (!$flag) {
            $id = '';

            // Create 15 random number
            for ($id = mt_rand(1, 9), $i = 1; $i < 15; $i++) {
      	    	$id .= mt_rand(0, 9);
      	    }

            $query = DB::table($table)->where('id', $id)->first();

            if (empty($query)) {
                $flag = true;
            }              
        }

        return $id;
    }
}
