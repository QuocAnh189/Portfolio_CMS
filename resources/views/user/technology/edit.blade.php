@extends('user.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Update My Technology</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Technology</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.userTechnologies.update', $userTechnology) }}"
                                enctype="multipart/form-data" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <input class="form-control d-none" name="user_id" type="text"
                                        value="{{ Auth::id() }}">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="">Technologies</label>
                                        <select class="form-control" id="technology_id" name="technology_id">
                                            @forelse ($technologies as $technology)
                                                <option @if ($userTechnology->technology_id == $technology->id) selected @endif
                                                    value="{{ $technology->id }}">
                                                    {{ $technology->name }}
                                                </option>
                                            @empty
                                                No data
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="inputState">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option @if ($userTechnology->status == 'active') selected @endif value="active">Active
                                            </option>
                                            <option @if ($userTechnology->status == 'inactive') selected @endif value="inactive">
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
