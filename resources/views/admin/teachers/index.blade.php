@extends('admin.layouts.app')
@section('title')
    Staffs
@endsection
<?php $menu = 'Staffs';
$submenu = 'All_Staffs'; ?>

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <b>Staffs</b>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn  btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                        <i class="fas fa-plus"></i> Add Staffs
                    </button>
                    <button type="button" class="btn  btn-info btn-sm" data-toggle="modal" data-target="#staticBackdrop1">
                        <i class="fas fa-plus"></i> Upload Staffs
                    </button>
                </div>
            </div>
            <div class="card-body table-responsive">
                <div class="mb-2">
                    <form class="form-inline" action="" method="GET">
                            <label>Department &nbsp;</label>
                            <select class="form-control" id="department" name="department">
                                <option disabled selected>Select Department</option>
                                <option value="Faculty">Academe</option>
                                <option value="Registrar">Registrar</option>
                                <option value="Learning And Development">Learning And Development</option>
                                <option value="Finance">Finance</option>
                                <option value="LRDE">LRDE</option>
                                <option value="Technical and Vocational">Technical and Vocational</option>
                                <option value="Research and Publication">Research and Publication</option>
                                <option value="CARD Scholarship Program">CARD Scholarship Program</option>
                                <option value="Compliance">Compliance</option>
                                <option value="Human Resources">Human Resources</option>
                                <option value="OSAS">OSAS</option>
                                <option value="Executive Office">Executive Office</option>
                            </select>
                            <span>&nbsp;&nbsp;</span>
                            <button type="submit" class="btn btn-primary">Search</button>  
                            
                        </form>
                </div>
                <table class="table table-bordered table-striped" id="example1">
                    <thead>
                        <tr>
                            <th>Index</th>
                            <th>Photo</th>
                            <th>Name & Position</th>
                            <th>Department</th>
                            <th>Course</th>
                            <th>Phone</th>
                            <th>More</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($teachers) > 0)
                        @foreach ($teachers as $item)
                            <tr>
                                <td>{{ $item->index }}</td>
                                <td>
                                    @if ($item->photo != null)
                                        <img class="img-fluid" src="{{ asset('images/teachers' . '/' . $item->photo) }}"
                                            alt="Photo" style="width: 80px">
                                    @else
                                        <img class="img-fluid" src="{{ asset('images/asset_img/user-icon.png') }}"
                                            alt="Photo" style="width: 80px">
                                    @endif
                                </td>
                                <td>
                                    {{ $item->name }} <br>
                                    <small class="text-muted">{{ $item->position }}</small>
                                </td>
                                <td>{{ $item->department }}</td>
                                <td>{{ $item->subject }}</td>
                                <td>{{ $item->phone }}</td>

                                <td class="d-flex justify-content-center">

                                    <a href="{{ route('teachers.show', $item->id) }}"
                                        class="btn btn-info mr-1 px-1 py-0"><i class="bi bi-person"></i></a>

                                    <!-- <a href="tel:{{ $item->phone }}" class="btn btn-success mr-1 px-1 py-0"><i
                                            class="bi bi-telephone"></i></a> -->

                                    <a href="mailto:{{ $item->email }}" class="btn btn-danger mr-1 px-1 py-0" target="blank"><i class="bi bi-envelope"></i></a>

                                </td>
                            </tr>
                        @endforeach
                        @else
                <tr>
                    <td colspan="7" class="text-center">No Data Found</td>
                </tr>  
            @endif
                    </tbody>
                </table>
            </div>

            <!-- Modal for add teacher -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-default text-dark rounded">
                            <h5 class="modal-title" id="staticBackdropLabel">Create New Staff</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="{{ route('teachers.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for=" name">Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                        name=" name" value="{{ old(' name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=" index">ID Number</label>
                                        <input class="form-control @error('index') is-invalid @enderror" type="text"
                                            name="index" value="{{ old('index') }}">
                                        @error('index')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="position">Position</label>
                                        <input class="form-control @error('position') is-invalid @enderror" type="text"
                                            name="position" value="{{ old('position') }}">
                                        @error('position')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="department">Department</label>
                                        <select name="department" class="form-control" required>
                                            <option disabled selected>Choose department</option>
                                            <option value="Faculty">Faculty</option>
                                            <option value="OSAS">OSAS</option>
                                            <option value="Registrar">Registrar</option>
                                            <option value="Learning And Development">Learning And Development</option>
                                            <option value="Finance">Finance</option>
                                            <option value="LRDE">LRDE</option>
                                            <option value="Technical and Vocational">Technical and Vocational</option>
                                            <option value="Research and Publication">Research and Publication</option>
                                            <option value="CARD Scholarship Program">CARD Scholarship Program</option>
                                            <option value="Compliance">Compliance</option>
                                            <option value="Human Resources">Human Resources</option>
                                            <option value="Executive Office">Executive Office</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="subject">Course</label>
                                        <input class="form-control @error('subject') is-invalid @enderror" type="text"
                                            name="subject" value="{{ old('subject') }}">
                                        @error('subject')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=" fathers_name">Father's name</label>
                                        <input class="form-control @error('fathers_name') is-invalid @enderror"
                                            type="text" name=" fathers_name" value="{{ old(' fathers_name') }}">
                                        @error('fathers_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for=" mothers_name">Mother's name</label>
                                        <input class="form-control @error('mothers_name') is-invalid @enderror"
                                            type="text" name=" mothers_name" value="{{ old(' mothers_name') }}">
                                        @error('mothers_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> -->

                                <!-- <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=" gender">Gender</label>
                                        <select name="gender" class="form-control" required>
                                            <option disabled selected>Choose gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for=" dob">Date of birth</label>
                                        <input class="form-control @error('dob') is-invalid @enderror" type="date"
                                            name=" dob" value="{{ old(' dob') }}">
                                        @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> -->

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=" photo">Photo <small>(.jpg/.jpeg/.png)</small></label>
                                        <input class="form-control p-1" type="file" name="photo">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for=" gender">Gender</label>
                                        <select name="gender" class="form-control" required>
                                            <option disabled selected>Choose gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>

                                    <!-- <div class="form-group col-md-6">
                                        <label for="nid">NID</label>
                                        <input class="form-control @error('nid') is-invalid @enderror" type="text"
                                            name="nid" value="{{ old('nid') }}">
                                        @error('nid')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> -->
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=" phone">Phone</label>
                                        <input class="form-control @error('phone') is-invalid @enderror" type="text"
                                            name=" phone" value="{{ old(' phone') }}">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for=" email">Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="email"
                                            name=" email" value="{{ old(' email') }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=" present_address">Present address</label>
                                        <input class="form-control @error('present_address') is-invalid @enderror"
                                            type="text" name=" present_address"
                                            value="{{ old(' present_address') }}">
                                        @error('present_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for=" permanent_address">Permanent address</label>
                                        <input class="form-control @error('permanent_address') is-invalid @enderror"
                                            type="text" name=" permanent_address"
                                            value="{{ old(' permanent_address') }}">
                                        @error('permanent_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> -->

                                <!-- <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="edu_qualification">Educational qualification</label>
                                        <input class="form-control @error('edu_qualification') is-invalid @enderror"
                                            type="text" name="edu_qualification"
                                            value="{{ old('edu_qualification') }}">
                                        @error('edu_qualification')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="salary">Salary</label>
                                        <input class="form-control @error('salary') is-invalid @enderror" type="text"
                                            name="salary" value="{{ old('salary') }}">
                                        @error('salary')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> -->

                                <!-- <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="edu_certificate">Highest academic certificate
                                            <small>(.jpg/.jpeg/.png)</small></label>
                                        <input class="form-control p-1" type="file" name="edu_certificate">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="cv">CV <small>(.pdf)</small></label>
                                        <input class="form-control p-1" type="file" name="cv">
                                    </div>
                                </div> -->

                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn">Reset</button>
                                <button type="submit" class="btn  btn-primary">Add teacher</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div> <!-- Modal for upload student -->
            <div class="modal fade" id="staticBackdrop1" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-default text-dark rounded">
                            <h5 class="modal-title" id="staticBackdropLabel">Create New student</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="{{ route('teachers.import') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">

                               

                               

                                

                                

                            
                               
                              
                                    <div class="form-group col-md-6">
                                        <label for=" photo">Photo <small>(.cvs/)</small></label>
                                        <input class="form-control p-1" type="file" name=" file">
                                    </div>
                               

                               

                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn">Reset</button>
                                <button type="submit" class="btn  btn-primary">Upload Staffs</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
