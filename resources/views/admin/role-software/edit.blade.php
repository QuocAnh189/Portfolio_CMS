@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Update Role Software</h1>
        </div>
        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('admin.role-softwares.index') }}">Back</a>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Role Software</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.role-softwares.update', $roleSoftware) }}"
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group col-12">
                                    <div class="mb-3">
                                        <img alt="" src="{{ $roleSoftware->image }}" width="100px">
                                    </div>
                                    <label>Image</label>
                                    <input class="form-control" name="image" type="file"
                                        value="{{ $roleSoftware->image }}">
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name" type="text"
                                        value="{{ $roleSoftware->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option {{ $roleSoftware->status === 'active' ? 'selected' : '' }} value="active">
                                            Active
                                        </option>
                                        <option {{ $roleSoftware->status === 'inactive' ? 'selected' : '' }}
                                            value="inactive">
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
