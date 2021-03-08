$(document).ready(function() {
    $(document).on('click','.status',changeStatus);
    getStatus();
});

function changeStatus(){
    var status=$(this).data('id');
    $.ajax({
        url:"models/promenaStatusaAnkete.php",
        method:"POST",
        data:{
            status:status
        },
        success:function(){
            getStatus();
        },error: function(xhr,status,error){
            console.log(xhr,status,error);
        }
    })
}

function getStatus(){
    $.ajax({
        url:"models/status.php",
        method:"GET",
        dataType:"JSON",
        success:function(data){
            var html="";
            if(data.aktivna==1){
                html="Active"
            }else{
                html="inactive";
            }
            $("#pollStatus").html("Status: "+html)
        },error: function(xhr,status,error){
            console.log(xhr,status,error);
        }
    })
}