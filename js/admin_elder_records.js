
function Elders_Health_records() {
    var Elder_ID = "97";
    $.ajax({
        url: "PHP/admin_elder_records.php",
        method: "post",
        data: "Elders_Health_records=" + Elder_ID,
    }).done(function (result) {
        console.log(result);
        //console.log(result2);
        result = JSON.parse(result);
        //result2 = JSON.parse(result2);
        console.log(result);
        //console.log(result2);

        $('#Elders_health_records').empty();
        $('#Elders_health_records').append("<thead></thead><tr><th>Elder's name</th><th>Age</th><th>Sugar Level <br>(mg/dL)</th><th>Pressure Level<br> (SBP)</th><th>Body Temp.<br>( °C )</th><th>BMI</th><th>Record Date</th></tr></thead><tbody>");

        result.forEach(function (result) {
            $('#Elders_health_records').append('<tr><td>' + result.first_name + '</td><td>' + result.age + '</td><td>' + result.sugar_level + '</td><td>' + result.pressure_level + '</td><td>' + result.body_temp + '</td><td>' + result.BMI + '</td><td>' + result.input_date + '</td>'+ updateBtn(result.nic) +'</tr>');
        })
        $('#Elders_health_records').append('</tbody>');
    });
}

function updateBtn(str) {
        var temp = "";
        if (str != "0") {
          temp = '<td><a href="/eldercare/admin_update.html?recID='+str+'"><button type="button" class="btn btn-sm btn-gradient-success">Update</button></a></td>';
        }
        return temp;
}

function Elders_Update_records(elderNIC) {
    console.log(elderNIC);
    $.ajax({
        url: "PHP/admin_elder_records.php",
        method: "post",
        data: "ElderID=" + elderNIC,
    }).done(function (result) {
        console.log(result);
        result = JSON.parse(result);

        console.log(result);

        var elderNIC = result[0].nic;
        var fname = result[0].first_name;
        var lname = result[0].last_name;
        var fullname = fname+" ".concat(lname)
        console.log(fullname);
        document.getElementById("userName").innerHTML = fullname;
        document.getElementById("elderNIC").innerHTML = "NIC : "+ elderNIC;

        /*document.getElementById("txtDocEmail").value = result[0].email;
        document.getElementById("txtMedicalRegID").value = result[0].medicalRegID;
        document.getElementById("txtDocNIC").value = result[0].nic;
        document.getElementById("txtDocPhone").value = result[0].phone;*/

        $('#personal_data').empty();
        $('#personal_data').append("<thead></thead><tr><th>Elder's Name</th><th>Record Date</th><th>Sugar Level (mg/dL)</th><th>Pressure Level (SBP)</th><th>Body Temp.( °C )</th><th>BMI</th></tr></thead><tbody>");

        result.forEach(function (result) {
            $('#personal_data').append('<tr><td>' + result.first_name + '</td><td>' + result.input_date + '</td><td>' + result.sugar_level + '</td><td>' + result.pressure_level + '</td><td>' + result.body_temp + '</td><td>' + result.BMI + '</td></tr>');
        })
        $('#personal_data').append('</tbody>');
    });
}

function getElderRecord(elderNiC, sugarLevel, pressureLevel, bodyTemp, BMI) {
    $.ajax({
        url: "PHP/upload.php",
        method: "post",
        data: "addRecordElderNIC=" + elderNiC +'&sugarL=' +sugarLevel + '&pressureL=' +pressureLevel + '&bodyT=' +bodyTemp + '&BMI=' +BMI
    }).done(function (feedback) {
        resultfeed = JSON.parse(feedback);
        console.log(resultfeed);
        if( resultfeed[0] == '1')
        {
            alert("This person has Diabetes"); //Diabetes
        }
        if(resultfeed[1] == '1')
        {
            alert("This person has low blood pressure");  //low pressure
        }else if(resultfeed[1] == '2')
        {
            alert("This person has high blood pressure");   //high pressure
        }
        if(resultfeed[2] == '1')
        {
            alert("This person has fever");
        }
        alert("Record Updated Successfully!")
        location.href = "\admin_health_records.html";
    });
}

function getElder_ID() {
    return localStorage.getItem("DID");
}

function getUserName() {
    return localStorage.getItem("Name");
}
function getAdminID() {
    return localStorage.getItem("AdminID");
}

function getAdminUserName() {
    return localStorage.getItem("AdminUsername");
}

function getelderNIC()
{
    return localStorage.getItem("AdultNIC");
}