@extends('layout')

@section('viewProject')
    <div class="container">
        <div class="row my-2">
            <div class="col-lg-8 order-lg-2">

                @foreach($users as $user)
                <h2 class="">{{$user->first_name}} {{$user->last_name}}</h2>
                <p class="lead"><strong class="text-black-50">Topic: </strong>{{$user->project_title}}</p>
                {{--                Beginning of navigation tab--}}
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-target="#description" data-toggle="tab" class="nav-link active">Project Description</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#showdeliverables" data-toggle="tab" class="nav-link">Deliverables</a>
                    </li>
                    <li class="nav-item">
                        <a href="" data-target="#adddeliverables" data-toggle="tab" class="nav-link">Add New Deliverable</a>
                    </li>
                </ul>
                {{--                End of navigation tab--}}

                <div class="tab-content py-4">

                    <div class="tab-pane active" id="description">
                        {{--                        Beginning of section for viewing project description--}}
                        <p>
                            {{$user->project_desc}}
                            @endforeach
                        </p>

                    </div>
                    {{--                    End of section for viewing project description--}}
                    <div class="tab-pane" id="showdeliverables">
                        {{--                        Beginning of section for viewing deliverables--}}

                        <table class="table table-striped bg-light text-center">
                            <thead class="thead-dark">
                            <tr class="text-muted">
                                <th>Title</th>
                                <th>Due Date</th>
                                <th>Date Submitted</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>References</td>
                                <td>20/05/19</td>
                                <td>26/05/19</td>
                                <td>
                                    <a href=""><i class="fas fa-download"></i></a>
                                </td>
                            </tr>
                            <tr>

                                <td>Annotated Bibliography</td>
                                <td>04/06/19</td>
                                <td>10/06/19</td>
                                <td>
                                    <a href=""><i class="fas fa-download"></i></a>
                                </td>
                            </tr>
                            <tr>

                                <td>Chapter One - Introduction</td>
                                <td>20/06/19</td>
                                <td>23/06/19</td>
                                <td>
                                    <a href=""><i class="fas fa-download"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    {{--                    End of section for viewing deliverables--}}
                </div>
            </div>
        </div>
    </div>
@endsection
