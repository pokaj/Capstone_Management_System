@extends('layout')


@section('milestones')

    <div class="content">
    <h3 class="text-secondary">Milestones</h3>
    <button type="button" class="btn btn-primary mt-3">Add Milestone</button>

        <div class="row mb-9 ml-auto mt-3">
                        <table class="table table-striped bg-light text-center">
                            <thead>
                            <tr class="text-muted">
                                <th>Milestone</th>
                                <th>Due Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>References</td>
                                <td>24th June 2020</td>
                                <td>
                                    <a href="" class="nav-link" data-toggle="modal" data-target="#sign-out"><i class="fas fa-edit text-muted fa-lg"></i></a>
                                </td>

                            </tr>
                            <tr>

                                <td>Annotated Bibliograpny</td>
                                <td>30th June 2020</td>
                                <td>
                                    <a href="" class="nav-link" data-toggle="modal" data-target="#sign-out"><i class="fas fa-edit text-muted fa-lg"></i></a>
                                </td>
                            </tr>
                            <tr>

                                <td>Chapter One (Introduction) </td>
                                <td>5th July 2020</td>
                                <td>
                                    <a href="" class="nav-link" data-toggle="modal" data-target="#sign-out"><i class="fas fa-edit text-muted fa-lg"></i></a>
                                </td>
                            </tr>
                            </tbody>

                        </table>

                    </div>

        <h3 class="text-muted mt-3">Add new Milestone</h3>

            <div class="card">

                <div class="card-body">
                    <form>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Milestone Title: </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Submission Type: </label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        </div>



                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Milestone Description: </label>
                                <div class="form-group">
                                    <label class="bmd-label-floating"> </label>
                                    <textarea class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">ADD</button>
                        </div>
                    </form>
                </div>
            </div>

    @endsection
