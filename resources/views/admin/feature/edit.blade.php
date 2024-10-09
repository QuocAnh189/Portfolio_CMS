@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Feature</h1>
        </div>
        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('admin.features.index') }}">Back</a>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Feature</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.features.update', $feature) }}" enctype="multipart/form-data"
                                method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Project</label>
                                        <select class="form-control" id="project_id" name="project_id">
                                            <option value="">
                                                None
                                            </option>
                                            @forelse ($projects as $project)
                                                <option @if ($project->id == $feature->project_id) selected @endif
                                                    value="{{ $project->id }}">
                                                    {{ $project->name }}
                                                </option>
                                            @empty
                                                No data
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Name</label>
                                        <input class="form-control" name="name" type="text"
                                            value="{{ $feature->name }}">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="inputState">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option @if ($feature->status == 'active') selected @endif value="active">Active
                                            </option>
                                            <option @if ($feature->status == 'inactive') selected @endif value="inactive">
                                                Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submmit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
