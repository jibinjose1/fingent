$(document).ready(function(){

    $(document).on('click','#deleteStudentBtn',function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        var encID = $(this).data('id');

        $.ajax({
            method: 'get',
            header:{
                'X-CSRF-TOKEN': token
            },
            url : 'delete',
            data : {
                dataType: 'json', 
                contentType:'application/json', 
                _token: token,
                encID:encID
            },
            success:function(response) {
                if(response.status == true){
                    toastr.success('Student Deleted Successfully');
                    location.reload();
                }
            }
        });
    });

    $(document).on('click','#deleteMarkBtn',function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        var encID = $(this).data('id');

        $.ajax({
            method: 'get',
            header:{
                'X-CSRF-TOKEN': token
            },
            url : 'delete',
            data : {
                dataType: 'json', 
                contentType:'application/json', 
                _token: token,
                encID:encID
            },
            success:function(response) {
                if(response.status == true){
                    toastr.success('Mark Deleted Successfully');
                    location.reload();
                }
            }
        });
    });
});