<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shop = [
            [
                "id" => 1,
                "name" => "Daffodil International University",
                "description" => "Daffodil International University is a private university located in Dhaka, Bangladesh. The original campus is located at Dhanmondi and the permanent campus is located in Daffodil Smart City, Khagan, Ashulia, Savar which is in Dhaka district.",
                "address" => "102/1, Sukrabad Mirpur Rd, Dhaka 1207",
                "latitude" => "23.752944",
                "longitude" => "90.377692",
                "active" => 1
            ],
            [
                "id" => 2,
                "name" => "Squre Hospital",
                "description" => "SQUARE Hospital ensures the best healthcare service comprise of professional (clinical) service excellence with outstanding personal service. Qualified Doctors.",
                "address" => "18/F, Bir Uttam Qazi Nuruzzaman Sarak West, Panthapath, Dhaka 1205",
                "latitude" => "23.753004",
                "longitude" => "90.381680",
                "active" => 1
            ],
            [
                "id" => 3,
                "name" => "Haq International Abashik Hotel -2",
                "description" => "Business Name Haque International Abasik Hotel. Address Mirpur Road ,Haque International Abasik Hotel,Shymoli,1,2&4 Comertial plot.",
                "address" => "1,2,4 No. Commercial Plot, Shyamoli, Mirpur Road, Mohammadpur, Dhaka 1207",
                "latitude" => "23.774232",
                "longitude" => "90.365790",
                "active" => 1
            ],
            [
                "id" => 4,
                "name" => "Popular Medicine Corner",
                "description" => "Popular Medicine Corner does not just fill up the prescriptions; rather it helps the patients achieving their health goals.",
                "address" => "Mirpur Road, Dhaka 1207",
                "latitude" => "23.771707",
                "longitude" => "90.367517",
                "active" => 1
            ],
            [
                "id" => 5,
                "name" => "Star Cineplex",
                "description" => "A haven for moviegoers in the capital, Star Cineplex in the Bashundhara City Shopping Mall, will not reopen. The news was confirmed by the head of PR of Star Cineplex Mesbahuddin Ahmed.",
                "address" => "13/3 Ka, Level 8, Bashundhara City, Panthapath, Dhaka 1205",
                "latitude" => "23.750890",
                "longitude" => "90.390452",
                "active" => 1
            ],
            [
                "id" => 6,
                "name" => "Bank Asia",
                "description" => "Bank Asia Limited is a private sector commercial bank in Bangladesh. Mr. Arfan Ali is the President and Managing Director of the bank.",
                "address" => "Bank Asia Tower, 32 & 34, Kazi Nazrul Islam Ave, Dhaka 1215",
                "latitude" => "23.750439",
                "longitude" => "90.392238",
                "active" => 1
            ],
            [
                "id" => 7,
                "name" => "Tejgao Jame Mosque",
                "description" => "Tejgao Jame Mosque is located in . The distance between the Mosque and Mecca is 7666.72 km North West.",
                "address" => "Tejgaon, Dhaka 1215, Bangladesh",
                "latitude" => "23.757326",
                "longitude" => "90.391721",
                "active" => 1
            ],
            [
                "id" => 8,
                "name" => "The Prime Minister's Office",
                "description" => "Prime Minister's Office (PMO) is a division and equivalent to the ministry. Allocation of Business Among the different ministries and divisions has allocated some responsibilities.",
                "address" => "Old Sangsad Bhaban, Tejgaon, Dhaka-1215, Bangladesh.",
                "latitude" => "23.767446",
                "longitude" => "90.390207",
                "active" => 1
            ],
            [
                "id" => 9,
                "name" => "Government Laboratory High School, Dhaka",
                "description" => "The Government Laboratory High School is a school located in Dhanmondi, Dhaka, Bangladesh. The school was established on 3 September 1961.",
                "address" => "Mirpur Rd, Dhaka 1205",
                "latitude" => "23.736681",
                "longitude" => "90.381347",
                "active" => 1
            ],
            [
                "id" => 10,
                "name" => "Safwan Park",
                "description" => "Safwan Park is a park in Dhaka Division. Safwan Park is situated nearby to NAMAPARA, close to Shugondha Tower.",
                "address" => "Rd No. 3, Dhaka 1229",
                "latitude" => "23.826699",
                "longitude" => "90.434429",
                "active" => 1
            ],
        ];

        Shop::insert($shop);
    }
}
