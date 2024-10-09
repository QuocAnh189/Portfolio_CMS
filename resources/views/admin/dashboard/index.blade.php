@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Admin Dashboard</h1>
        </div>
    </section>

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="{{ setActive(['admin.users.*']) }}" href="{{ route('admin.users.index') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total User</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_user }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="{{ setActive(['admin.categories.*']) }}" href="{{ route('admin.categories.index') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-list"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Category</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_category }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="{{ setActive(['admin.role-softwares.*']) }}" href="{{ route('admin.role-softwares.index') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-podcast"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Role Software</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_rolesoftware }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="{{ setActive(['admin.majors.*']) }}" href="{{ route('admin.majors.index') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-film"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Majors</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_major }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="{{ setActive(['admin.technologies.*']) }}" href="{{ route('admin.technologies.index') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-tv"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Technology</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_technology }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="{{ setActive(['admin.projects.*']) }}" href="{{ route('admin.projects.index') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Project</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_project }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="{{ setActive(['admin.galleries.*']) }}" href="{{ route('admin.galleries.index') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-image"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Gallery</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_gallery }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="{{ setActive(['admin.features.*']) }}" href="{{ route('admin.features.index') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-x-ray"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Feature</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_gallery }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="{{ setActive(['admin.links.*']) }}" href="{{ route('admin.links.index') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-link"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Links</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_link }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="{{ setActive(['admin.experiences.*']) }}" href="{{ route('admin.experiences.index') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fab fa-creative-commons-nd"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Experiences</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_experience }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="{{ setActive(['admin.skills.*']) }}" href="{{ route('admin.skills.index') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-wind"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Skills</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_skill }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="{{ setActive(['admin.education.*']) }}" href="{{ route('admin.education.index') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-school"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Education</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_education }}
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
