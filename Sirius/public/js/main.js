$(function() {
    $('#table').bootstrapTable()
})

function openDayModal(onDay, onMonth, onYear, onMonthF ) {
    if ( onDay == 0)
    {
        alert('It is not working Day.  ')
    }
    else if(onDay == -1) {
        
    }
    else{
        var postData = {
            onDay: onDay,
            onMonth: onMonth,
            onYear: onYear,
        };
        $.ajax({
            url: "/openDayModal",
            type:"POST",
            dataType: 'JSON',
            data: postData,
            success:function(response){
                if(response.success == 1) {
                    $("#dayModal").modal();
                    $(".dayModal-title").text('Schedule list for ' + onDay + ' - ' + onMonthF + ' - ' + onYear);
                    $("#inputOnDay").val(onDay);
                    $(".scheduleButton").attr("disabled", false);
                    $.each( response.query, function( key, value ) {
                       $( "#btn" + value.onTitle).attr("disabled", true);
                    });
                }
                else{
                    //alert(response.error);
                }
            },
            error:function(response){
                console.log('error',response);
                if(response) {
                }
            },
        });
    }
    
}

function openAppointmentForm(onTitle, fullonTitle ) {
    $("#appointmentModal").modal();
    $(".appointmentModal-title").text('Appointment from ' + $("input[name='onDay']").val() + " - " + $("input[name='onMonthF']").val() + ' - ' + $("input[name='onYear']").val() + ' -- ' + fullonTitle);
    $("#dayModal").modal('hide');
    $("#inputOnTitle").val(onTitle);
        
}

function validateMyForm() {
    var formDataArray = $('form[name="appointment"]').serializeArray();
    var formData = {};
    $.each( formDataArray, function( key, value ) {
        formData[value.name] = value.value
    });  
    var postData = {
        formData: formData
    };
        $.ajax({
            url: "/saveAppointmentForm",
            type:"POST",
            dataType: 'JSON',
            data: postData,
            success:function(response){
                if(response.success == 1) {
                    $("input[name='first_name']").val(''); 
                    $("input[name='last_name']").val(''); 
                    $("input[name='email']").val(''); 
                    $("input[name='phone']").val(''); 
                    location.reload();
                }
                else{
                    alert('Due to a any problem, your application was not approved, please try again later.');
                    location.reload();
                }
            },
            error:function(response){
                console.log('error',response);
                if(response) {
                }
            },
        });
        return false;
}
    
    

