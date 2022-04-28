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
                                        <table class="table table-striped mb-0">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th class="text-center">Sales Count</th>
                                                <th class="text-center">Gross Earnings</th>
                                                <th class="text-center">Tax Withheld</th>
                                                <th class="text-center">Net Earnings</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>03/15/2018</td>
                                                <td class="text-center">1,050</td>
                                                <td class="text-success text-center">+ $32,580.00</td>
                                                <td class="text-danger text-center">- $3,023.10</td>
                                                <td class="text-right text-center">$28,670.90</td>
                                                <td class="text-right">
                                                    <a href="#" data-toggle="tooltip" title="Detail">
                                                        <i class="fa fa-external-link"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>03/14/2018</td>
                                                <td class="text-center">780</td>
                                                <td class="text-success text-center">+ $30,065.10</td>
                                                <td class="text-danger text-center">- $2,780.00</td>
                                                <td class="text-right text-center">$26,930.40</td>
                                                <td class="text-right">
                                                    <a href="#" data-toggle="tooltip" title="Detail">
                                                        <i class="fa fa-external-link"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>03/13/2018</td>
                                                <td class="text-center">1.980</td>
                                                <td class="text-success text-center">+ $30,065.10</td>
                                                <td class="text-danger text-center">- $2,780.00</td>
                                                <td class="text-right text-center">$26,930.40</td>
                                                <td class="text-right">
                                                    <a href="#" data-toggle="tooltip" title="Detail">
                                                        <i class="fa fa-external-link"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>03/12/2018</td>
                                                <td class="text-center">300</td>
                                                <td class="text-success text-center">+ $30,065.10</td>
                                                <td class="text-danger text-center">- $2,780.00</td>
                                                <td class="text-right text-center">$26,930.40</td>
                                                <td class="text-right">
                                                    <a href="#" data-toggle="tooltip" title="Detail">
                                                        <i class="fa fa-external-link"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>03/11/2018</td>
                                                <td class="text-center">940</td>
                                                <td class="text-success text-center">+ $30,065.10</td>
                                                <td class="text-danger text-center">- $2,780.00</td>
                                                <td class="text-right text-center">$26,930.40</td>
                                                <td class="text-right">
                                                    <a href="#" data-toggle="tooltip" title="Detail">
                                                        <i class="fa fa-external-link"></i>
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
