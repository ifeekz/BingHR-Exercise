<x-app-layout>
    <x-slot name="title">Home</x-slot>
    <x-slot name="pageTitle">Users</x-slot>
    <x-slot name="pageHeader">
        <div class="container-fluid d-sm-flex justify-content-between px-0">
            <h4>Users</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <button data-target="#addUserModal" data-toggle="modal" class="btn btn-danger">Add User</button>
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
                                                    <a href="#addUserModal" data-toggle="modal" title="Edit user" class="mr-2">
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

    <x-slot name="modal">
        <div id="addUserModal" data-backdrop="static" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <h6 class="modal-title">Add User</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="ti-close"></i>
                        </button>
                    </div>
                    <hr class="m-0" />
                    <div class="modal-body">
                        <form>
                            <div class="form-row pb-2">
                                <div class="col col-sm-12 col-md-12 col-lg-12">
                                    <input type="text" class="form-control" placeholder="Employee ID *" required />
                                </div>
                            </div>
                            <div class="form-row py-2">
                                <div class="col col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" placeholder="First Name *" required />
                                </div>
                                <div class="col col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" placeholder="Last Name *" required />
                                </div>
                            </div>
                            <div class="form-row py-2">
                                <div class="col col-sm-4 col-md-4 col-lg-4">
                                    <input type="text" class="form-control" placeholder="Email ID *" required />
                                </div>
                                <div class="col col-sm-4 col-md-4 col-lg-4">
                                    <input type="text" class="form-control" placeholder="Mobile No">
                                </div>
                                <div class="col col-sm-4 col-md-4 col-lg-4">
                                    <select class="form-control custom-select" required>
                                        <option value="">Select Role Type *</option>
                                        <option value="super-admin">Super Admin</option>
                                        <option value="admin">Administrator</option>
                                        <option value="hr-admin">HR Admin</option>
                                        <option value="employee">Employee</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row py-2">
                                <div class="col col-sm-4 col-md-4 col-lg-4">
                                    <input type="text" class="form-control" placeholder="Username *" required />
                                </div>
                                <div class="col col-sm-4 col-md-4 col-lg-4">
                                    <input type="text" class="form-control" placeholder="Password *" required />
                                </div>
                                <div class="col col-sm-4 col-md-4 col-lg-4">
                                    <input type="text" class="form-control" placeholder="Confirm Password *" required />
                                </div>
                            </div>
                            <div class="form-row pt-2">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>Module Permission</th>
                                            <th class="text-center">Read</th>
                                            <th class="text-center">Write</th>
                                            <th class="text-center">Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Super Admin</td>
                                            <td class="text-center"><input type="checkbox" checked /></td>
                                            <td class="text-center"><input type="checkbox" checked /></td>
                                            <td class="text-center"><input type="checkbox" checked /></td>
                                        </tr>
                                        <tr>
                                            <td>Admin</td>
                                            <td class="text-center"><input type="checkbox" checked /></td>
                                            <td class="text-center"><input type="checkbox" /></td>
                                            <td class="text-center"><input type="checkbox" checked /></td>
                                        </tr>
                                        <tr>
                                            <td>Employee</td>
                                            <td class="text-center"><input type="checkbox" checked /></td>
                                            <td class="text-center"><input type="checkbox" /></td>
                                            <td class="text-center"><input type="checkbox" checked /></td>
                                        </tr>
                                        <tr>
                                            <td>HR Admin</td>
                                            <td class="text-center"><input type="checkbox" checked /></td>
                                            <td class="text-center"><input type="checkbox" /></td>
                                            <td class="text-center"><input type="checkbox" checked /></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Add User</button>
                        <button type="button" class="btn btn-link text-dark" data-dismiss="modal">Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

</x-app-layout>
