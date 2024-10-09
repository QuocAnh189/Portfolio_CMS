@extends('user.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
    </section>

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="{{ setActive(['user.userTechnologies.*']) }}" href="{{ route('user.userTechnologies.index') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-tv"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total My Technology</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_technology }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="{{ setActive(['user.projects.*']) }}" href="{{ route('user.projects.index') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total My Project</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_project }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="{{ setActive(['user.project-galleries.*']) }}" href="{{ route('user.project-galleries.index') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-image"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total My Gallery</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_gallery }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="{{ setActive(['user.features.*']) }}" href="{{ route('user.features.index') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-x-ray"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total My Feature</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_feature }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="{{ setActive(['user.links.*']) }}" href="{{ route('user.links.index') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-link"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total My Links</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_link }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="{{ setActive(['user.experiences.*']) }}" href="{{ route('user.experiences.index') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fab fa-creative-commons-nd"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total My Experiences</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_experiences }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="{{ setActive(['user.skills.*']) }}" href="{{ route('user.skills.index') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-wind"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total My Skills</h4>
                        </div>
                        <div class="card-body">
                            {{ $total_skill }}
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a class="{{ setActive(['user.education.*']) }}" href="{{ route('user.education.index') }}">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-school"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total My Education</h4>
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
