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
            data: {inputVal: inputVal},
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
            data: {inputVal: inputVal},
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


    $('#search').on('keyup', function () {
        if ($('#search').val() === "") {
            $('#tbody').html("");
            return;
        }
        value = $(this).val();
        $.ajax({
            type: 'get',
            url: '/searchFaculty',
            data: {search: value},
            success: function (data) {
                $('tbody').html(data);

            }
        })
    });

    function run(id) {
        let table = "<table class='table table-hover'><thead class='thead-dark'><tr><th>Student ID</th><th>Name</th><th>Project Type</th><th>Project Title</th></tr></thead>";
        $.ajax({
            type: 'get',
            url: '/details',
            data: {facultyID: id},
            success: function (data) {
                if (data.success === true) {
                    let ans = data['data'];
                    for (var here = 0; here < ans.length; here++) {
                        table += '<tr>';
                        table += '<td>' + ans[here]['student_Id'];
                        table += '<td>' + ans[here]['first_name'] + ' ' + ans[here]['last_name'];
                        table += '<td>' + ans[here]['project_type'];
                        table += '<td>' + ans[here]['project_title'];
                        table += '</tr>';
                    }
                    document.getElementById('content').innerHTML = table;

                }
            },
        });
    }


    $('#find').on('keyup', function () {
        // if($('#find').val()===""){
        //     $('#faculty_details').html("");
        //     return;
        // }
        value = $(this).val();
        $.ajax({
            type: 'get',
            url: '/viewFaculty',
            data: {search: value},
            success: function (data) {
                $('#fac_details').html(data);

            }
        })
    });


    $('#find_available').on('keyup', function () {
        value = $(this).val();
        $.ajax({
            type: 'get',
            url: '/view_available',
            data: {search: value},
            success: function (data) {
                $('#available').html(data);

            }
        })
    });

// #######################   Student topics -> Faculty dropdown ##########################
    $(document).ready(function () {
        $(document).on('click', '.page-link', function (event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        })

        function fetch_data(page) {
            var _token = $("input[name=_token]").val();
            $.ajax({
                url: "/faculty_details",
                type: 'get',
                data: {_token: _token, page: page},
                success: function (data) {
                    $('#fac_dets').html(data);
                }
            })
        }
    });


// #######################   Student topics -> pagination for topics suggested by faculty ##########################
    $(document).ready(function () {
        $(document).on('click', '.page-link', function (event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        })

        function fetch_data(page) {
            var _token = $("input[name=_token]").val();
            $.ajax({
                url: "/available_projects",
                type: 'get',
                data: {_token: _token, page: page},
                success: function (data) {
                    $('#available_projects').html(data);
                }
            })
        }
    });

// #######################   Coordinator manage faculty -> limit number of student for each faculty member  ##########################
    $("#limit").submit(function (e) {
        e.preventDefault();
        let value = $("#limit_number").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/limit',
            data: {limit: value},
            success: function (data) {
                if (data.success === true) {
                    document.getElementById('limit_number').value = '';
                    Swal.fire(
                        "Great",
                        "Limit on number of students changed to " + value,
                        "success"
                    );

                } else {
                    Swal.fire(
                        "Sorry",
                        "Student number limit not effected!",
                        "error"
                    );
                }
            },
        });
    });


// #######################   Coordinator manage faculty -> search for faculty  ##########################
    $(document).ready(function () {
        $(document).on('click', '.page-link', function (event) {
            event.preventDefault();
            var currentpage = $(this).attr('href').split('page=')[1];
            fetch_data(currentpage);

        })

        function fetch_data(currentpage) {
            var _token = $("input[name=_token]").val();
            $.ajax({
                url: "/searchFaculty",
                type: 'get',
                data: {_token: _token, page: currentpage},
                success: function (data) {
                    $('#faculty_information').html(data);
                }
            })
        }
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
                date: date,
                student: student
            },
            success: function (data) {
                if (data.success === true) {
                    Swal.fire(
                        "Great",
                        "Reminder sent successfully",
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

    function approve(project_ID, student_ID) {
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
                        setTimeout("location.href = '/topics'", 2000)
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

// #######################   Coordinator dashboard -> table list for supervisors  ##########################
    $(document).ready(function () {
        $(document).on('click', '.page-link', function (event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        })

        function fetch_data(page) {
            var _token = $("input[name=_token]").val();
            $.ajax({
                url: "/super_dashboard/fetch_data",
                type: 'post',
                data: {_token: _token, page: page},
                success: function (data) {
                    $('#table_data').html(data);
                }
            })
        }
    });

// #######################  Coordinator dashboard ->  table list for supervised students  ##########################
    $(document).ready(function () {
        $(document).on('click', '.page-link', function (event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        })

        function fetch_data(page) {
            var _token = $("input[name=_token]").val();
            $.ajax({
                url: "/super_dashboard/super",
                type: 'post',
                data: {_token: _token, page: page},
                success: function (data) {
                    $('#supervised_student').html(data);
                }
            })
        }
    });

// #######################  Coordinator dashboard -> table list for unsupervised students ##########################
    $(document).ready(function () {
        $(document).on('click', '.page-link', function (event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        })

        function fetch_data(page) {
            var _token = $("input[name=_token]").val();
            $.ajax({
                url: "/super_dashboard/unsuper",
                type: 'post',
                data: {_token: _token, page: page},
                success: function (data) {
                    $('#unsupervised_student').html(data);
                }
            })
        }
    });

    $(document).ready(function () {
        $(document).on('click', '.page-link', function (event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        })

        function fetch_data(page) {
            var _token = $("input[name=_token]").val();
            $.ajax({
                url: "/super_dashboard/unsuper",
                type: 'post',
                data: {_token: _token, page: page},
                success: function (data) {
                    $('#unsupervised_student').html(data);
                }
            })
        }
    });


// #######################  Coordinator dashboard -> searching for faculty ##########################
    $('#search_faculty').on('keyup', function () {
        // if($('#search_faculty').val()===""){
        //     $('#faculty_search').html("");
        //     return;
        // }
        find = $(this).val();
        $.ajax({
            type: 'get',
            url: '/search_faculty_dash',
            data: {value: find},
            success: function (data) {
                $('#faculty_search').html(data);

            }
        })
    });

// #######################  Coordinator dashboard -> searching for supervised students ##########################
    $('#superStudents').on('keyup', function () {
        // if($('#search_faculty').val()===""){
        //     $('#faculty_search').html("");
        //     return;
        // }
        find = $(this).val();
        $.ajax({
            type: 'get',
            url: '/search_supervised_dash',
            data: {value: find},
            success: function (data) {
                $('#supervised_students').html(data);

            }
        })
    });


// #######################  Coordinator dashboard -> searching for unsupervised students ##########################
    $('#unsuperStudents').on('keyup', function () {
        // if($('#search_faculty').val()===""){
        //     $('#faculty_search').html("");
        //     return;
        // }
        find = $(this).val();
        $.ajax({
            type: 'get',
            url: '/search_unsupervised_dash',
            data: {value: find},
            success: function (data) {
                $('#unsupervised_students').html(data);

            }
        })
    });

    $(document).ready(function () {

        $("#selUser").select2();

        $('#but_read').click(function () {
            var userid = $('#selUser').val();
            var feedback = $('#feedback').val();

            $.ajax({
                type: 'get',
                url: '/send_feedback',
                data: {
                    studentID: userid,
                    feedback: feedback,
                },
                success: function (data) {
                    if (data.success === true) {
                        Swal.fire(
                            "Great",
                            "Feedback sent to student",
                            "success",
                        );
                    } else {
                        Swal.fire(
                            "Sorry",
                            "Could not send feedback",
                            "error"
                        );
                    }

                }
            })

        });
    });

    var spinner = $('#loader');
    $("#contact_all").submit(function (e){
        spinner.show();
        e.preventDefault();
        var subject = $("#mail_subject").val();
        var message = $("#mail_message").val();
        $.ajax({
            type:'get',
            url:'bulk_mail',
            data:{
                subject:subject,
                message:message,
            },
            success:function(data){
                if (data.success === true) {
                    document.getElementById('mail_subject').value = '';
                    document.getElementById('mail_message').value = '';
                    spinner.hide();
                    Swal.fire(
                        "Great",
                        "E-mail sent to students",
                        "success",
                    );
                } else {
                    Swal.fire(
                        "Sorry",
                        "Could not send E-mail to students",
                        "error"
                    );
                }
            }
        });
    });

//
// var delayInMilliseconds = 3000; //1 second
//
// setTimeout(function() {
//     spinner.hide();
//     console.log(subject,message);
// }, delayInMilliseconds);


//
// $("#provide_feedback").submit(function(e) {
//     e.preventDefault();
//     let student_name = document.getElementById('student_name').value;
//     let feedback = document.getElementById('feedback').value;
//     console.log(student_name,feedback);
// });





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
