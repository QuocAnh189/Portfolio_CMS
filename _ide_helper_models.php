<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Domains\Category\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string $image
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Project\Models\Project> $projects
 * @property-read int|null $projects_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Category withoutTrashed()
 */
	class Category extends \Eloquent {}
}

namespace App\Domains\Education\Models{
/**
 * 
 *
 * @property string $id
 * @property string $user_id
 * @property string $logo
 * @property float $gpa
 * @property string $university_name
 * @property string|null $major_id
 * @property string $description
 * @property int $degree
 * @property string $start_date
 * @property string|null $end_date
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Domains\Major\Models\Major|null $major
 * @property-read \App\Domains\User\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Education newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Education newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Education onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Education query()
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereDegree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereGpa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereMajorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereUniversityName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Education withoutTrashed()
 */
	class Education extends \Eloquent {}
}

namespace App\Domains\Experience\Models{
/**
 * 
 *
 * @property string $id
 * @property string $user_id
 * @property string|null $role_software_id
 * @property string $company_name
 * @property string $job_title
 * @property string $job_description
 * @property string $level
 * @property int $is_current
 * @property string $start_date
 * @property string|null $end_date
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Domains\RoleSoftware\Models\RoleSoftware|null $role_software
 * @property-read \App\Domains\User\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Experience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Experience newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Experience onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Experience query()
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereIsCurrent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereJobDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereRoleSoftwareId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Experience withoutTrashed()
 */
	class Experience extends \Eloquent {}
}

namespace App\Domains\Feature\Models{
/**
 * 
 *
 * @property string $id
 * @property string $project_id
 * @property string $name
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Domains\Project\Models\Project $project
 * @method static \Illuminate\Database\Eloquent\Builder|Feature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Feature onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Feature query()
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Feature withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Feature withoutTrashed()
 */
	class Feature extends \Eloquent {}
}

namespace App\Domains\Link\Models{
/**
 * 
 *
 * @property string $id
 * @property string $project_id
 * @property string $title
 * @property string|null $url
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Domains\Project\Models\Project $project
 * @method static \Illuminate\Database\Eloquent\Builder|Link newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Link newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Link onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Link query()
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Link withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Link withoutTrashed()
 */
	class Link extends \Eloquent {}
}

namespace App\Domains\Major\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string $image
 * @property string $description
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Education\Models\Education> $educations
 * @property-read int|null $educations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Major newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Major newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Major onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Major query()
 * @method static \Illuminate\Database\Eloquent\Builder|Major whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Major whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Major whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Major whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Major whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Major whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Major whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Major whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Major withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Major withoutTrashed()
 */
	class Major extends \Eloquent {}
}

namespace App\Domains\Profile\Models{
/**
 * 
 *
 * @property string $id
 * @property string $user_id
 * @property string|null $role_software_id
 * @property string|null $resume_link
 * @property string|null $avatar
 * @property string|null $fullname
 * @property string|null $contact_number
 * @property string|null $bio
 * @property string|null $facebook_link
 * @property string|null $github_link
 * @property string|null $youtube_link
 * @property string|null $instagram_link
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Domains\RoleSoftware\Models\RoleSoftware|null $role_software
 * @property-read \App\Domains\User\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereContactNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereFacebookLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereGithubLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereInstagramLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereResumeLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereRoleSoftwareId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereYoutubeLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile withoutTrashed()
 */
	class Profile extends \Eloquent {}
}

namespace App\Domains\ProjectGallery\Models{
/**
 * 
 *
 * @property string $id
 * @property string $project_id
 * @property string $image
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Domains\Project\Models\Project $project
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectGallery onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectGallery whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectGallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectGallery whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectGallery whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectGallery whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectGallery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectGallery withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectGallery withoutTrashed()
 */
	class ProjectGallery extends \Eloquent {}
}

namespace App\Domains\Project\Models{
/**
 * 
 *
 * @property string $id
 * @property string $user_id
 * @property string|null $category_id
 * @property string $name
 * @property string $cover_image
 * @property string $description
 * @property string $start_date
 * @property string|null $end_date
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Domains\Category\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Feature\Models\Feature> $features
 * @property-read int|null $features_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Link\Models\Link> $links
 * @property-read int|null $links_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\ProjectGallery\Models\ProjectGallery> $project_galleries
 * @property-read int|null $project_galleries_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Relation\ProjectTechnologies\Models\ProjectTechnologies> $project_technologies
 * @property-read int|null $project_technologies_count
 * @property-read \App\Domains\User\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCoverImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Project withoutTrashed()
 */
	class Project extends \Eloquent {}
}

namespace App\Domains\Relation\ProjectTechnologies\Models{
/**
 * 
 *
 * @property string $id
 * @property string $project_id
 * @property string $technology_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Domains\Project\Models\Project $project
 * @property-read \App\Domains\Technology\Models\Technology $technology
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTechnologies newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTechnologies newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTechnologies onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTechnologies query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTechnologies whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTechnologies whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTechnologies whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTechnologies whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTechnologies whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTechnologies whereTechnologyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTechnologies whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTechnologies withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectTechnologies withoutTrashed()
 */
	class ProjectTechnologies extends \Eloquent {}
}

namespace App\Domains\Relation\UserTechnologies\Models{
/**
 * 
 *
 * @property string $id
 * @property string $user_id
 * @property string $technology_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Domains\Technology\Models\Technology $technology
 * @property-read \App\Domains\User\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserTechnologies newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTechnologies newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTechnologies onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTechnologies query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTechnologies whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTechnologies whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTechnologies whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTechnologies whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTechnologies whereTechnologyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTechnologies whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTechnologies whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTechnologies withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTechnologies withoutTrashed()
 */
	class UserTechnologies extends \Eloquent {}
}

namespace App\Domains\RoleSoftware\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string $image
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Experience\Models\Experience> $experiences
 * @property-read int|null $experiences_count
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSoftware newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSoftware newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSoftware onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSoftware query()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSoftware whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSoftware whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSoftware whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSoftware whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSoftware whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSoftware whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSoftware whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSoftware withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSoftware withoutTrashed()
 */
	class RoleSoftware extends \Eloquent {}
}

namespace App\Domains\Skill\Models{
/**
 * 
 *
 * @property string $id
 * @property string $user_id
 * @property string|null $role_software_id
 * @property string $description
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Domains\RoleSoftware\Models\RoleSoftware|null $role_software
 * @property-read \App\Domains\User\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill query()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereRoleSoftwareId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill withoutTrashed()
 */
	class Skill extends \Eloquent {}
}

namespace App\Domains\Technology\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string $image
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Relation\ProjectTechnologies\Models\ProjectTechnologies> $project_technologies
 * @property-read int|null $project_technologies_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Relation\UserTechnologies\Models\UserTechnologies> $user_technologies
 * @property-read int|null $user_technologies_count
 * @method static \Illuminate\Database\Eloquent\Builder|Technology newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Technology newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Technology onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Technology query()
 * @method static \Illuminate\Database\Eloquent\Builder|Technology whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Technology whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Technology whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Technology whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Technology whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Technology whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Technology whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Technology withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Technology withoutTrashed()
 */
	class Technology extends \Eloquent {}
}

namespace App\Domains\User\Models{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed|null $password
 * @property string|null $provider
 * @property string|null $provider_id
 * @property string|null $provider_token
 * @property int $is_admin
 * @property string $status
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Experience\Models\Experience> $experiences
 * @property-read int|null $experiences_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Domains\Profile\Models\Profile|null $profile
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Project\Models\Project> $projects
 * @property-read int|null $projects_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Skill\Models\Skill> $skills
 * @property-read int|null $skills_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Domains\Relation\UserTechnologies\Models\UserTechnologies> $user_technologies
 * @property-read int|null $user_technologies_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProviderToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 */
	class User extends \Eloquent {}
}

