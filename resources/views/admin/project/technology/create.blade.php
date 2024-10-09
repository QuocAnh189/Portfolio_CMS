@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Create Project Technology</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Technology</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.projects.projectTechnologies.store', $project) }}"
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row">
                                    <input class="form-control d-none" name="project_id" type="text"
                                        value="{{ $project->id }}">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="">Technologies</label>
                                        <select class="form-control" id="technology_id" name="technology_id">
                                            <option value="">
                                                None
                                            </option>
                                            @forelse ($technologies as $technology)
                                                <option value="{{ $technology->id }}">
                                                    {{ $technology->name }}
                                                </option>
                                            @empty
                                                No data
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submmit">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
