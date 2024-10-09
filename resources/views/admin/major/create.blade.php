@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Major</h1>
        </div>
        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('admin.majors.index') }}">Back</a>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Major</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.majors.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="form-group col-12">
                                    <div class="mb-3">
                                        <img alt="" src="{{ asset('images/image_default.jpg') }}" width="150px">
                                    </div>
                                    <label>Image</label>
                                    <input class="form-control" name="image" type="file">
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name" type="text" value="">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input class="form-control" name="description" type="text" value="">
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <div class="text-right">
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
