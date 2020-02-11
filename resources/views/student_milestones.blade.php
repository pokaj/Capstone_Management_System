@extends('studentLayout')

@section('student_milestones')

    <div class="container-fluid">
        <div class="row mb-9">
            <div class="col-xl-10 col-lg-9 col-md-8 mt-3">
                <div class="row align-items-center">
                    <div class="col-xl-10 col-12 mb-4 mb-xl-0 pl-0">
                        <h3 class="text-muted mb-3 ml-3">Milestones</h3>
                        <table class="table table-striped bg-light text-center">
                            <thead>
                            <tr class="text-muted">
                                <th>Title</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>Related Work</td>
                                <td>06/05/2020</td>
                                <td class="text-success">Submitted</td>
                                <td>
                                    <a href="" class="nav-link" data-toggle="modal" data-target="#sign-out"><i class="fas fa-eye text-muted fa-lg"></i></a>                                            </td>
                            </tr>
                            <tr>
                                <td>Chapter One - Introduction</td>
                                <td>30/05/2020</td>
                                <td class="text-danger">Not Submitted</td>
                                <td>
                                    <a href="" class="nav-link" data-toggle="modal" data-target="#sign-out"><i class="fas fa-eye text-muted fa-lg"></i></a>                                            </td>
                            </tr>
                            <tr>
                                <td>Annotated Bibliography</td>
                                <td>23/05/2020</td>
                                <td class="text-success">Submitted</td>
                                <td>
                                    <a href="" class="nav-link" data-toggle="modal" data-target="#sign-out"><i class="fas fa-eye text-muted fa-lg"></i></a>                                            </td>
                            </tr>
                            <tr>
                                <td>References</td>
                                <td>20/05/2020</td>
                                <td class="text-success">Submitted</td>
                                <td>
                                    <a href="" class="nav-link" data-toggle="modal" data-target="#sign-out"><i class="fas fa-eye text-muted fa-lg"></i></a>                                            </td>
                            </tr>
                            </tbody>

                        </table>
                    </div>

    @endsection
