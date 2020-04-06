@extends('layouts.faculty_layout')

@section('students')


    <div class="container">
        <div class="row my-2">
            <div class="col-lg-8 order-lg-2">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-target="#approved" data-toggle="tab" class="nav-link active">Approved Students</a>
                    </li>
                </ul>
                <div class="tab-content py-4">
                    <div class="tab-pane active" id="approved">
                        <div class="row">

                             <h3 class="text-muted mb-3 mt-3">Supervised Students</h3>
                                    <table class="table table-striped bg-light text-center">
                                        <thead class="thead-dark">
                                        <tr class="text-muted">
                                            <th>Name</th>
                                            <th>Project Type</th>
                                            <th>Field</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($projectDetails as $projectDetail)
                                        <tr>
                                            <td>{{$projectDetail->first_name}} {{$projectDetail->last_name}}</td>
                                            <td>{{$projectDetail->project_type}}</td>
                                            <td>{{$projectDetail->project_field}}</td>
                                            <td>
                                                <a href="{{route('viewProject',$projectDetail->project_Id)}}"><i class="fas fa-eye text-muted fa-lg"></i></a>
                                            </td>
                                        </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
