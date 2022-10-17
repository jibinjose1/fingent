$(document).ready(function(){

    $(document).on('click','#teacher',function(){
        console.log(1);
        $.ajax({
            method: 'get',
            header:{
                'X-CSRF-TOKEN': token
            },
            url : 'teacherList',
            data : {
                dataType: 'json', 
                contentType:'application/json', 
                _token: token,
                encID:encID
            },
            success:function(response) {
                if(response.status == true){
                   
                    location.reload();
                }
            }
        });
    });
});