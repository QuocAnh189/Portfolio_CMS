@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Manage Galleries</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Upload Gallery</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.galleries.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="">Image</label>
                                        <input class="form-control" multiple name="image" type="file">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="inputState">Project</label>
                                        <select class="form-control" id="project_id" name="project_id">
                                            <option value="">None</option>
                                            @forelse ($projects as $project)
                                                <option value="{{ $project->id }}">
                                                    {{ $project->name }}
                                                </option>
                                            @empty
                                                No Project
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="inputState">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-primary" type="submit">Upload</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Images</h4>
                            <a class="btn btn-primary" href="{{ route('admin.galleries.trash-index') }}">
                                <i class="fas fa-trash-alt"></i>
                                View Trash
                            </a>
                        </div>
                        <div class="card-body">
                            {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('admin.galleries.change-status') }}",
                    method: 'PUT',
                    data: {
                        status: isChecked,
                        id: id
                    },
                    success: function(data) {
                        toastr.success(data.message)
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush
