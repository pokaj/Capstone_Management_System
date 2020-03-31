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





