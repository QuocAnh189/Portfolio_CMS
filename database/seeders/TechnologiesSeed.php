<?php

namespace Database\Seeders;

use App\Domains\Technology\Models\Technology;
use App\Enum\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            [
                'name' => 'Next.js',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813699/portfolio/technology/vtj4ftaqeztc8xab6qzn.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Golang',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813486/portfolio/technology/sdc71utqmjvp4lq7vj2x.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Node.js',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813631/portfolio/technology/ozvb5hviromvn29i06hz.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Flask',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813472/portfolio/technology/ck06jdsv9a3epzfwggsm.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Rubi On Rails',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813879/portfolio/technology/vhagmwn71k3l5lnfxdq3.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Mysql',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813613/portfolio/technology/kzuy4reak416wytwsf9v.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Phalcon',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813721/portfolio/technology/ayg1uix42ita3h2y6b8v.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Nestjs',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813656/portfolio/technology/iaj24hx4wyms1hfw8wvd.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Django',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813402/portfolio/technology/xryfssiagrpou2plxesi.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Kubenetes',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813516/portfolio/technology/hl8rbpudhlsektpsfacs.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Aws',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813322/portfolio/technology/dcbhvbgfd54s6yilhzua.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Springboot',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813976/portfolio/technology/e3jbuh0udz2ufswj3jxe.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'MongoDB',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813595/portfolio/technology/whaojpetlmmoxq0zvqdx.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Angular',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813304/portfolio/technology/hgraky8fyvkxiawcwurz.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Docker',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813421/portfolio/technology/y2n4sqml4lndfonsceyp.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'ASP.NET',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813440/portfolio/technology/rufe2q2gkhu3qxp5exjo.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Codeigniter',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813383/portfolio/technology/iiiqtlpot3syuipkjbon.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'SQL Serve',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728814005/portfolio/technology/tmi8bib40jurwxxmh0jv.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Bootstrap',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813365/portfolio/technology/igvwl0kmwoubyypnqwnu.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Vue',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728814054/portfolio/technology/abpr2o7spd9pyvk90vdl.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Postgresql',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813775/portfolio/technology/mus27jx9mhjs0826fhhr.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Azure',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813335/portfolio/technology/kg3kd7emdeeff8z6igqz.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Redux',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813836/portfolio/technology/ygxanlgsg4eqjjhyz3ab.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Laravel',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813569/portfolio/technology/l6sv9ajisjoi4446cgki.png',
                'status' => Status::Active,
            ],
            [
                'name' => 'Tailwind',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728814028/portfolio/technology/zwbjhwrbfvmiuz4420p8.jpg',
                'status' => Status::Active,
            ],
            [
                'name' => 'React',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728813821/portfolio/technology/fl7ztnl4rgntgadm6vdk.png',
                'status' => Status::Active,
            ]
        ];

        foreach ($technologies as $technology) {
            Technology::create($technology);
        }
    }
}
