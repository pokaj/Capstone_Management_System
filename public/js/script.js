$("#meetingDetails").submit(function (e) {
        e.preventDefault();
        let inputVal = document.getElementById("meetingID").value;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/meetingDetails',
            data: {inputVal:inputVal},
            success: function (data) {
                if (data.success === true) {
                    document.getElementById("objectives").innerHTML = data.data[0]['mt_objective'];
                    document.getElementById("challenges").innerHTML = data.data[0]['mt_challenges'];
                    document.getElementById("summary").innerHTML = data.data[0]['mt_sumofprogress'];
                    document.getElementById("nextObjectives").innerHTML = data.data[0]['mt_objnxtperiod'];
                    document.getElementById("nextDate").innerHTML = data.data[0]['mt_nextDate'];
                }
                },
        });
});


$("#meetingDets").submit(function (e) {
    e.preventDefault();
    let inputVal = document.getElementById("meetID").value;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '/meetingDetails',
        data: {inputVal:inputVal},
        success: function (data) {
            if (data.success === true) {
                document.getElementById("objectives").innerHTML = data.data[0]['mt_objective'];
                document.getElementById("challenges").innerHTML = data.data[0]['mt_challenges'];
                document.getElementById("summary").innerHTML = data.data[0]['mt_sumofprogress'];
                document.getElementById("nextObjectives").innerHTML = data.data[0]['mt_objnxtperiod'];
                document.getElementById("nextDate").innerHTML = data.data[0]['mt_nextDate'];
            }
        },
    });
});


$('#search').on('keyup',function (){
    value = $(this).val();
    $.ajax({
        type:'get',
        url:'/searchFaculty',
        data:{search:value},
        success:function(data){
            $('tbody').html(data);

        }
    })
});

function run(id) {
    let tab = "<table class='table table-hover'><thead class='thead-dark'><tr><th>Student ID</th><th>Name</th><th>Project Type</th><th>Project Title</th></tr></thead>";
    $.ajax({
        type: 'get',
        url: '/details',
        data: {facultyID:id},
        success: function (data) {
            if (data.success === true) {
                let ans = data['data'];
                    for(var here = 0; here < ans.length; here++) {
                        tab += '<tr>';
                        tab += '<td>' + ans[here]['student_Id'];
                        tab += '<td>' + ans[here]['first_name'] + ' ' + ans[here]['last_name'];
                        tab += '<td>' + ans[here]['project_type'];
                        tab += '<td>' + ans[here]['project_title'];
                        tab += '</tr>';
                    }
                document.getElementById('content').innerHTML = tab;

            }
            },
    });
}

