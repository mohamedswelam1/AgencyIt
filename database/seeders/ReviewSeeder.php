<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::create([
            'description'=>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deserunt nam laboriosam reprehenderit omnis, earum rerum commodi, exercitationem ducimus quaerat quidem eveniet molestiae aliquid tenetur officia reiciendis autem explicabo fugit deleniti.",
            'reviewer_id'=>4 ,
            'reviewed_employee_id'=>2,
        ]);
        Review::create([
            'description'=>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deserunt nam laboriosam reprehenderit omnis, earum rerum commodi, exercitationem ducimus quaerat quidem eveniet molestiae aliquid tenetur officia reiciendis autem explicabo fugit deleniti.",
            'reviewer_id'=>1 ,
            'reviewed_employee_id'=>3,
        ]);
    }
}
