function loadElderList() {
    var Elder_ID = getElder_ID();
    $.ajax({
        url: "PHP/elders_data.php",
        method: "post",
        data: "loadElder=" + Elder_ID,
    }).done(function (result) {
        console.log(result);
        //console.log(result2);
        result = JSON.parse(result);
        //result2 = JSON.parse(result2);
        console.log(result);
        //console.log(result2);

        $('#elders_health').empty();
        $('#elders_health').append("<thead></thead><tr><th>Elder's name</th><th>NIC</th><th>Age</th><th>Sugar Level<br> (mg/dL)</th><th>Pressure Level<br> (SBP)</th><th>Body Temp.<br>( °C )</th><th>BMI</th><th></th></tr></thead><tbody>");

        result.forEach(function (result) {
            $('#elders_health').append('<tr><td>' + result.first_name + " " + result.last_name + '</td><td>' + result.nic + '</td><td>' + result.age + '</td><td>' + result.sugar_level + '</td><td>' + result.pressure_level + '</td><td>' + result.body_temp + '</td><td>' + result.BMI + '</td>' + updateElderListBtn(result.nic) + '</tr>');
        })
        $('#elders_health').append('</tbody>');

    });
}

function updateElderListBtn(str) {
    var temp = "";
    if (str != "0") {
        temp = '<td><a href="/ElderCareWeb/doctor_health_records_graph.html?elderNIC='+str+'" ><button type="button" onclick="loadElderReport()" class="btn btn-sm btn-gradient-success">See more</button></a></td>';
    }
    return temp;
}

function loadCriticalElder() {
    var Elder_ID = getElder_ID();
    $.ajax({
        url: "PHP/elders_data.php",
        method: "post",
        data: "criticalElders=" + Elder_ID,
    }).done(function (result) {
        console.log(result);
        //console.log(result2);
        result = JSON.parse(result);
        //result2 = JSON.parse(result2);
        console.log(result);
        //console.log(result2);

        $('#critical_table').empty();
        $('#critical_table').append("<thead></thead><tr><th>Elder Name</th><th>NIC</th><th>Age</th><th>Sugar Level<br> (mg/dL)</th><th>Pressure Level<br> (SBP)</th><th>Body Temp.<br>( °C )</th><th>BMI</th><th>Record Date</th></tr></thead><tbody>");

        result.forEach(function (result) {
            $('#critical_table').append('<tr><td>' + result.first_name + '</td><td>' + result.nic + '</td><td>' + result.age + '</td><td>' + result.sugar_level + '</td><td>' + result.pressure_level + '</td><td>' + result.body_temp + '</td><td>' + result.BMI + '</td><td>' + result.input_date + '</td></tr>');
        })
        $('#critical_table').append('</tbody>');


        /*document.getElementById("txtDocName").value = result[0].D_name;
        document.getElementById("txtDocEmail").value = result[0].email;
        document.getElementById("txtMedicalRegID").value = result[0].medicalRegID;
        document.getElementById("txtDocNIC").value = result[0].nic;
        document.getElementById("txtDocPhone").value = result[0].phone;*/
    });
}

function getElder_ID() {
    return localStorage.getItem("DID");
}

function getUserName() {

    return localStorage.getItem("Name");
}