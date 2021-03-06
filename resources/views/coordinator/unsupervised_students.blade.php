<div class="table-responsive">
    <table class="table text-center table-hover">
        <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Major</th>
            <th>Contact</th>
        </tr>
        </thead>
        <tbody id="unsupervised_students">
        @foreach($unsuper as $data)
            <tr>
                <td>{{$data->first_name}} {{$data->last_name}}</td>
                <td>{{$data->major_name}}</td>
                <td><a href="" data-toggle="modal" data-target="#{{$data->student_user_id}}" ><i class="fas fa-envelope text-muted"></i></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="col-12 d-flex pt-3 justify-content-center">
        {!! $unsuper->links() !!}

    </div>
</div>


<!-- beginning of modal -->
@foreach($unsuper as $student)
    <div class="modal fade" id="{{$student->student_user_id}}">
        <div class="modal-dialog">
            <div class="modal-content">

                <form method="get" action="{{route('contact')}}">
                    <div class="modal-header">
                        <label class="to text-white form-control">To: </label>
                        <input class="form-control search-input" name="mail" value="{{$student->email}}">
                    </div>

                    <div class="modal-body">
                        <label>Subject: </label>
                        <input class="form-control search-input" name="subject" required>

                        <hr>
                        <label>Message</label>
                        <textarea class="form-control search-input" name="message" required></textarea>
                        <button class="mt-2 btn btn-primary float-right">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
<!-- end of modal -->
