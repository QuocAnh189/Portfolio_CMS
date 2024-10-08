@extends('user.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Education</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Education</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.education.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row">
                                    <input class="form-control d-none" name="user_id" type="text"
                                        value="{{ Auth::id() }}">
                                    <div class="form-group col-12">
                                        <div class="mb-3">
                                            <img alt="" src="{{ asset('images/image_default.jpg') }}"
                                                width="150px">
                                        </div>
                                        <label>Logo</label>
                                        <input class="form-control" name="logo" type="file">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>University</label>
                                        <input class="form-control" name="university_name" type="text">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Major</label>
                                        <select class="form-control" id="major_id" name="major_id">
                                            <option value="">
                                                None
                                            </option>
                                            @forelse ($majors as $major)
                                                <option value="{{ $major->id }}">
                                                    {{ $major->name }}
                                                </option>
                                            @empty
                                                No data
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Description</label>
                                        <input class="form-control" name="description" type="text">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Gpa</label>
                                        <input class="form-control" name="gpa" type="text">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Start Date</label>
                                        <input class="form-control" name="start_date" type="date">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>End Date</label>
                                        <input class="form-control" name="end_date" type="date">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Degree</label>
                                        <select class="form-control" id="degree" name="degree">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
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
