@extends('admin.layouts.app')
@section('title')
    {{ $teacher->name }}
@endsection
<?php $menu = 'Teachers';
$submenu = $teacher->department; ?>

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @if ($teacher->photo)
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('images/teachers') . '/' . $teacher->photo }}" alt="profile picture">
                            @else
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('images/asset_img/user-icon.png') }}" alt="profile picture">
                            @endif
                        </div>

                        <h3 class="profile-username text-center">{{ $teacher->name }}</h3>
                        <p class="text-muted text-center"> {{ $teacher->position }}
                        </p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Index</b> <a class="float-right">{{ $teacher->index }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Department</b> <a class="float-right">{{ $teacher->department }}</a>
                            </li>
                            </li>
                            <li class="list-group-item">
                                <b>Subject</b> <a class="float-right">{{ $teacher->subject }}</a>
                            </li>
                        </ul>

                       
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header attachment-block p-3">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#information" data-toggle="tab"><i
                                        class="bi bi-info-square"></i> Details</a></li>
                            <li class="nav-item"><a class="nav-link" href="#edit" data-toggle="tab"><i
                                        class="bi bi-pencil-square"></i> Edit</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body pt-1">
                        <div class="tab-content">
                            <div class="active tab-pane" id="information">
                                <!-- Post -->
                                <ul class="list-group list-group-unbordered mb-3">
                                   
                                    <li class="list-group-item">
                                        <b>Gender</b> <a class="float-right">{{ $teacher->gender }}</a>
                                    </li>
                                    
                                  
                                    <li class="list-group-item">
                                        <b>Phone</b> <a class="float-right">{{ $teacher->phone }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{ $teacher->email }}</a>
                                    </li>
                                  
                                </ul>

                               
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="edit">

                                <div class="d-flex justify-content-end">
                                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-outline-danger btn-sm py-1 mb-2 delete"><i
                                                class="bi bi-trash"></i> Delete</button>
                                    </form>
                                </div>

                                <form action="{{ route('teachers.update', $teacher->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_method" value="put">

                                    <div class="form-group">
                                        <label for=" name">Name</label>
                                        <input class="form-control" type="text" name=" name"
                                            value="{{ $teacher->name }}">
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" index">Teacher index</label>
                                            <input class="form-control" type="text" name="index"
                                                value="{{ $teacher->index }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="position">Position</label>
                                            <input class="form-control" type="text" name="position"
                                                value="{{ $teacher->position }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="department">Department</label>
                                            <select name="department" class="form-control" required>
                                                <option value="Science" @if ($teacher->department == 'Faculty') selected @endif>
                                                Faculty</option>
                                                <option value="Humanities"
                                                    @if ($teacher->department == 'OSAS') selected @endif>OSAS</option>
                                                <option value="Business Studies"
                                                    @if ($teacher->department == 'Registrar') selected @endif>Registrar
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="subject">Coures</label>
                                            <input class="form-control" type="text" name="subject"
                                                value="{{ $teacher->subject }}">
                                        </div>
                                    </div>

                                   
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" photo">Photo <small>(.jpg/.jpeg/.png)</small></label>
                                            <input class="form-control p-1" type="file" name="photo">
                                            <input type="hidden" name="old_photo" value="{{ $teacher->photo }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for=" gender">Gender</label>
                                            <select name="gender" class="form-control" required>
                                                <option value="Male" @if ($teacher->gender == 'Male') selected @endif>
                                                    Male</option>
                                                <option value="Female" @if ($teacher->gender == 'Female') selected @endif>
                                                    Female</option>
                                                <option value="Other" @if ($teacher->gender == 'Other') selected @endif>
                                                    Other</option>
                                            </select>
                                        </div>

                                       
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=" phone">Phone</label>
                                            <input class="form-control" type="text" name=" phone"
                                                value="{{ $teacher->phone }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for=" email">Email</label>
                                            <input class="form-control" type="email" name=" email"
                                                value="{{ $teacher->email }}">
                                        </div>
                                    </div>

                                  

                                    <div class="text-right form-group">
                                        <button type="submit" class="btn  btn-primary">Update info</button>
                                    </div>
                                </form>

                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
