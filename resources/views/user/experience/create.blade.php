@extends('user.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Experiences</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Experiences</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.experiences.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row">
                                    <input class="form-control d-none" name="user_id" type="text"
                                        value="{{ Auth::id() }}">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Company</label>
                                        <input class="form-control" name="company_name" type="text">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Role Software</label>
                                        <select class="form-control" id="role_software_id" name="role_software_id">
                                            <option value="">
                                                None
                                            </option>
                                            @forelse ($role_softwares as $role_software)
                                                <option value="{{ $role_software->id }}">
                                                    {{ $role_software->name }}
                                                </option>
                                            @empty
                                                No data
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Job Title</label>
                                        <input class="form-control" name="job_title" type="text">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Job Description</label>
                                        <input class="form-control" name="job_description" type="text">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Level</label>
                                        <select class="form-control" id="level" name="level">
                                            <option value="intern">Intern</option>
                                            <option value="fresher">Fresher</option>
                                            <option value="junior">Junior</option>
                                            <option value="middle">Middle</option>
                                            <option value="senior">Senior</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Current</label>
                                        <select class="form-control" id="is_current" name="is_current">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
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
