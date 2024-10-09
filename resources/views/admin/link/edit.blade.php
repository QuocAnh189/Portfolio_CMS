@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Links</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Link</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.links.update', $link) }}" enctype="multipart/form-data"
                                method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12 col-md-6">
                                        <label>Project</label>
                                        <select class="form-control" id="project_id" name="project_id">
                                            <option value="">
                                                None
                                            </option>
                                            @forelse ($projects as $project)
                                                <option @if ($link->project_id == $project->id) selected @endif
                                                    value="{{ $project->id }}">
                                                    {{ $project->name }}
                                                </option>
                                            @empty
                                                No data
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label>Title</label>
                                        <input class="form-control" name="title" type="text"
                                            value="{{ $link->title }}">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label>Url</label>
                                        <input class="form-control" name="url" type="text"
                                            value="{{ $link->url }}">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="inputState">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option @if ($link->status == 'active') selected @endif value="active">Active
                                            </option>
                                            <option @if ($link->status == 'inactive') selected @endif value="inactive">
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
