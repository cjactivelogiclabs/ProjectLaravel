<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\State;

class StateSeeder extends Seeder
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
                'name' => 'Alabama',
                'short_name' => 'AL',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Alaska',
                'short_name' => 'AK',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Arizona',
                'short_name' => 'AZ',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Arkansas',
                'short_name' => 'AR',
                'id_countrie' => '1'
            ],
            [
                'name' => 'California',
                'short_name' => 'CA',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Colorado',
                'short_name' => 'CO',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Connecticut',
                'short_name' => 'CT',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Delaware',
                'short_name' => 'DE',
                'id_countrie' => '1'
            ],
            [
                'name' => 'District of Columbia',
                'short_name' => 'DC',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Florida',
                'short_name' => 'FL',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Georgia',
                'short_name' => 'GA',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Hawaii',
                'short_name' => 'HI',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Idaho',
                'short_name' => 'ID',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Illinois',
                'short_name' => 'IL',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Indiana',
                'short_name' => 'IN',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Iowa',
                'short_name' => 'IA',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Kansas',
                'short_name' => 'KS',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Kentucky',
                'short_name' => 'KY',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Louisiana',
                'short_name' => 'LA',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Maine',
                'short_name' => 'ME',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Maryland',
                'short_name' => 'MD',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Massachusetts',
                'short_name' => 'MA',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Michigan',
                'short_name' => 'MI',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Minnesota',
                'short_name' => 'MN',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Mississippi',
                'short_name' => 'MS',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Misuri',
                'short_name' => 'MO',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Montana',
                'short_name' => 'MT',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Nebraska',
                'short_name' => 'NE',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Nevada',
                'short_name' => 'NV',
                'id_countrie' => '1'
            ],
            [
                'name' => 'New Hampshire',
                'short_name' => 'NH',
                'id_countrie' => '1'
            ],
             [
                'name' => 'New Jersey',
                'short_name' => 'NJ',
                'id_countrie' => '1'
            ],
            [
                'name' => 'New Mexico',
                'short_name' => 'NM',
                'id_countrie' => '1'
            ],
            [
                'name' => 'New York',
                'short_name' => 'NY',
                'id_countrie' => '1'
            ],
            [
                'name' => 'North Carolina',
                'short_name' => 'NC',
                'id_countrie' => '1'
            ],
            [
                'name' => 'North Dakota',
                'short_name' => 'ND',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Ohio',
                'short_name' => 'OH',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Oklahoma',
                'short_name' => 'OK',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Oregon',
                'short_name' => 'OR',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Pennsylvania',
                'short_name' => 'PA',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Rhode Island',
                'short_name' => 'RI',
                'id_countrie' => '1'
            ],
            [
                'name' => 'South Carolina',
                'short_name' => 'SC',
                'id_countrie' => '1'
            ],
            [
                'name' => 'South Dakota',
                'short_name' => 'SD',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Tennessee',
                'short_name' => 'TN',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Texas',
                'short_name' => 'TX',
                'id_countrie' => '1'
            ],
             [
                'name' => 'Utah',
                'short_name' => 'UT',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Vermont',
                'short_name' => 'VT',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Virginia',
                'short_name' => 'VA',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Washington',
                'short_name' => 'WA',
                'id_countrie' => '1'
            ],
            [
                'name' => 'West Virginia',
                'short_name' => 'WV',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Wisconsin',
                'short_name' => 'WI',
                'id_countrie' => '1'
            ],
            [
                'name' => 'Wyoming',
                'short_name' => 'WY',
                'id_countrie' => '1'
            ]
        );
        State::insert($data);
    }
}
