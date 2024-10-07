@extends('user.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Feature</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Feature</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.features.update', $feature) }}" enctype="multipart/form-data"
                                method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <input class="form-control d-none" name="project_id" type="text"
                                        value="{{ $feature->project_id }}">
                                    <div class="form-group col-12">
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
