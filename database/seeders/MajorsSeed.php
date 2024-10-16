<?php

namespace Database\Seeders;

use App\Domains\Major\Models\Major;
use App\Enum\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorsSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $majors = [
            [
                'name' => 'Data Science',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728812574/portfolio/major/tgudwjfmo4ojjyqbndpy.png',
                'description' => 'This is Data Science',
                'status' => Status::Active,
            ],
            [
                'name' => 'Embedded Systems',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728812639/portfolio/major/sxx090lbzhlshi4jtmhf.png',
                'description' => 'This is Embedded Systems',
                'status' => Status::Active,
            ],
            [
                'name' => 'Business Analysis',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728812996/portfolio/major/xxwnvsw9dixkodlsrnbg.png',
                'description' => 'This is Business Analysis',
                'status' => Status::Active,
            ],
            [
                'name' => 'IT Project Management',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728812790/portfolio/major/p4lbqyyew4gjnqvefiae.jpg',
                'description' => 'This is IT Project Management',
                'status' => Status::Active,
            ],
            [
                'name' => 'Computer Engineering',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728812498/portfolio/major/y00qed8hvvcdpjnol429.png',
                'description' => 'This is Computer Engineering',
                'status' => Status::Active,
            ],
            [
                'name' => 'Internet of Things',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728812766/portfolio/major/o4ot9ftvutubvhpmwqb3.png',
                'description' => 'This is Internet of Things',
                'status' => Status::Active,
            ],
            [
                'name' => 'Game Development',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728812668/portfolio/major/csd9rixd7wtzybqdbsmi.png',
                'description' => 'This is Game Development',
                'status' => Status::Active,
            ],
            [
                'name' => 'Computer Graphics & Virtual Reality',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813096/portfolio/major/sey4dkaa1yt2ohtpv01g.png',
                'description' => 'This is Computer Graphics & Virtual Reality',
                'status' => Status::Active,
            ],
            [
                'name' => 'E-commerce Technology',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728812604/portfolio/major/kw3xzk3hw8fmkiiewouq.png',
                'description' => 'This is E-commerce Technology',
                'status' => Status::Active,
            ],
            [
                'name' => 'Artificial Intelligent',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728812336/portfolio/major/frpwjxczlqhhpzgfu6qv.png',
                'description' => 'This is Artificial Inteligent',
                'status' => Status::Active,
            ],
            [
                'name' => 'Computer Network',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728812543/portfolio/major/u1cok6sa8ifauvmksnqo.png',
                'description' => 'This is Computer Network',
                'status' => Status::Active,
            ],
            [
                'name' => 'Software Engineering',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728812817/portfolio/major/ngjlwutmcaknlwlvd4cg.png',
                'description' => 'This is Software Engineering',
                'status' => Status::Active,
            ],
            [
                'name' => 'Cloud Computing',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728812469/portfolio/major/vky04reju1ilownmlpwv.png',
                'description' => 'This is Cloud Computing',
                'status' => Status::Active,
            ],
            [
                'name' => 'Information security',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728812701/portfolio/major/powqrjq2awlxx2cnzojr.png',
                'description' => 'This is Information security',
                'status' => Status::Active,
            ]
        ];

        foreach ($majors as $major) {
            Major::create($major);
        }
    }
}
