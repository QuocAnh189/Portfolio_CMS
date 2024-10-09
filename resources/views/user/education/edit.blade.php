@extends('user.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Education</h1>
        </div>
        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('user.education.index') }}">Back</a>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Education</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.education.update', $education) }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <input class="form-control d-none" name="user_id" type="text"
                                        value="{{ $education->user_id }}">
                                    <div class="form-group col-12">
                                        <div class="mb-3">
                                            <img alt="" src="{{ $education->logo }}" width="150px">
                                        </div>
                                        <label>Logo</label>
                                        <input class="form-control" name="logo" type="file"
                                            value="{{ $education->logo }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>University</label>
                                        <input class="form-control" name="university_name" type="text"
                                            value="{{ $education->university_name }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Major</label>
                                        <select class="form-control" id="major_id" name="major_id">
                                            <option value="">
                                                None
                                            </option>
                                            @forelse ($majors as $major)
                                                <option @if ($major->id == $education->major_id) selected @endif
                                                    value="{{ $major->id }}">
                                                    {{ $major->name }}
                                                </option>
                                            @empty
                                                No data
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Description</label>
                                        <input class="form-control" name="description" type="text"
                                            value="{{ $education->description }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Gpa</label>
                                        <input class="form-control" name="gpa" type="text"
                                            value="{{ $education->gpa }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Start Date</label>
                                        <input class="form-control" name="start_date" type="date"
                                            value="{{ $education->start_date }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>End Date</label>
                                        <input class="form-control" name="end_date" type="date"
                                            value="{{ $education->end_date }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Degree</label>
                                        <select class="form-control" id="degree" name="degree">
                                            <option @if ($education->degree === 0) selected @endif value="0">No
                                            </option>
                                            <option @if ($education->degree === 1) selected @endif value="1">Yes
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option @if ($education->status === 'active') selected @endif value="active">Active
                                            </option>
                                            <option @if ($education->status === 'inactive') selected @endif value="inactive">
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
