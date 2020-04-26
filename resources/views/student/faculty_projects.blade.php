<table class="table text-center table-dark table-hover">
    <thead>
    <tr class="text-muted">
        <th>Faculty</th>
        <th>Project Type</th>
        <th>Field</th>
        <th>View Project</th>
    </tr>
    </thead>
    <tbody id="available">
    @foreach($facultyProjects as $facultyProject)
        <tr>
            <td  class="text-white"><a href="" data-toggle="modal" data-target="#{{$facultyProject->faculty_Id}}{{$facultyProject->first_name}}{{$facultyProject->last_name}}">
                    {{$facultyProject->first_name}} {{$facultyProject->last_name}}</a></td>
            <td>{{$facultyProject->project_type}}</td>
            <td>{{$facultyProject->project_field}}</td>
            <td>
                <a href="" data-toggle="modal" data-target="#{{$facultyProject->project_Id}}">
                    <i class="fas fa-eye text-muted fa-lg"></i></a>
            </td>
        </tr>
        <!-- beginning of modal for project details-->
        <div class="modal fade" id="{{$facultyProject->project_Id}}{{$facultyProject->faculty_Id}}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title">
                            <strong> Title</strong>: {{$facultyProject->project_title}}
                        </p><br>

                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <strong>Description</strong>: {{$facultyProject->project_desc}}
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success" onclick="application({{$facultyProject->project_Id}})">Apply</button>
                        <span>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Ignore</button>
                                                </span>

                    </div>
                </div>
            </div>
        </div>
        {{--                                end of modal for project details--}}


        <!-- beginning of modal faculty details-->
        <div class="modal fade" id="{{$facultyProject->faculty_Id}}{{$facultyProject->first_name}}{{$facultyProject->last_name}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title">
                            <strong>{{$facultyProject->first_name}} {{$facultyProject->last_name}}</strong>
                        </p><br>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <img class="rounded-circle" src="images/{{$facultyProject->image}}" height="400" width="420">

                        <label><strong>Department</strong></label>
                        <p>{{$facultyProject->department_name}}</p>
                    </div>

                    <div class="modal-footer">
                        <div class="mr-auto">
                            <label><strong>Interests</strong></label>
                            <p>{{$facultyProject->interests}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--                                end of modal for faculty details--}}
    @endforeach
    </tbody>
</table>
<div class="col-12 d-flex pt-3 justify-content-center">
    {!! $facultyProjects->links() !!}
</div>
