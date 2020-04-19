<div class="table-responsive">
    <table class="table text-center table-hover">
        <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Major</th>
            <th>Project Type</th>
            <th>Contact</th>
        </tr>
        </thead>
        <thead id="supervised_students">
        @foreach($supervised as $student)
            <tr>
                <td class="text-capitalize">{{$student->first_name}} {{$student->last_name}}</td>
                <td class="text-capitalize">{{$student->major_name}}</td>
                <td class="text-capitalize">{{$student->project_type}}</td>
                <td><a href="" data-toggle="modal" data-target="#{{$student->student_user_id}}" ><i class="fas fa-envelope text-muted"></i></a></td>
            </tr>
        @endforeach
        </thead>
    </table>
    <div class="col-12 d-flex pt-3 justify-content-center">
        {!! $supervised->links() !!}
    </div>
</div>


<!-- beginning of modal -->
@foreach($supervised as $student)
    <div class="modal fade" id="{{$student->student_user_id}}">
        <div class="modal-dialog">
            <div class="modal-content">

                <form method="get" action="{{route('contact')}}">
                    <div class="modal-header">
                        <label class="to text-white form-control">To: </label>
                        <input class="form-control" name="mail" value="{{$student->email}}">
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
