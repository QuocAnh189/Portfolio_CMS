<?php

namespace Database\Seeders;

use App\Domains\Category\Models\Category;
use App\Enum\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Travel Tournament Application',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728810658/portfolio/category/ind8jqmpsqmli6nvq2ky.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Entertainment Media',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728810365/portfolio/category/b9dbqdjequmilx9qfoee.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Cloud Platforms',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728810232/portfolio/category/ehpnsswkka1upqjmqkwq.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Cyber Security',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728810573/portfolio/category/gunntxiszslyr8wgpxn4.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Project Management Tool',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728810542/portfolio/category/mz5tw8cyojbzex9rxwar.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Financial Technology',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728810398/portfolio/category/aidj5oustarklujeebcc.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Agriculture Website',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728810086/portfolio/category/ooqpfk5vdlvfrdwc6vqj.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Artificial Inteligent',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728810177/portfolio/category/f8ugjrbupsrneqrbc6d2.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Game Application',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728810420/portfolio/category/vmymtem9zi2lzwe9o4io.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Content Management System',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728810254/portfolio/category/ikotibdhyetfqzf7mdmf.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Social Media Platforms',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728810597/portfolio/category/nsdyxqjeegiezavlsqio.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Ecommerce Website',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728810276/portfolio/category/g1zrxtmd8owlzifgto48.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'HealthCate Application',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728810507/portfolio/category/wrogfrmxazvuntx8fgzu.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Education Application',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728810338/portfolio/category/sftt21hshtk8ld7jhub3.png',
                'status' => Status::Active,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
