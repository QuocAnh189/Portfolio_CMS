<?php

namespace Database\Seeders;

use App\Domains\RoleSoftware\Models\RoleSoftware;
use App\Enum\Status;
use Illuminate\Database\Seeder;

class RoleSoftwaresSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolesoftwares = [
            [
                'name' => 'AI Engineer',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728811013/portfolio/role-software/m6tmekvkxtutdcph9w3s.png',
                'status' => Status::Active
            ],
            [
                'name' => 'Mobile App Developer',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728811287/portfolio/role-software/qwne4kewqcg4alkl1ezg.jpg',
                'status' => Status::Active
            ],
            [
                'name' => 'Cybersecurity Analysis',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728811139/portfolio/role-software/fbckedtmnej1p0levg1e.png',
                'status' => Status::Active
            ],
            [
                'name' => 'Data Scientist',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728811162/portfolio/role-software/ydm5ijbqxc1xr0qtc3fb.png',
                'status' => Status::Active
            ],
            [
                'name' => 'UI/UX Designer',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728811199/portfolio/role-software/tnriynkxpbl2ubmznsrq.png',
                'status' => Status::Active
            ],
            [
                'name' => 'Quality assurance & Quality control',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728811346/portfolio/role-software/lsrw9qqtsbrpb0njwkgr.jpg',
                'status' => Status::Active
            ],
            [
                'name' => 'Devops Engineer',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728811226/portfolio/role-software/pmo8guhraylhgw68sd8s.png',
                'status' => Status::Active
            ],
            [
                'name' => 'Fullstack Developer',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728811261/portfolio/role-software/r0w742wie9dgmkvzfsri.png',
                'status' => Status::Active
            ],
            [
                'name' => 'System Administrator',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728811383/portfolio/role-software/nmiwmymk2rddy5rb3yqd.png',
                'status' => Status::Active
            ],
            [
                'name' => 'Frontend Developer',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728811244/portfolio/role-software/xwyspmdd08kqbw91uwbl.png',
                'status' => Status::Active
            ],
            [
                'name' => 'Backend Developer',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728811036/portfolio/role-software/p1d7ahhcli3pr3qjd8ol.png',
                'status' => Status::Active
            ],
            [
                'name' => 'Tester',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728811422/portfolio/role-software/r6peywfdx4qfsjoz6fxc.png',
                'status' => Status::Active
            ],
            [
                'name' => 'Database Administrator',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728811182/portfolio/role-software/pcdlamzhz7pfpbbxob12.png',
                'status' => Status::Active
            ],
            [
                'name' => 'Cloud Engineer Update',
                'image' => 'https://res.cloudinary.com/dadvtny30/image/upload/v1728811054/portfolio/role-software/ziuy3mrvdpsrnym4hlag.jpg',
                'status' => Status::Active
            ]
        ];

        foreach ($rolesoftwares as $rolesoftware) {
            RoleSoftware::create($rolesoftware);
        }
    }
}
