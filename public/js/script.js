
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
            url: '/meet',
            data: {inputVal:inputVal},
            success: function (data) {
                if (data.success === true) {
                    data.data.forEach(function(data,index){
                        console.log(data);
                    });

                }
            },
            error: function (data) {


            }

        });
});




