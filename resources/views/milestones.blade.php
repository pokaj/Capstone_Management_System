@extends('layout')


@section('milestones')
    <div class="container">
        <div class="row my-2">
            <div class="col-lg-8 order-lg-2">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-target="#milestones" data-toggle="tab" class="nav-link active">Milestones</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#add_milestone" data-toggle="tab" class="nav-link">Add Milestone</a>
                    </li>
                </ul>
                <div class="tab-content py-4">
                    <div class="tab-pane active" id="milestones">
                            <h3 class="text-muted mb-3 mt-3">Milestones</h3>
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
                                        <a href="" class="nav-link" data-toggle="modal" data-target="#edit_milestone"><i class="fas fa-edit text-muted fa-lg"></i></a>
                                    </td>

                                </tr>
                                <tr>

                                    <td>Annotated Bibliograpny</td>
                                    <td>30th June 2020</td>
                                    <td>
                                        <a href="" class="nav-link" data-toggle="modal" data-target="#edit_milestone"><i class="fas fa-edit text-muted fa-lg"></i></a>
                                    </td>
                                </tr>
                                <tr>

                                    <td>Chapter One (Introduction) </td>
                                    <td>5th July 2020</td>
                                    <td>
                                        <a href="" class="nav-link" data-toggle="modal" data-target="#edit_milestone"><i class="fas fa-edit text-muted fa-lg"></i></a>
                                    </td>
                                </tr>
                                </tbody>

                            </table>

                            <!-- beginning of modal -->
                            <div class="modal fade" id="edit_milestone">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form>
                                            <div class="modal-header">
                                                <p class="modal-title"><strong>Milestone Title</strong></p>
                                               <input class="form-control" type="text">

                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <p><strong>Milestone Description</strong></p>
                                                <textarea class="modal-title form-control" type="text" value="Milestone Title"></textarea>
                                                    <br>
                                                <p class="modal-title"><strong>Submission Type</strong></p>
                                                <input class="form-control" type="text">

                                                <br>
                                                <p class="modal-title"><strong>Due Date</strong></p>
                                                <input class="form-control" type="date">
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Update </button>
                                            </div>
                                            </form>

                                        </div>
                                    </div>

                            </div>
                            <!-- end of modal -->

                        </div>


                    </div>
                    <div class="tab-pane" id="add_milestone">

                        <h3 class="text-muted mb-3 mt-3">Add Milestone</h3>

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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Due Date: </label>
                                            <input type="date" class="form-control">
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
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endsection
