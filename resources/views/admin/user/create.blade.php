@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">User</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('admin.users.store') }}" class="needs-validation"
                            enctype="multipart/form-data" method="post" novalidate="">
                            @csrf
                            <div class="card-header">
                                <h4>Create User</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <input class="form-control d-none" name="id" type="text">
                                    <input class="form-control d-none" name="user_id" type="text">
                                    <div class="form-group col-12">
                                        <div class="mb-3">
                                            <img alt="" src="{{ asset('images/image_default.jpg') }}"
                                                width="100px">
                                        </div>
                                        <label>Image</label>
                                        <input class="form-control" name="avatar" type="file">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Name</label>
                                        <input class="form-control" name="name" type="text">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input class="form-control" name="email" type="text">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Full name</label>
                                        <input class="form-control" name="fullname" type="text">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Phone Number</label>
                                        <input class="form-control" name="contact_number" type="text">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Bio</label>
                                        <textarea class="form-control" cols="6" name="bio" type="text">
                                        </textarea>
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
                                        <label>Facebook</label>
                                        <input class="form-control" name="facebook_link" type="text">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Gihub</label>
                                        <input class="form-control" name="github_link" type="text">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Youtube</label>
                                        <input class="form-control" name="youtube_link" type="text">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Instagram</label>
                                        <input class="form-control" name="instagram_link" type="text">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Resume</label>
                                        <input class="form-control" name="resume_link" type="text">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Password</label>
                                        <input class="form-control" name="password" type="password">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Confirm Password</label>
                                        <input class="form-control" name="password_confirmation" type="password">
                                    </div>
                                </div>
                            </div>


                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
