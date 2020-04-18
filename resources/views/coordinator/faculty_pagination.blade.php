<div class="table-responsive">
    <table class="table text-center table-hover">
        <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Department</th>
            <th>Student's Number</th>
            <th>Contact</th>
        </tr>
        </thead>
        @foreach($faculty as $data)
            <tr>
                <td>{{$data->first_name}} {{$data->last_name}}</td>
                <td>{{$data->department_name}}</td>
                <td>{{$data->number_of_students}}</td>
                <td><a href="" data-toggle="modal" data-target="#{{$data->faculty_Id}}" ><i class="fas fa-envelope text-muted"></i></a></td>
            </tr>
        @endforeach
    </table>
    <div class="col-12 d-flex pt-3 justify-content-center">
    {!! $faculty->links()  !!}
    </div>
</div>


<!-- beginning of modal -->
@foreach($faculty as $super)
    <div class="modal fade" id="{{$super->faculty_Id}}">
        <div class="modal-dialog">
            <div class="modal-content">

                <form method="get" action="{{route('contact')}}">
                    <div class="modal-header">
                        <label class="to text-white form-control">To: </label>
                        <input class="form-control" name="mail" value="{{$super->email}}">
                    </div>

                    <div class="modal-body">
                        <label>Subject: </label>
                        <input class="form-control" name="subject" required>

                        <hr>
                        <label>Message</label>
                        <textarea class="form-control" name="message" required></textarea>
                        <button class="mt-2 btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
<!-- end of modal -->
