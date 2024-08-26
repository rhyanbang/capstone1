@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4 style="float: left"> Add User</h4>
                            <a href="#" style="float: right" class="btn btn-dark" data-toggle="modal"
                                data-target="#addUser">
                                <i class="fa fa-plus"></i> Add New Users</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-left">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <h4>Search Users</h4>
                            </div>
                            <div class="card-body">
                                ...........
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal of adding new user --}}
    <div class="modal right fade" id="addUser" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Add Users</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="is_admin">Role</label>
                            <select name="is_admin" id="is_admin" class="form-control">
                                <option value="1">Admin</option>
                                <option value="2">Casher</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary block">Save User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <style>
        .modal.right .modal-dialog {
            position: fixed;
            top: 0;
            right: 0;
            margin: 0;
            height: 100%;
            width: 50%;
            transition: transform 0.3s ease-out;
        }

        .modal.right .modal-content {
            height: 100%;
            border: 0;
            border-radius: 0;
        }

        .modal.fade.right .modal-dialog {
            transform: translateX(100%);
        }

        .modal.fade.show.right .modal-dialog {
            transform: translateX(0);
        }
    </style>
@endsection
