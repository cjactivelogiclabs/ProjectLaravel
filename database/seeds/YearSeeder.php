<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Year;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = array(
            [
                'year' => '1991',
                'status' => 1
            ],
            [
                'year' => '1992',
                'status' => 1
            ],
            [
                'year' => '1993',
                'status' => 1
            ],
            [
                'year' => '1994',
                'status' => 1
            ],
            [
                'year' => '1995',
                'status' => 1
            ],
            [
                'year' => '1996',
                'status' => 1
            ],
            [
                'year' => '1997',
                'status' => 1
            ],
            [
                'year' => '1998',
                'status' => 1
            ],
            [
                'year' => '1999',
                'status' => 1
            ],
            [
                'year' => '2000',
                'status' => 1
            ],
            [
                'year' => '2001',
                'status' => 1
            ],
            [
                'year' => '2002',
                'status' => 1
            ],
            [
                'year' => '2003',
                'status' => 1
            ],
            [
                'year' => '2004',
                'status' => 1
            ],
            [
                'year' => '2005',
                'status' => 1
            ],
            [
                'year' => '2006',
                'status' => 1
            ],
            [
                'year' => '2007',
                'status' => 1
            ],
            [
                'year' => '2008',
                'status' => 1
            ],                                                                                    
            [
                'year' => '2009',
                'status' => 1
            ],
            [
                'year' => '2010',
                'status' => 1
            ],
            [
                'year' => '2011',
                'status' => 1
            ],
            [
                'year' => '2012',
                'status' => 1
            ],
            [
                'year' => '2013',
                'status' => 1
            ],
            [
                'year' => '2014',
                'status' => 1
            ],
            [
                'year' => '2015',
                'status' => 1
            ],
            [
                'year' => '2016',
                'status' => 1
            ],
            [
                'year' => '2017',
                'status' => 1
            ]
        );
        Year::insert($data);
    }
}
