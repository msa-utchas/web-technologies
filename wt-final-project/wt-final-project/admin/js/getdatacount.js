
function adminsignuprequestcount() {
    var xhttp = new XMLHttpRequest();
    var res;
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            res = JSON.parse(this.responseText);
            console.log(res);
            var l = Object.keys(res).length;
            let adminRequest = document.getElementById("admin-req-count");
            adminRequest.innerHTML = l.toString();
        }
    };

    xhttp.open(
        "POST",
        "/wt-final-project/admin/controller/signuprequestdata.php",
        true
    );

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}

function editorsignuprequestcount() {
    var xhttp = new XMLHttpRequest();
    var res;
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            res = JSON.parse(this.responseText);
            console.log(res);
            var l = Object.keys(res).length;
            let adminRequest = document.getElementById("editor-req-count");
            adminRequest.innerHTML = l.toString();
        }
    };

    xhttp.open(
        "POST",
        "/wt-final-project/admin/controller/editorsignuprequestdtata.php",
        true
    );

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}


function reportersignuprequestcount() {
    var xhttp = new XMLHttpRequest();
    var res;
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            res = JSON.parse(this.responseText);
            console.log(res);
            var l = Object.keys(res).length;
            let reporterRequest = document.getElementById("reporter-req-count");
            reporterRequest.innerHTML = l.toString();
        }
    };

    xhttp.open(
        "POST",
        "/wt-final-project/admin/controller/reportersignuprequestdtata.php",
        true
    );

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}

function userCount() {
    var xhttp = new XMLHttpRequest();
    var res;
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            res = JSON.parse(this.responseText);
            console.log(res);
            var l = Object.keys(res).length;
            let usercount = document.getElementById("user-count");
            usercount.innerHTML = l.toString();
        }
    };

    xhttp.open(
        "POST",
        "/wt-final-project/admin/controller/getalluser.php",
        true
    );

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}


function activeAdminCount() {
    var xhttp = new XMLHttpRequest();
    var res;
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            res = JSON.parse(this.responseText);
            console.log(res);
            var l = Object.keys(res).length;
            let usercount = document.getElementById("ac-admin-c");
            usercount.innerHTML = l.toString();
        }
    };

    xhttp.open(
        "POST",
        "/wt-final-project/admin/controller/getActiveAdmin.php",
        true
    );

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}


function activeReporterCount() {
    var xhttp = new XMLHttpRequest();
    var res;
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            res = JSON.parse(this.responseText);
            console.log(res);
            var l = Object.keys(res).length;
            let usercount = document.getElementById("ac-reporter-count");
            usercount.innerHTML = l.toString();
        }
    };

    xhttp.open(
        "POST",
        "/wt-final-project/admin/controller/getActiveReporter.php",
        true
    );

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}


function activeEditorCount() {
    var xhttp = new XMLHttpRequest();
    var res;
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            res = JSON.parse(this.responseText);
            console.log(res);
            var l = Object.keys(res).length;
            let usercount = document.getElementById("ac-editor-count");
            usercount.innerHTML = l.toString();
        }
    };

    xhttp.open(
        "POST",
        "/wt-final-project/admin/controller/getActiveEditor.php",
        true
    );

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}

function newsCount() {
    var xhttp = new XMLHttpRequest();
    var res;
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            res = JSON.parse(this.responseText);
            console.log(res);
            var l = Object.keys(res).length;
            let usercount = document.getElementById("total-news-count");
            usercount.innerHTML = l.toString();
        }
    };

    xhttp.open(
        "POST",
        "/wt-final-project/admin/controller/getAllNews.php",
        true
    );

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}

function reportCount() {
    var xhttp = new XMLHttpRequest();
    var res;
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            res = JSON.parse(this.responseText);
            console.log(res);
            var l = Object.keys(res).length;
            let usercount = document.getElementById("total-report-count");
            usercount.innerHTML = l.toString();
        }
    };

    xhttp.open(
        "POST",
        "/wt-final-project/admin/controller/getAllReport.php",
        true
    );

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}


function MyAjaxFunc() {
    adminsignuprequestcount();
    editorsignuprequestcount();
    reportersignuprequestcount();
    userCount();
    activeAdminCount();
    activeReporterCount();
    activeEditorCount();
    newsCount();
    reportCount();
}


