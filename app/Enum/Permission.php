<?php

namespace App\Enum;

enum Permission: string
{
    case VIEW_USERS = 'view_users';
    case CREATE_USERS = 'create_users';
    case UPDATE_USERS = 'update_users';

    case VIEW_ROLES = 'view_roles';
    case CREATE_ROLES = 'create_roles';
    case UPDATE_ROLES = 'update_roles';

    case VIEW_CATEGORIES = 'view_categories';
    case CREATE_CATEGORIES = 'create_categories';
    case UPDATE_CATEGORIES = 'update_categories';
    case DELETE_CATEGORIES = 'delete_categories';

    case VIEW_MAJORS = 'view_majors';
    case CREATE_MAJORS = 'create_majors';
    case UPDATE_MAJORS = 'update_majors';
    case DELETE_MAJORS = 'delete_majors';

    case VIEW_ROLESOFTWARES = 'view_rolesoftwares';
    case CREATE_ROLESOFTWARES = 'create_rolesoftwares';
    case UPDATE_ROLESOFTWARES = 'update_rolesoftwares';
    case DELETE_ROLESOFTWARES = 'delete_rolesoftwares';

    case VIEW_TECHNOLOGIES = 'view_technologies';
    case CREATE_TECHNOLOGIES = 'create_technologies';
    case UPDATE_TECHNOLOGIES = 'update_technologies';
    case DELETE_TECHNOLOGIES = 'delete_technologies';

    case VIEW_PROJECTS = 'view_projects';
    case CREATE_PROJECTS = 'create_projects';
    case UPDATE_PROJECTS = 'update_projects';
    case DELETE_PROJECTS = 'delete_projects';

    case VIEW_LINKS = 'view_links';
    case CREATE_LINKS = 'create_links';
    case UPDATE_LINKS = 'update_links';
    case DELETE_LINKS = 'delete_links';

    case VIEW_FEATURES = 'view_features';
    case CREATE_FEATURES = 'create_features';
    case UPDATE_FEATURES = 'update_features';
    case DELETE_FEATURES = 'delete_features';

    case VIEW_GALLERIES = 'view_galleries';
    case CREATE_GALLERIES = 'create_galleries';
    case UPDATE_GALLERIES = 'update_galleries';
    case DELETE_GALLERIES = 'delete_galleries';

    case VIEW_PROJECT_TECHNOLOGIES = 'view_project_technologies';
    case CREATE_PROJECT_TECHNOLOGIES = 'create_project_technologies';
    case UPDATE_PROJECT_TECHNOLOGIES = 'update_project_technologies';
    case DELETE_PROJECT_TECHNOLOGIES = 'delete_project_technologies';

    case VIEW_SKILLS = 'view_skills';
    case CREATE_SKILLS = 'create_skills';
    case UPDATE_SKILLS = 'update_skills';
    case DELETE_SKILLS = 'delete_skills';

    case VIEW_EXPERIENCES = 'view_experiences';
    case CREATE_EXPERIENCES = 'create_experiences';
    case UPDATE_EXPERIENCES = 'update_experiences';
    case DELETE_EXPERIENCES = 'delete_experiences';

    case VIEW_EDUCATIONS = 'view_educations';
    case CREATE_EDUCATIONS = 'create_educations';
    case UPDATE_EDUCATIONS = 'update_educations';
    case DELETE_EDUCATIONS = 'delete_educations';


    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}
