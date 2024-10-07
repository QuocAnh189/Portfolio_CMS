@extends('user.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Project</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Project</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.projects.update', $project) }}" enctype="multipart/form-data"
                                method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <input class="form-control d-none" name="user_id" type="text"
                                        value="{{ Auth::user()->id }}">
                                    <div class="form-group col-12">
                                        <div class="mb-3">
                                            <img alt="" src="{{ $project->cover_image }}" width="200px">
                                        </div>
                                        <label>Cover Image</label>
                                        <input class="form-control" name="cover_image" type="file"
                                            value="{{ $project->cover_image }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Name</label>
                                        <input class="form-control" name="name" type="text"
                                            value="{{ $project->name }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Status</label>
                                        <select class="form-control" id="category_id" name="category_id">
                                            <option value="">None</option>
                                            @forelse ($categories as $category)
                                                <option @if ($project->category_id == $category->id) selected @endif
                                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                            @empty
                                                No data
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Description</label>
                                        <input class="form-control" name="description" type="text"
                                            value="{{ $project->description }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Start Date</label>
                                        <input class="form-control" name="start_date" type="date"
                                            value="{{ $project->start_date }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>End Date</label>
                                        <input class="form-control" name="end_date" type="date"
                                            value="{{ $project->end_date }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option @if ($project->status == 'active') selected @endif value="active">
                                                Active
                                            </option>
                                            <option @if ($project->status == 'inactive') selected @endif value="inactive">
                                                Inactive
                                            </option>
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
