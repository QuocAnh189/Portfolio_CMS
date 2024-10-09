@extends('user.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Skill</h1>
        </div>
        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('user.skills.index') }}">Back</a>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Skill</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.skills.update', $skill) }}" enctype="multipart/form-data"
                                method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <input class="form-control d-none" name="user_id" type="text"
                                        value="{{ Auth::id() }}">
                                    <div class="form-group col-12">
                                        <label>Description</label>
                                        <input class="form-control" name="description" type="text"
                                            value="{{ $skill->description }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Role Software</label>
                                        <select class="form-control" id="role_software_id" name="role_software_id">
                                            <option value="">
                                                None
                                            </option>
                                            @forelse ($role_softwares as $role_software)
                                                <option @if ($skill->role_software_id == $role_software->id) selected @endif
                                                    value="{{ $role_software->id }}">
                                                    {{ $role_software->name }}
                                                </option>
                                            @empty
                                                No data
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option @if ($skill->status == 'active') selected @endif value="active">Active
                                            </option>
                                            <option @if ($skill->status == 'inactive') selected @endif value="inactive">
                                                Inactive
                                            </option>
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
