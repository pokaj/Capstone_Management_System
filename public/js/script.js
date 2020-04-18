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
    if($('#search').val()===""){
        $('#tbody').html("");
        return;
    }
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


$('#find').on('keyup',function (){
    if($('#find').val()===""){
        $('#faculty_details').html("");
        return;
    }
    value = $(this).val();
    $.ajax({
        type:'get',
        url:'/viewFaculty',
        data:{search:value},
        success:function(data){
            $('#faculty_details').html(data);

        }
    })
});


$("#limit").submit(function (e) {
    e.preventDefault();
    let value = document.getElementById("limit_number").value;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '/limit',
        data: {limit:value},
        success: function (data) {
            if (data.success === true) {
                Swal.fire(
                    "Great",
                    "Limit on number of students changed to " + value,
                    "success"
                );

            }else{
                Swal.fire(
                    "Sorry",
                    "Student number limit not effected!",
                    "error"
                );
            }
        },
    });
});

$("#next").submit(function (e) {
    e.preventDefault();
    let date = document.getElementById("reminder").value;
    let student = document.getElementById("student").value;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: '/reminder',
        data: {
            date:date,
            student:student
        },
        success: function (data) {
            if (data.success === true) {
                Swal.fire(
                    "Great",
                    "Reminder sent successfully",
                    "success"
                );

            }
            else{
                Swal.fire(
                    "Sorry",
                    "Reminder failed to send",
                    "error"
                );
            }
        },
    });

});

function application(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: 'apply',
            data: {
                project_ID: id
            },
            success: function (data) {
                if (data.success === true) {
                    Swal.fire(
                        "Great",
                        "You have applied for this project",
                        "success"
                    );
                } else {
                    Swal.fire(
                        "Sorry",
                        "Reminder failed to send",
                        "error"
                    );
                }
            },
        });
}

function approve(project_ID,student_ID){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'post',
        url: 'acceptProposal',
        data: {
            project: project_ID,
            student: student_ID,
        },
        success: function (data) {
            if (data.success === true) {
                Swal.fire(
                    "Great",
                    "You have accepted to supervise this student",
                    "success",
                    setTimeout("location.href = '/topics'",2000)
                    );
            } else {
                Swal.fire(
                    "Sorry",
                    "Could not add student",
                    "error"
                );
            }
        },
    });


}
$(document).ready(function() {
    $(document).on('click', '.page-link', function (event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
    })

    function fetch_data(page) {
        var _token = $("input[name=_token]").val();
        $.ajax({
            url: "/super_dashboard/fetch_data",
            type:'post',
            data:{_token:_token, page:page},
            success: function (data) {
                $('#table_data').html(data);
            }
        })
    }
});


$(document).ready(function() {
    $(document).on('click', '.page-link', function (event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
    })

    function fetch_data(page) {
        var _token = $("input[name=_token]").val();
        $.ajax({
            url: "/super_dashboard/super",
            type:'post',
            data:{_token:_token, page:page},
            success: function (data) {
                $('#supervised_student').html(data);
            }
        })
    }
});



$(document).ready(function() {
    $(document).on('click', '.page-link', function (event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
    })

    function fetch_data(page) {
        var _token = $("input[name=_token]").val();
        $.ajax({
            url: "/super_dashboard/unsuper",
            type:'post',
            data:{_token:_token, page:page},
            success: function (data) {
                $('#unsupervised_student').html(data);
            }
        })
    }
});




// var btn = document.getElementById('button');
// var bar = document.getElementById('bar');
// var count = 0;
// // Listen for an event on the button
// // Increase the width of the bar by 10 percent(10%)
// btn.addEventListener('click', ()=>{
//     bar.style.width = count + '%';
//     if(count === 100){
//         count = 0;
//     }
//     else {
//         count = count + 20;
//     }
// });
//
