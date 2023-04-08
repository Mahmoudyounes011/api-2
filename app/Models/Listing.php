<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{

     public static function alll()
        {
           return [
            [
               'id' => 1,
               'title' => 'listings One',
               'description' => 'Hello every body I study information technology enineering'
            ],
            [
                'id' => 2,
                'title' => 'listings second',
                'description' => 'Hello every body I study information technology enineering'
             ]
            ];
        }
        public static function find($id)
        {
            $listings = self::all();
            foreach($listings as $listing)
            {
                if($listing['id'] == $id)
                return $listing;
            }
        }
}
