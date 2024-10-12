@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>My Project</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Projects</h4>
                            <div class="card-header-action">
                                <a class="btn btn-primary"
                                    href="{{ route('admin.projects.projectTechnologies.index', $project) }}">
                                    <i class="fas fa-trash-alt"></i>
                                    View Active
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
