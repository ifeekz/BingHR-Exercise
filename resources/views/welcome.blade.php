<x-app-layout>
    <x-slot name="title">Home</x-slot>
    <x-slot name="pageTitle">Users</x-slot>
    <x-slot name="pageHeader">
        <div class="container-fluid d-sm-flex justify-content-between px-0">
            <h4>Users</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <button class="btn btn-danger">Add User</button>
                    </li>
                </ol>
            </nav>
        </div>
    </x-slot>

    <div class="row">

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-md-flex align-items-start justify-content-between">
                                <h6 class="card-title">List Users</h6>
                                <form>
                                    <div class="input-group border rounded">
                                        <input class="form-control search py-2 border-0" type="search" placeholder="Search..." id="search-input">
                                        <span class="input-group-append">
                                            <div class="input-group-text bg-transparent"><i class="fa fa-search"></i></div>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>Name</th>
                                                <th></th>
                                                <th>Create Date</th>
                                                <th>Role</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="media">
                                                        <img 
                                                            src="{{ asset('assets/images/user/man_avatar1.jpg') }}" 
                                                            class="rounded-circle align-self-center mr-3"
                                                            alt="profile"
                                                        >
                                                        <div class="media-body">
                                                          <div class="h6 my-0">David Wagner</div>
                                                          <div class="text-muted">david.wagner@domain.com</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge badge-success">Super Admin</span></td>
                                                <td>03/15/2018</td>
                                                <td>CEO and Founder</td>
                                                <td class="text-center">
                                                    <a href="#" data-toggle="tooltip" title="Edit user" class="mr-2">
                                                        <i data-feather="edit-3" width="15" height="15"></i>
                                                    </a>
                                                    <a href="#" data-toggle="tooltip" title="Delete user">
                                                        <i data-feather="trash-2" width="15" height="15"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
