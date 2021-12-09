

function Admin_req() {
    var Admin_ID = getAdminID();
    $.ajax({
        url: "PHP/admin_requests.php",
        method: "post",
        data: "Admin_req=" + Admin_ID,
    }).done(function (result) {
        console.log(result);
        //console.log(result2);
        result = JSON.parse(result);
        //result2 = JSON.parse(result2);
        console.log(result);
        //console.log(result2);

        $('#doctor_req').empty();
        $('#doctor_req').append("<thead></thead><tr><th>Doctor Name</th><th>Contact No</th><th>Address</th><th>NIC</th><th>Email</th><th>MBBS ID</th></tr></thead><tbody>");

        result.forEach(function (result) {
            $('#doctor_req').append('<tr><td>' + result.Name + '</td><td>' + result.mobile + '</td><td>' + result.address + '</td><td>' + result.nic + '</td><td>' + result.email + '</td><td>' + result.mbbsid + '</td>' + updateBtn(result.nic) + '</tr>');

            $('#doctor_req').append('</tbody>');
        })

        
        /*document.getElementById("DID").value = result[0].DID;
        document.getElementById("txtDocName").value = result[0].D_name;
        document.getElementById("txtDocEmail").value = result[0].email;
        document.getElementById("txtMedicalRegID").value = result[0].medicalRegID;
        document.getElementById("txtDocNIC").value = result[0].nic;
        document.getElementById("txtDocPhone").value = result[0].phone;*/
    });
}

function doctor_Update(Doc_ID) {
    //var Elder_ID = getElder_ID();
    console.log(Doc_ID);
    $.ajax({
        url: "PHP/admin_requests.php",
        method: "post",
        data: "DocID=" + Doc_ID
    }).done(function () {
        alert("Doctor Approved Successfully!!");
        location.href = "\admin_notifications.html";
    });
}

function updateBtn(str) {
    var temp = "";
    if (str != "0") {
        temp = '<td><a href="/eldercare/admin_notifications.html?recID='+str+'" ><button type="button" onclick="getDocID()" class="btn btn-sm btn-gradient-success">Approve</button></a></td>';
    }
    return temp;
}

function getAdminID() {
    return localStorage.getItem("AdminID");
}

function getAdminUserName() {
    return localStorage.getItem("AdminUsername");
}