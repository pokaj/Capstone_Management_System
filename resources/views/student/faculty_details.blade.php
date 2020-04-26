<table class="table table-striped bg-light text-center mt-5 col-lg-4">
    <thead class="thead-dark">
    <tr class="text-muted">
        <th>Name</th>
        <th>Department</th>
        <th>View Profile</th>
    </tr>
    </thead>
    <div>
        <tbody id="fac_details">
        @foreach($facultydets as $details)
            <tr>
                <td>{{$details->first_name}} {{$details->last_name}}</td>
                <td>{{$details->department_name}}</td>
                <td><a href="" data-toggle="modal" data-target="#{{$details->first_name}}{{$details->last_name}}{{$details->faculty_Id}}">
                        <i class="fas fa-eye text-muted"></i></a></td>
            </tr>

            <!-- beginning of modal to view faculty details-->
            <div class="modal fade" id="{{$details->first_name}}{{$details->last_name}}{{$details->faculty_Id}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p class="modal-title font-weight-bold">
                                <strong>{{$details->first_name}} {{$details->last_name}}</strong>
                            </p><br>

                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body align-content-center">
                            <img src="images/{{$details->image}}" width="400" height="400" class="rounded-circle">
                        </div>

                        <div class="modal-footer">
                            <div class="mr-auto">
                                <label><strong>Interests</strong></label>
                                <p>{{$details->interests}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of modal to view faculty details-->
        @endforeach
        </tbody>
    </div>
</table>
<div class="col-12 d-flex pt-3 justify-content-center">
    {{$facultydets->links()}}
</div>
