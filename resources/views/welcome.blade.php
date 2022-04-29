<x-app-layout>
    <x-slot name="title">Home</x-slot>
    <x-slot name="pageTitle">Users</x-slot>
    <x-slot name="pageHeader">
        <div class="container-fluid d-sm-flex justify-content-between px-0">
            <h4></h4>
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
                                <form v-if="users.length">
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
                                    <div v-if="!loading && users.length > 0" class="table-responsive">
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
                                            <tr :id="'user_'+user.id" v-cloak v-for="(user, key) in users" :key="key">
                                                <td>
                                                    <div class="media">
                                                        <img 
                                                            :src="user.avatar_url" 
                                                            class="rounded-circle align-self-center mr-3"
                                                            alt="profile"
                                                        >
                                                        <div class="media-body">
                                                          <div class="h6 my-0">[ user.last_name ] [ user.first_name ]</div>
                                                          <div class="text-muted">[ user.email ]</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge badge-success">Super Admin</span></td>
                                                <td>[ user.created_at ]</td>
                                                <td>[ user.role_type ]</td>
                                                <td class="text-center">
                                                    <a href="#!" @click.prevent="editUser(user)" data-toggle="tooltip" title="Edit user" class="mr-2">
                                                        <i data-feather="edit-3" width="15" height="15"></i>
                                                    </a>
                                                    <a href="!" @click.prevent="deleteUser(user)" data-toggle="tooltip" title="Delete user">
                                                        <i data-feather="trash-2" width="15" height="15"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div v-else-if="!loading" class="text-center">
                                        <img 
                                            src="{{ asset('assets/images/undraw_Real_time_sync_re_nky7.png') }}" 
                                            alt="no data" 
                                            class="img-responsive"
                                            width="30%"
                                        />
                                        <div class="text-muted">No user record exists. Add one using the button above</div>
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
        <div id="addUserModal" data-backdrop="static" class="modal fade" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <h6 class="modal-title">Add User</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="ti-close"></i>
                        </button>
                    </div>
                    <hr class="m-0" />
                    <form action="" 
                        method="post" @submit.prevent="addUser"
                    >
                        <div class="modal-body">
                            <div class="form-row pb-2">
                                <div class="col col-sm-12 col-md-12 col-lg-12">
                                    <input type="text" v-model="newUser.employee_id" class="form-control" placeholder="Employee ID *" required />
                                    <div v-if="createUserErrors.employee_id">
                                        <div v-for="error in createUserErrors.employee_id" class="d-block invalid-feedback">
                                            <div>[ error ]</div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="form-row py-2">
                                <div class="col col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" v-model="newUser.first_name" class="form-control" placeholder="First Name *" required />
                                    <div v-if="createUserErrors.first_name">
                                        <div v-for="error in createUserErrors.first_name" class="d-block invalid-feedback">
                                            <div>[ error ]</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" v-model="newUser.last_name" class="form-control" placeholder="Last Name *" required />
                                    <div v-if="createUserErrors.last_name">
                                        <div v-for="error in createUserErrors.last_name" class="d-block invalid-feedback">
                                            <div>[ error ]</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row py-2">
                                <div class="col col-sm-4 col-md-4 col-lg-4">
                                    <input type="email" v-model="newUser.email" class="form-control" placeholder="Email ID *" required />
                                    <div v-if="createUserErrors.email">
                                        <div v-for="error in createUserErrors.email" class="d-block invalid-feedback">
                                            <div>[ error ]</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-sm-4 col-md-4 col-lg-4">
                                    <input type="text" v-model="newUser.mobile_no" class="form-control" placeholder="Mobile No">
                                    <div v-if="createUserErrors.mobile_no">
                                        <div v-for="error in createUserErrors.mobile_no" class="d-block invalid-feedback">
                                            <div>[ error ]</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-sm-4 col-md-4 col-lg-4">
                                    <select v-model="newUser.role_type" class="form-control custom-select" required>
                                        <option value="">Select Role Type *</option>
                                        <option value="CEO & Founder">CEO & Founder</option>
                                        <option value="Team Lead">Team Lead</option>
                                        <option value="HR">HR</option>
                                        <option value="App Designer">App Designer</option>
                                        <option value="Web Developer">Web Developer</option>
                                    </select>
                                    <div v-if="createUserErrors.rolle_type">
                                        <div v-for="error in createUserErrors.role_type" class="d-block invalid-feedback">
                                            <div>[ error ]</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row py-2">
                                <div class="col col-sm-4 col-md-4 col-lg-4">
                                    <input type="text" v-model="newUser.username" class="form-control" placeholder="Username *" required />
                                    <div v-if="createUserErrors.username">
                                        <div v-for="error in createUserErrors.username" class="d-block invalid-feedback">
                                            <div>[ error ]</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-sm-4 col-md-4 col-lg-4">
                                    <input type="password" v-model="newUser.password" class="form-control" placeholder="Password *" required />
                                    <div v-if="createUserErrors.password">
                                        <div v-for="error in createUserErrors.password" class="d-block invalid-feedback">
                                            <div>[ error ]</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-sm-4 col-md-4 col-lg-4">
                                    <input type="password" v-model="newUser.password_confirmation" class="form-control" placeholder="Confirm Password *" required />
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
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add User</button>
                            <button type="button" class="btn btn-link text-dark" data-dismiss="modal">Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="editUserModal" data-backdrop="static" class="modal fade" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-transparent">
                        <h6 class="modal-title">Edit User</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="ti-close"></i>
                        </button>
                    </div>
                    <hr class="m-0" />
                    <form action="" 
                        method="post" @submit.prevent="updateUser(fillUser)"
                    >
                        <div class="modal-body">
                            <div class="form-row pb-2">
                                <div class="col col-sm-12 col-md-12 col-lg-12">
                                    <input type="text" v-model="fillUser.employee_id" class="form-control" placeholder="Employee ID *" required />
                                    <div v-if="createUserErrors.employee_id">
                                        <div v-for="error in createUserErrors.employee_id" class="d-block invalid-feedback">
                                            <div>[ error ]</div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="form-row py-2">
                                <div class="col col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" v-model="fillUser.first_name" class="form-control" placeholder="First Name *" required />
                                    <div v-if="createUserErrors.first_name">
                                        <div v-for="error in createUserErrors.first_name" class="d-block invalid-feedback">
                                            <div>[ error ]</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-sm-6 col-md-6 col-lg-6">
                                    <input type="text" v-model="fillUser.last_name" class="form-control" placeholder="Last Name *" required />
                                    <div v-if="createUserErrors.last_name">
                                        <div v-for="error in createUserErrors.last_name" class="d-block invalid-feedback">
                                            <div>[ error ]</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row py-2">
                                <div class="col col-sm-4 col-md-4 col-lg-4">
                                    <input type="email" v-model="fillUser.email" class="form-control" placeholder="Email ID *" required />
                                    <div v-if="createUserErrors.email">
                                        <div v-for="error in createUserErrors.email" class="d-block invalid-feedback">
                                            <div>[ error ]</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-sm-4 col-md-4 col-lg-4">
                                    <input type="text" v-model="fillUser.mobile_no" class="form-control" placeholder="Mobile No">
                                    <div v-if="createUserErrors.mobile_no">
                                        <div v-for="error in createUserErrors.mobile_no" class="d-block invalid-feedback">
                                            <div>[ error ]</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-sm-4 col-md-4 col-lg-4">
                                    <select v-model="fillUser.role_type" class="form-control custom-select" required>
                                        <option value="">Select Role Type *</option>
                                        <option value="CEO & Founder">CEO & Founder</option>
                                        <option value="Team Lead">Team Lead</option>
                                        <option value="HR">HR</option>
                                        <option value="App Designer">App Designer</option>
                                        <option value="Web Developer">Web Developer</option>
                                    </select>
                                    <div v-if="createUserErrors.rolle_type">
                                        <div v-for="error in createUserErrors.role_type" class="d-block invalid-feedback">
                                            <div>[ error ]</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row py-2">
                                <div class="col col-sm-4 col-md-4 col-lg-4">
                                    <input type="text" v-model="fillUser.username" class="form-control" placeholder="Username *" required />
                                    <div v-if="createUserErrors.username">
                                        <div v-for="error in createUserErrors.username" class="d-block invalid-feedback">
                                            <div>[ error ]</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-sm-4 col-md-4 col-lg-4">
                                    <input type="password" v-model="fillUser.password" class="form-control" placeholder="Password" />
                                    <div v-if="createUserErrors.password">
                                        <div v-for="error in createUserErrors.password" class="d-block invalid-feedback">
                                            <div>[ error ]</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-sm-4 col-md-4 col-lg-4">
                                    <input type="password" v-model="fillUser.password_confirmation" class="form-control" placeholder="Confirm Password" />
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
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update User</button>
                            <button type="button" class="btn btn-link text-dark" data-dismiss="modal">Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="deleteUserModal" data-backdrop="static" class="modal fade" role="dialog"
                aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" 
                        method="post" @submit.prevent="confirmUserDelete(fillUser)"
                    >
                        <div class="modal-body">
                            <div>Are you sure you want to delete user, <strong>[ fillUser.last_name ] [ fillUser.first_name ]</strong>?</div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">OK</button>
                            <button type="button" class="btn btn-link text-dark" data-dismiss="modal">Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="scripts">
        <script>
            Vue.http.options.emulateJSON = true;
            new Vue({
                el: '#app',
                delimiters: ["[", "]"],
                data: {
                    loading: true,
                    users: [],
                    newUser: { 
                        employee_id:'', 
                        first_name: '', 
                        last_name: '', 
                        email: '', 
                        mobile_no: '', 
                        role_type: '', 
                        username: '', 
                        password: '', 
                        password_confirmation: ''
                    },
                    fillUser: { 
                        id:'', 
                        employee_id:'', 
                        first_name: '', 
                        last_name: '', 
                        email: '', 
                        mobile_no: '', 
                        role_type: '', 
                        username: '', 
                        password: ''
                    },
                    createUserErrors: {
                        employee_id: [], 
                        first_name: [], 
                        last_name: [], 
                        email: [], 
                        mobile_no: [], 
                        role_type: [], 
                        username: [], 
                        password: [], 
                    }
                },
                mounted: function () {
                    NProgress.start()
                    this.getUsers().then((result) => {
                        this.loading = false
                        NProgress.done()
                    })
                },
                methods: {
                    getUsers: function () {
                        return this.$http.get("/api/v1/users/").then(function (data) {
                            this.users = data.body;
                            console.log('DATA: ', data.body)
                        });
                    },
                    addUser: function () {
                        this.clearFormErrors()
                        NProgress.start()
                        const headers = { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') };
                        this.$http.post('/api/v1/users/', this.newUser, { headers: headers }).then(response => {
                            this.getUsers().then((result) => {
                                this.resetForm();
                                $("#addUserModal").modal('hide');
                                toastr.success('New user created successfully.', 
                                    'Success Alert', 
                                    { 
                                        timeOut: 5000, 
                                        positionClass: "toast-top-right", 
                                        "progressBar": true 
                                    });
                                    NProgress.done()
                            });
                        }, error => {
                            toastr.error('Oops an Error occured', 
                                'Error Alert', 
                                { 
                                    timeOut: 5000, 
                                    positionClass: "toast-top-right", 
                                    "progressBar": true 
                                });

                            if(error.status === 422) {
                                this.createUserErrors = error.body.errors
                            }
                            NProgress.done()
                        });
                    },

                    editUser: function (user) {
                        this.fillUser.id = user.id;
                        this.fillUser.employee_id = user.employee_id;
                        this.fillUser.first_name = user.first_name;
                        this.fillUser.last_name = user.last_name;
                        this.fillUser.email = user.email;
                        this.fillUser.role_type = user.role_type;
                        this.fillUser.username = user.username;
                        this.fillUser.mobile_no = user.mobile_no;

                        $("#editUserModal").modal('show');
                    },

                    updateUser: function (user) {
                        NProgress.start()
                        const headers = { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') };
                        this.$http.put(`/api/v1/users/${user.id}`, user, { headers: headers }).then(response => {
                            this.getUsers().then((result) => {
                                this.resetForm();
                                $("#editUserModal").modal('hide');
                                toastr.success('User updated successfully.', 
                                    'Success Alert', 
                                    {
                                        timeOut: 5000,
                                        "positionClass": "toast-top-right",
                                        "progressBar": true
                                    });
                                NProgress.done()
                            });
                        }, error => {
                            toastr.error('Ops an Error occured', 'Error Alert', {
                                timeOut: 5000,
                                positionClass: "toast-top-right",
                                "progressBar": true
                            });

                            if(error.status === 422) {
                                this.createUserErrors = error.body.errors
                            }

                        });
                    },

                    deleteUser: function (user) {
                        this.fillUser.id = user.id;
                        this.fillUser.employee_id = user.employee_id;
                        this.fillUser.first_name = user.first_name;
                        this.fillUser.last_name = user.last_name;
                        this.fillUser.email = user.email;
                        this.fillUser.role_type = user.role_type;
                        this.fillUser.username = user.username;
                        this.fillUser.mobile_no = user.mobile_no;

                        $("#deleteUserModal").modal('show');
                    },

                    confirmUserDelete: function (user) {
                        NProgress.start()
                        const headers = { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') };
                        this.$http.delete(`/api/v1/users/${user.id}`, { headers: headers }).then(response => {                            
                            this.getUsers().then((result) => {
                                $("#deleteUserModal").modal('hide');
                                this.resetForm();
                                toastr.success('User deleted successfully.', 
                                    'Success Alert', 
                                    {
                                        timeOut: 5000,
                                        "positionClass": "toast-top-right",
                                        "progressBar": true
                                    });
                                NProgress.done()
                            });
                        }, error => {
                            toastr.error('Ops an Error occured', 'Error Alert', {
                                timeOut: 5000,
                                positionClass: "toast-top-right",
                                "progressBar": true
                            });
                            console.log('ERROR: ', error)

                        });
                    },

                    resetForm: function () {
                        this.newUser = { 
                            employee_id:'', 
                            first_name: '', 
                            last_name: '', 
                            email: '', 
                            mobile_no: '', 
                            role_type: '', 
                            username: '', 
                            password: '', 
                            password_confirmation: ''
                        }
                        this.fillUser = { 
                            id:'', 
                            employee_id:'', 
                            first_name: '', 
                            last_name: '', 
                            email: '', 
                            mobile_no: '', 
                            role_type: '', 
                            username: '', 
                            password: ''
                        }
                        this.clearFormErrors()
                    },

                    clearFormErrors: function () {
                        this.createUserErrors = {
                            employee_id: [], 
                            first_name: [], 
                            last_name: [], 
                            email: [], 
                            mobile_no: [], 
                            role_type: [], 
                            username: [], 
                            password: [], 
                        }
                    },
                },

            })
        </script>
    </x-slot>

</x-app-layout>
