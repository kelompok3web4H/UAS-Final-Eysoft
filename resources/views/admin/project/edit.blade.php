@extends('layouts.adminmaster')
@section('title', 'Edit Projects')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Projects</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('project.index') }}">Projects</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Data</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('project.update', [$project->id]) }}" method="POST">
                    @CSRF
                    @method('put')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Project Name" value="{{$project->name}}">
                                    <small class="text-danger">@error('name') {{$message}} @enderror</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" class="form-control @error('descripiton') is-invalid @enderror" placeholder="Project Description" value="{{$project->description}}">
                                    <small class="text-danger">@error('description') {{$message}} @enderror</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="content">Cost</label>
                                    <input type="text" name="cost" class="form-control @error('cost') is-invalid @enderror" placeholder="Project Cost" value="{{$project->cost}}">
                                    <small class="text-danger">@error('cost') {{$message}} @enderror</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="from-group">
                                    <label for="category">Status</label>
                                    <input type="text" name="status" list="status" class="form-control custom-select @error('status') is-invalid @enderror" value="{{$project->status}}">
                                    <datalist id="status" name="status">
                                        <option value="Complete"></option>
                                        <option value="Future Task"></option>
                                        <option value="Possible Delayed"></option>
                                        <option value="Delayed"></option>
                                        <option value="On track"></option>
                                        <option value="Launching"></option>
                                    </datalist>
                                    <small class="text-danger">@error('status') {{$message}} @enderror</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="from-group">
                                    <label for="publish">Is Published</label>
                                    <input type="text" name="is_published"  list="published" class="form-control custom-select @error('is_published') is-invalid @enderror" value="{{$project->is_published}}">
                                    <datalist id="published" name="publish">
                                        <option value="1">Veriffied</option>
                                        <option value="0">Not Veriffied</option>
                                    </datalist>
                                    <small class="text-danger">@error('is_published') {{$message}} @enderror</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.index') }}" class="m-1 btn btn-outline-danger">Back</a>
                            <button type="submit" class="m-1 btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection