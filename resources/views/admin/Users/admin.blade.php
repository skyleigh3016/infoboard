@extends('admin.layouts.app')
@section('title')
    Notices
@endsection
    <?php $menu = 'Admin & Users';
    $submenu = 'admin'; ?>

@section('content')
   
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <style type="text/css">
    h2 {
    color: black;
        }
        .table-wrapper {
                background: #fff;
                padding: 20px 25px;
                margin: 5px 0;
        border-radius:1px;
                box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
            }
        .table-title {        
        padding-bottom: 15px;
            background: #fff;
        color: #fff;
        padding: 16px 30px;
        margin: -20px -25px 10px;
        border-radius: 1px 1px 0 0;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
            }
            .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
        }
        .table-title .btn-group {
        float: right;
        }
        .table-title .btn {
        color: #fff;
        float: right;
        font-size: 13px;
        border: none;
        min-width: 50px;
        border-radius: 1px;
        border: none;
        outline: none !important;
        margin-left: 10px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.247);
        }
        .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
        }
        .table-title .btn span {
        float: left;
        margin-top: 2px;
        }
            table.table tr th, table.table tr td {
                border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
            }
        table.table tr th:first-child {
        width: 60px;
        }
        table.table tr th:last-child {
        width: 100px;
        }
            table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }
        table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
        }
            table.table th i {
                font-size: 13px;
                margin: 0 5px;
                cursor: pointer;
            } 
            table.table td:last-child i {
        opacity: 0.9;
        font-size: 22px;
                margin: 0 5px;
            }
        table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
        outline: none !important;
        }
        table.table td a:hover {
        color: #2196F3;
        }
        table.table td a.edit {
                color: #FFC107;
            }
            table.table td a.delete {
                color: #F44336;
            }
            table.table td i {
                font-size: 19px;
            }
        table.table .avatar {
        border-radius: 1px;
        vertical-align: middle;
        margin-right: 10px;
        }
        
            .hint-text {
                float: left;
                margin-top: 10px;
                font-size: 13px;
            }    
        /* Custom checkbox */
        .custom-checkbox {
        position: relative;
        }
        .custom-checkbox input[type="checkbox"] {    
        opacity: 0;
        position: absolute;
        margin: 5px 0 0 3px;
        z-index: 9;
        }
        .custom-checkbox label:before{
        width: 18px;
        height: 18px;
        }
        .custom-checkbox label:before {
        content: '';
        margin-right: 10px;
        display: inline-block;
        vertical-align: text-top;
        background: white;
        border: 1px solid #bbb;
        border-radius: 1px;
        box-sizing: border-box;
        z-index: 2;
        }
        .custom-checkbox input[type="checkbox"]:checked + label:after {
        content: '';
        position: absolute;
        left: 6px;
        top: 3px;
        width: 6px;
        height: 11px;
        border: solid #000;
        border-width: 0 3px 3px 0;
        transform: inherit;
        z-index: 3;
        transform: rotateZ(45deg);
        }
        .custom-checkbox input[type="checkbox"]:checked + label:before {
        border-color: #03A9F4;
        background: #03A9F4;
        }
        .custom-checkbox input[type="checkbox"]:checked + label:after {
        border-color: #fff;
        }
        .custom-checkbox input[type="checkbox"]:disabled + label:before {
        color: #b8b8b8;
        cursor: auto;
        box-shadow: none;
        background: #ddd;
        }
        /* Modal styles */

        .modal-body{
        height:350px;
        overflow:hidden;
        }

        .modal-body:hover{overflow-y:auto}
    .popupheader{
    background-color:white;
    color:black;
    }
    .fade{
    opacity:1;
    -webkit-transaction:opacity 1s linear;
    transaction:opacity 1s linear;
    }
    .modal .modal-dialog {
    max-width: 400px;
    }
    .modal .modal-header, .modal .modal-body, .modal .modal-footer {
    padding: 20px 30px;
    }
    .modal .modal-content {
    border-radius: 1px;
    }
    .modal .modal-footer {
    background: #ecf0f1;
    border-radius: 0 0 1px 1px;
    }
        .modal .modal-title {
            display: inline-block;
        }
    .modal .form-control {
    border-radius: 1px;
    box-shadow: none;
    border-color: #dddddd;
    }
    .modal textarea.form-control {
    resize: vertical;
    }
    .modal .btn {
    border-radius: 1px;
    min-width: 100px;
    } 
    .modal form label {
    font-weight: normal;
    } 
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();
            
            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function()
            {
            if(this.checked){
            checkbox.each(function()
            {
                this.checked = true;                        
            });
            }
            else
            {
            checkbox.each(function()
            {
                this.checked = false;                        
            });
            } 
            });
            checkbox.click(function()
            {
            if(!this.checked)
            {
            $("#selectAll").prop("checked", false);
            }
            });
        });
    </script>

    <div class="py-12">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2 style = >Manage <b>Admins</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('admin.trash')}}" class="btn btn-primary btn-sm">
                        <span class="bi bi-archive-fill"></span><span>Archive</span></a>
                        <a href="#addEmployeeModal" class="btn  btn-primary btn-sm" data-toggle="modal">
                        <i class="material-icons">&#xE147;</i> <span>Add New Admin</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover" id="example1">
                <thead>
                    <tr>
                        <th scope="col" width="5%" hidden >id</th>
                        <th scope="col" width="20%">Name</th>
                        <th scope="col" width="35%">Email</th>
                        <th scope="col" width="30%">Role</th>
                        <th scope="col" width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                        <tr>
                            <td class = "id" hidden >{{ $admin -> id }}</td>
                            <td class = "name">{{ $admin -> name }}</td>
                            <td class = "email">{{ $admin -> email }}</td>
                            <td class = "role">{{ $admin -> role }}</td>
                            
                            <td class="d-flex justify-content-center">
                                <a href="{{url('admin/edit/'.$admin->id)}}" class="btn btn-primary mr-1 px-1 py-0 ">
                                <i class="bi bi-pencil-square"  data-toggle="tooltip"></i></a>
                                <!-- Archive button -->
                                <form action="{{route('admin.archive',['id'=>$admin->id] ) }}">
                                    <button type="submit" class="btn btn-danger px-1 py-0" >
                                    <span class="material-icons">archive</span></button>
                                </form>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
            {{$admins->links()}}
        </div>
    </div>
    <!-- Add Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <form action="{{route('admin.insert')}}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <input type="text" hidden id = "id" name = "id" value = "">  
                    <div class="modal-header popupheader">      
                        <h4 class="modal-title">Add Admins</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">     
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name ="name" class="form-control" required>
                        </div>
                    
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name ="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name ="password" class="form-control" required>
                        </div>
                    
                        <div class="form-group">
                            <label>Role</label>
                            <input type="text" name ="role" class="form-control" required>
                        </div>  
                    </div>
                    
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
