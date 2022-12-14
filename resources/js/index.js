$(function(){
    const elemlevel = $("#elem");
    const highschool = $("#highschool");
    const college = $("#college");
    const public_sec = $("#public");     

    function getShowList(school){
        if(school === "초등학교"){
            elemlevel.show();
            highschool.hide();
            college.hide();
            public_sec.hide();
        }
        else if(school === "중학교"){
            elemlevel.show();
            highschool.hide();
            college.hide();
            public_sec.hide();
        }
        else if(school === "고등학교"){
            highschool.show();
            elemlevel.hide();
            college.hide();
            public_sec.hide();
        }
        else if(school === "대학"){
            college.show();
            elemlevel.hide();
            highschool.hide();
            public_sec.hide();
        }
        else if(school === "일반인"){
            public_sec.show();
            elemlevel.hide();
            highschool.hide();
            college.hide();
        }
        else{
            elemlevel.hide();
            highschool.hide();
            college.hide();
            public_sec.hide();
        }
    }

    var data = document.getElementById('school_level').value;
    getShowList(data);
    
    $("#school_level").change(function(){
        var data = document.getElementById('school_level').value;
        getShowList(data);
    });  
    
    //if check box is checked add class to start image to enable start
    $("#confirm_agree").click(function(){
        if ($(this).is(":checked")) {
            
        }
    }); 

    $('#btnSave').click(function(){            
        $.ajax({
            type:'ajax',
            method: 'post',
            url: url,
            data: data,
            async: false,
            dataType: 'json',
            success: function(response){
                var error = response.error;
                var type = response.type;
                if (response.success) {
                    $('#myForm')[0].reset();
                    $('.alert-success').html(type + 'successful.').fadeIn().delay(2000).fadeOut('slow');
                    accountTable.ajax.reload(null, false);
                    if(type === "Update"){$('#myModal').modal('hide');}
                }else{
                    $('#myModal').modal('hide');
                    $('.alert-danger').html(error).fadeIn().delay(2000).fadeOut('slow');
                }
            },
            error: function(){
                $('.alert-danger').html('Unable to add record.').fadeIn().delay(2000).fadeOut('slow');
                $('#myModal').modal('hide');
            }
        });
    });

    $.ajax({
        url:'http://127.0.0.1/survey_project/survey/get_question',
        async:false,
        dataType:'json',
        success: function(data){
            console.log(data)
        },
        error: function(){
            console.log('error')
        }
    });
    
    $.ajax({//START...
        url:'../../survey_project/survey/get_question',
        type:'GET',
        async:false,
        dataType:'json',
        success: function(data){
            console.log(data)
        }
      });//END....
})