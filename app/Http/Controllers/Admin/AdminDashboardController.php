<?php

namespace App\Http\Controllers\Admin;

use App\Domains\Category\Services\CategoryService;
use App\Domains\Education\Services\EducationService;
use App\Domains\Experience\Services\ExperienceService;
use App\Domains\Feature\Models\Feature;
use App\Domains\Feature\Services\FeatureService;
use App\Domains\Link\Services\LinkService;
use App\Domains\Major\Services\MajorService;
use App\Domains\Project\Services\ProjectService;
use App\Domains\ProjectGallery\Models\ProjectGallery;
use App\Domains\ProjectGallery\Services\ProjectGalleryService;
use App\Domains\RoleSoftware\Services\RoleSoftwareService;
use App\Domains\Skill\Services\SkillService;
use App\Domains\Technology\Services\TechnologyService;
use App\Domains\User\Services\UserService;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index(
        UserService $userService,
        CategoryService $categoryService,
        RoleSoftwareService $roleSoftwareService,
        MajorService $majorService,
        TechnologyService $edService,
        ProjectService $projectService,
        ProjectGalleryService $galleryService,
        FeatureService $featureService,
        LinkService $linkService,
        ExperienceService $experienceService,
        SkillService $skillService,
        EducationService $educationService
    ) {
        $total_user = $userService->countAllUsers();
        $total_category = $categoryService->countAllCategory();
        $total_rolesoftware = $roleSoftwareService->countAllRoleSoftware();
        $total_major = $majorService->countAllMajor();
        $total_technology = $edService->countAllTechnology();
        $total_project = $projectService->countAllProject();
        $total_gallery = $galleryService->countAllGallery();
        $total_feature = $featureService->countAllFeature();
        $total_link = $linkService->countAllLink();
        $total_experience = $experienceService->countAllExperience();
        $total_skill = $skillService->countAllSkill();
        $total_education = $educationService->countAllEducation();

        return view(
            'admin.dashboard.index',
            compact(
                'total_user',
                'total_category',
                'total_rolesoftware',
                'total_major',
                'total_technology',
                'total_project',
                'total_gallery',
                'total_feature',
                'total_link',
                'total_experience',
                'total_skill',
                'total_education'
            )
        );
    }
}
