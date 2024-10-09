@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Technology</h1>
        </div>
        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('admin.technologies.index') }}">Back</a>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Technology</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.technologies.update', $technology) }}"
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group col-12">
                                    <div class="mb-3">
                                        <img alt="" src="{{ $technology->image }}" width="100px">
                                    </div>
                                    <label>Image</label>
                                    <input class="form-control" name="image" type="file"
                                        value="{{ $technology->image }}">
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name" type="text"
                                        value="{{ $technology->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option {{ $technology->status === 'active' ? 'selected' : '' }} value="active">
                                            Active
                                        </option>
                                        <option {{ $technology->status === 'inactive' ? 'selected' : '' }} value="inactive">
                                            Inactive
                                        </option>
                                    </select>
                                </div>
                                <div class="text-right">
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
