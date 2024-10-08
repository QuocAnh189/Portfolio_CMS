<?php

namespace App\Http\Controllers\User;

use App\Domains\Education\Services\EducationService;
use App\Domains\Experience\Services\ExperienceService;
use App\Domains\Feature\Services\FeatureService;
use App\Domains\Link\Services\LinkService;
use App\Domains\Project\Services\ProjectService;
use App\Domains\ProjectGallery\Services\ProjectGalleryService;
use App\Domains\Relation\UserTechnologies\Services\UserTechnologiesService;
use App\Domains\Skill\Services\SkillService;
use App\Domains\User\Models\User;
use App\Http\Controllers\Controller;

class UserDashboardController extends Controller
{
    public function index(
        UserTechnologiesService $userTechnologyService,
        ProjectService $total_project,
        ProjectGalleryService $projectGalleryService,
        FeatureService $featureService,
        LinkService $linkService,
        ExperienceService $experiencesService,
        EducationService $educationService,
        SkillService $skillService,
        User $user
    ) {
        $total_technology = $userTechnologyService->countTechnologiesOfUser();
        $total_project = $total_project->countProjectOfUser();
        $total_gallery = $projectGalleryService->countGalleryOfUserProject();
        $total_feature = $featureService->countFeatureOfUserProject();
        $total_link = $linkService->countLinkUserProject();
        $total_experiences  = $experiencesService->countExperienceOfUser();
        $total_skill  = $skillService->countSkillOfUser();
        $total_education = $educationService->countEducationOfUser();


        return view(
            'user.dashboard.index',
            [
                'user' => $user,
                'total_technology' => $total_technology,
                'total_project' => $total_project,
                'total_gallery' => $total_gallery,
                'total_feature' => $total_feature,
                'total_link' => $total_link,
                'total_experiences' => $total_experiences,
                'total_education' => $total_education,
                'total_skill' => $total_skill
            ]
        );
    }
}
