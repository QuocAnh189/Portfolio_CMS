@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('admin.profile.update', $profile) }}" class="needs-validation"
                            enctype="multipart/form-data" method="post" novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Update Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <input class="form-control d-none" name="id" type="text"
                                        value="{{ $profile->id }}">
                                    <input class="form-control d-none" name="user_id" type="text"
                                        value="{{ $profile->user_id }}">

                                    <div class="form-group col-12">
                                        <div class="mb-3">
                                            <img alt=""
                                                src="{{ $profile->avatar ?? asset('images/image_default.jpg') }}"
                                                width="100px">
                                        </div>
                                        <label>Image</label>
                                        <input class="form-control" name="avatar" type="file"
                                            value="{{ $profile->avatar }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Name</label>
                                        <input class="form-control" name="name" type="text"
                                            value="{{ $profile->user->name }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input class="form-control" name="email" type="text"
                                            value="{{ $profile->user->email }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Full name</label>
                                        <input class="form-control" name="fullname" type="text"
                                            value="{{ $profile->fullname }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Phone Number</label>
                                        <input class="form-control" name="contact_number" type="text"
                                            value="{{ $profile->contact_number }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Bio</label>
                                        <input class="form-control" name="bio" type="text"
                                            value="{{ $profile->bio }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Role Software</label>
                                        <select class="form-control" id="role_software_id" name="role_software_id">
                                            <option value="">
                                                None
                                            </option>
                                            @forelse ($role_softwares as $role_software)
                                                <option @if ($profile->role_software_id == $role_software->id) selected @endif
                                                    value="{{ $role_software->id }}">
                                                    {{ $role_software->name }}
                                                </option>
                                            @empty
                                                No data
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Facebook</label>
                                        <input class="form-control" name="facebook_link" type="text"
                                            value="{{ $profile->facebook_link }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Gihub</label>
                                        <input class="form-control" name="github_link" type="text"
                                            value="{{ $profile->github_link }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Youtube</label>
                                        <input class="form-control" name="youtube_link" type="text"
                                            value="{{ $profile->youtube_link }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Instagram</label>
                                        <input class="form-control" name="instagram_link" type="text"
                                            value="{{ $profile->instagram_link }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Resume</label>
                                        <input class="form-control" name="resume_link" type="text"
                                            value="{{ $profile->resume_link }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('admin.profile.change-password', $profile->user) }}"
                            class="needs-validation" enctype="multipart/form-data" method="post" novalidate="">
                            @method('PUT')
                            @csrf
                            <div class="card-header">
                                <h4>Update Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <input class="form-control d-none" name="user_id" type="text"
                                        value="{{ $profile->user_id }}">
                                    <div class="form-group col-12">
                                        <label>New Password</label>
                                        <input class="form-control" name="new_password" type="password">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Confirm Password</label>
                                        <input class="form-control" name="new_password_confirmation" type="password">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
