@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Update Major</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Major</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.majors.update', $major) }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group col-12">
                                    <div class="mb-3">
                                        <img alt="" src="{{ $major->image }}" width="100px">
                                    </div>
                                    <label>Image</label>
                                    <input class="form-control" name="image" type="file" value="{{ $major->image }}">
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name" type="text" value="{{ $major->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input class="form-control" name="description" type="text"
                                        value="{{ $major->description }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option {{ $major->status === 'active' ? 'selected' : '' }} value="active">Active
                                        </option>
                                        <option {{ $major->status === 'inactive' ? 'selected' : '' }} value="inactive">
                                            Inactive
                                        </option>
                                    </select>
                                </div>
                                <button class="btn btn-primary" type="submmit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
