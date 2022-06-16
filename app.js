$('.subnav__link').click(function(){
    $('form').hide();
    $('#requests').hide();
    $('#output').html('');
    $('.about_inner').hide();
});

$('#add_people').click(function(){
    $('.people').show();
});
$('#add_place').click(function(){
    $('.place').show();
});
$('#add_admin').click(function(){
    $('.admin').show();
});
$('#add_request').click(function(){
    $('.request').show();
});
$('.update_people').click(function(){
    $('.people-update').show();
});
$('#update_place').click(function(){
    $('.place-update').show();
});
$('#update_admin').click(function(){
    $('.admin-update').show();
});
$('#update_requests').click(function(){
    $('.request-update').show();
});
$('#about').click(function(){
    $('.about_inner').show();
    $('#output').html('');
    $('form').hide();
    $('#requests').hide();
});



//==================== Add ====================

$('#people-btn').on('click', function(e){
    
    let formData = new FormData();

    formData.append('Name', $('#name').val());
    formData.append('Surname', $('#surname').val());

    var request = new XMLHttpRequest();

    function reqReadyStateChange() {
        if(request.readyState == 4 && request.status == 200){
            document.getElementById("output").innerHTML = request.responseText;
        }
    }

    request.open("POST", "http://localhost/ПИС_Курсовая/php/add_people.php");
    request.onreadystatechange = reqReadyStateChange;
    request.send(formData);
})

$('#place-btn').on('click', function(e){
    
    let formData = new FormData();

    formData.append('PlaceName', $('#placeName').val());
    formData.append('AdminBodyID', $('#adminBodyID').val());

    var request = new XMLHttpRequest();

    function reqReadyStateChange() {
        if(request.readyState == 4 && request.status == 200){
            document.getElementById("output").innerHTML = request.responseText;
        }
    }

    request.open("POST", "http://localhost/ПИС_Курсовая/php/add_place.php");
    request.onreadystatechange = reqReadyStateChange;
    request.send(formData);
})

$('#admin-btn').on('click', function(e){
    
    let formData = new FormData();

    formData.append('AdminBodyName', $('#adminBodyName').val());
    formData.append('Province', $('#province').val());

    var request = new XMLHttpRequest();

    function reqReadyStateChange() {
        if(request.readyState == 4 && request.status == 200){
            document.getElementById("output").innerHTML = request.responseText;
        }
    }

    request.open("POST", "http://localhost/ПИС_Курсовая/php/add_admin.php");
    request.onreadystatechange = reqReadyStateChange;
    request.send(formData);
})

$('#request-btn').on('click', function(e){
    
    let formData = new FormData();

    formData.append('DateReq', $('#dateReq').val());
    formData.append('DateOfFishing', $('#dateOfFishing').val());
    formData.append('Permission', $('#permission').val());
    formData.append('PersonID', $('#personID').val());
    formData.append('PlaceID', $('#placeID').val());

    var request = new XMLHttpRequest();

    function reqReadyStateChange() {
        if(request.readyState == 4 && request.status == 200){
            document.getElementById("output").innerHTML = request.responseText;
        }
    }

    request.open("POST", "http://localhost/ПИС_Курсовая/php/add_request.php");
    request.onreadystatechange = reqReadyStateChange;
    request.send(formData);
})

//==================== Show ====================


$('#show_people').on('click', function(e){
    ShowPeople();
})

function ShowPeople(){
    var request = new XMLHttpRequest();

    function reqReadyStateChange() {
        if(request.readyState == 4 && request.status == 200){
            document.getElementById("output").innerHTML = request.responseText;
            UpdatePeople();
            DeletePeople();
        }
    }

    request.open("POST", "http://localhost/ПИС_Курсовая/php/print_people.php");
    request.onreadystatechange = reqReadyStateChange;
    request.send();
}

$('#show_place').on('click', function(e){
    ShowPlace();    
})

function ShowPlace(){
    var request = new XMLHttpRequest();

    function reqReadyStateChange() {
        if(request.readyState == 4 && request.status == 200){
            document.getElementById("output").innerHTML = request.responseText;
            UpdatePlace();
            DeletePlace();
        }
    }

    request.open("POST", "http://localhost/ПИС_Курсовая/php/print_place.php");
    request.onreadystatechange = reqReadyStateChange;
    request.send();
}

$('#show_admin').on('click', function(e){
    ShowAdmin();    
})

function ShowAdmin(){
    var request = new XMLHttpRequest();

    function reqReadyStateChange() {
        if(request.readyState == 4 && request.status == 200){
            document.getElementById("output").innerHTML = request.responseText;
            UpdateAdmin();
            DeleteAdmin();
        }
    }

    request.open("POST", "http://localhost/ПИС_Курсовая/php/print_admin.php");
    request.onreadystatechange = reqReadyStateChange;
    request.send();
}

$('#show_requests').on('click', function(e){
    ShowRequests();
})

function ShowRequests(){
    var request = new XMLHttpRequest();

    function reqReadyStateChange() {
        if(request.readyState == 4 && request.status == 200){
            document.getElementById("output").innerHTML = request.responseText;
            UpdateRequest();
            DeleteRequest();
        }
    }

    request.open("POST", "http://localhost/ПИС_Курсовая/php/print_requests.php");
    request.onreadystatechange = reqReadyStateChange;
    request.send();
}

$('#show_fullrequests').on('click', function(e){

    var request = new XMLHttpRequest();

    function reqReadyStateChange() {
        if(request.readyState == 4 && request.status == 200){
            document.getElementById("output").innerHTML = request.responseText;
        }
    }

    request.open("POST", "http://localhost/ПИС_Курсовая/php/print_fullrequests.php");
    request.onreadystatechange = reqReadyStateChange;
    request.send();
})

$('#show_dataRequests').on('click', function(e){
    $('#calendar').show();
})

$('#calendar_search').on('click', function(e){
    let formData = new FormData();

    if($('#calendar_date').val()){
        formData.append('Date', $('#calendar_date').val());
    }
    else{
        var today = new Date(Date.now());
        var string = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
        formData.append('Date', string);
    }

    var request = new XMLHttpRequest();

    function reqReadyStateChange() {
        if(request.readyState == 4 && request.status == 200){
            document.getElementById("output").innerHTML = request.responseText;
        }
    }

    request.open("POST", "http://localhost/ПИС_Курсовая/php/print_dateRequests.php");
    request.onreadystatechange = reqReadyStateChange;
    request.send(formData);
})
//==================== Update ====================

function UpdatePeople(){
    $('.update_people').on('click', function(e){
        $('.people-update').show();

        let formData = new FormData();

        formData.append('ID', $(this).attr('int'));
        
        $('#people-update-btn').on('click', function(e){

            formData.append('Name', $('#name_update').val());
            formData.append('Surname', $('#surname_update').val());

            var request = new XMLHttpRequest();

            function reqReadyStateChange() {
                if(request.readyState == 4 && request.status == 200){
                    ShowPeople();
                    $('.people-update').hide();
                }
            }

            request.open("POST", "http://localhost/ПИС_Курсовая/php/update_people.php");
            request.onreadystatechange = reqReadyStateChange;
            request.send(formData);
        })
    })
}
function UpdatePlace(){
    $('.update_place').on('click', function(e){
        $('.place-update').show();

        let formData = new FormData();

        formData.append('ID', $(this).attr('int'));
        
        $('#place-update-btn').on('click', function(e){

            formData.append('PlaceName', $('#placeName_update').val());
            formData.append('AdminBodyID', $('#adminBodyID_update').val());

            var request = new XMLHttpRequest();

            function reqReadyStateChange() {
                if(request.readyState == 4 && request.status == 200){
                    ShowPlace();
                    $('.place-update').hide();
                }
            }

            request.open("POST", "http://localhost/ПИС_Курсовая/php/update_place.php");
            request.onreadystatechange = reqReadyStateChange;
            request.send(formData);
        })
    })
}
function UpdateAdmin(){
    $('.update_admin').on('click', function(e){
        $('.admin-update').show();

        let formData = new FormData();

        formData.append('ID', $(this).attr('int'));
        
        $('#admin-update-btn').on('click', function(e){

            formData.append('AdminBodyName', $('#adminBodyName_update').val());
            formData.append('Province', $('#province_update').val());

            var request = new XMLHttpRequest();

            function reqReadyStateChange() {
                if(request.readyState == 4 && request.status == 200){
                    ShowAdmin();
                    $('.admin-update').hide();
                }
            }

            request.open("POST", "http://localhost/ПИС_Курсовая/php/update_admin.php");
            request.onreadystatechange = reqReadyStateChange;
            request.send(formData);
        })
    })
}
function UpdateRequest(){
    $('.update_request').on('click', function(e){
        $('.request-update').show();

        let formData = new FormData();

        formData.append('ID', $(this).attr('int'));
        
        $('#request-update-btn').on('click', function(e){

            formData.append('DateReq', $('#dateReq_update').val());
            $('#dateReq_update').val('');
            formData.append('DateOfFishing', $('#dateOfFishing_update').val());
            $('#dateOfFishing_update').val('');
            formData.append('Permission', $('#permission_update').val());
            $('#permission_update').val('');
            formData.append('PersonID', $('#personID_update').val());
            $('#personID_update').val('');
            formData.append('PlaceID', $('#placeID_update').val());
            $('#placeID_update').val('');

            var request = new XMLHttpRequest();

            function reqReadyStateChange() {
                if(request.readyState == 4 && request.status == 200){
                    ShowRequests();
                    $('.request-update').hide();
                }
            }

            request.open("POST", "http://localhost/ПИС_Курсовая/php/update_request.php");
            request.onreadystatechange = reqReadyStateChange;
            request.send(formData);
        })
    })
}


//==================== Delete ====================

function DeletePeople(){
    $('.delete_people').on('click', function(e){
        
        let formData = new FormData();

        formData.append('ID', $(this).attr('int'));

        var request = new XMLHttpRequest();

        function reqReadyStateChange() {
            if(request.readyState == 4 && request.status == 200){
                ShowPeople();
            }
        }

        request.open("POST", "http://localhost/ПИС_Курсовая/php/delete_people.php");
        request.onreadystatechange = reqReadyStateChange;
        request.send(formData);
    })
}
function DeletePlace(){
    $('.delete_place').on('click', function(e){
        
        let formData = new FormData();

        formData.append('ID', $(this).attr('int'));

        var request = new XMLHttpRequest();

        function reqReadyStateChange() {
            if(request.readyState == 4 && request.status == 200){
                ShowPlace();
            }
        }

        request.open("POST", "http://localhost/ПИС_Курсовая/php/delete_place.php");
        request.onreadystatechange = reqReadyStateChange;
        request.send(formData);
    })
}
function DeleteAdmin(){
    $('.delete_admin').on('click', function(e){
        
        let formData = new FormData();

        formData.append('ID', $(this).attr('int'));

        var request = new XMLHttpRequest();

        function reqReadyStateChange() {
            if(request.readyState == 4 && request.status == 200){
                ShowAdmin();
            }
        }

        request.open("POST", "http://localhost/ПИС_Курсовая/php/delete_admin.php");
        request.onreadystatechange = reqReadyStateChange;
        request.send(formData);
    })
}
function DeleteRequest(){
    $('.delete_request').on('click', function(e){
        
        let formData = new FormData();

        formData.append('ID', $(this).attr('int'));

        var request = new XMLHttpRequest();

        function reqReadyStateChange() {
            if(request.readyState == 4 && request.status == 200){
                ShowRequests();
            }
        }

        request.open("POST", "http://localhost/ПИС_Курсовая/php/delete_request.php");
        request.onreadystatechange = reqReadyStateChange;
        request.send(formData);
    })
}