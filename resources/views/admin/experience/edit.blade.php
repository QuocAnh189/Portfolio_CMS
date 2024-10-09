<?php
use App\Domains\Experience\Models\Experience;
$levels = Experience::$levels;
?>

@extends('admin.layouts.master')

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
                            <h4>Update Experiences</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.experiences.update', $experience) }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">User</label>
                                        <select class="form-control" id="user_id" name="user_id">
                                            <option value="">
                                                None
                                            </option>
                                            @forelse ($users as $user)
                                                <option @if ($user->id == $experience->user_id) selected @endif
                                                    value="{{ $user->id }}">
                                                    {{ $user->name }}
                                                </option>
                                            @empty
                                                No data
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Company</label>
                                        <input class="form-control" name="company_name" type="text"
                                            value="{{ $experience->company_name }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Role Software</label>
                                        <select class="form-control" id="role_software_id" name="role_software_id">
                                            @forelse ($role_softwares as $role_software)
                                                <option @if ($role_software->id == $experience->role_software_id) selected @endif
                                                    value="{{ $role_software->id }}">
                                                    {{ $role_software->name }}
                                                </option>
                                            @empty
                                                No data
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Job Title</label>
                                        <input class="form-control" name="job_title" type="text"
                                            value="{{ $experience->job_title }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Job Description</label>
                                        <input class="form-control" name="job_description" type="text"
                                            value="{{ $experience->job_description }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Level</label>
                                        <select class="form-control" id="level" name="level">
                                            @foreach ($levels as $level)
                                                <option @if ($experience->level === $level) selected @endif
                                                    value="{{ $level }}">
                                                    {{ $level }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Current</label>
                                        <select class="form-control" id="is_current" name="is_current">
                                            <option @if ($experience->is_current === 0) selected @endif value="0">No
                                            </option>
                                            <option @if ($experience->is_current === 1) selected @endif value="1">Yes
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Start Date</label>
                                        <input class="form-control" name="start_date" type="date"
                                            value="{{ $experience->start_date }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>End Date</label>
                                        <input class="form-control" name="end_date" type="date"
                                            value="{{ $experience->end_date }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option @if ($experience->status === 'active') selected @endif value="active">Active
                                            </option>
                                            <option @if ($experience->status === 'inactive') selected @endif value="inactive">
                                                Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submmit">Upate</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
