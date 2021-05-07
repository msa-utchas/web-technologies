function MyAjaxFunc() {
    var xhttp = new XMLHttpRequest();
    var res;
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        res = JSON.parse(this.responseText);
        console.log(res);
        var maincontainer = document.getElementById("main-container");
        var name;
        var l = Object.keys(res).length;
        console.log(l);
        var f;
        var e;
        var a;
        var r;
        for (var i = 0; i < l; i++) {
          name = document.createElement("p");
          name.innerHTML = res[i].nid;
          name.classList.add("name1");
          maincontainer.appendChild(name);
        }
  
        for (i = 0; i < l; i++) {
          f = document.createElement("div");
          f.innerHTML = `
          <form action="../controller/verifysignup.php" method="post">
          <input type="text" name="email" value ="` + res[i].report + `">
          <input type="submit" value="approve" name="approve">
          <input type="submit" value="reject" name="reject">
          </form>
          `;
  
          maincontainer.appendChild(f);
        }
      }
    };
  
    xhttp.open(
      "POST",
      "/wt-final-project/admin/controller/getAllReport.php",
      true
    );
  
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("fname=henry&lname=Ford");
  }