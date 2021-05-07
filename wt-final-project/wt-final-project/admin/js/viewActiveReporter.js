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
       
  
        for (i = 0; i < l; i++) {
          f = document.createElement("div");
          f.innerHTML = `
          <form action="../controller/verifysignup.php" method="post">
          <div class="grid-container-1">
              <div>
                  <p>`+res[i].id+`</p>
              </div>
              <div>
                  <p>`+res[i].name+`</p>
              </div>
              <div>
                  <p>`+res[i].email+`</p>
              </div>
              <div>
                  <p>`+res[i].gender+`</p>
              </div>
              <div>
                  <p>`+res[i].dob+`</p>
              </div>
              <div id="sub-grid">
                      <input class="btn-action btn-reject" type="submit" value="delete" name="delete">
                      <input class="btn-action btn-reject" type="submit" value="disable" name="disable">
              </div>
          </div>
          <div>
          </div>
          <input type="hidden" name="email" value="` + res[i].email + `">
          <input type="hidden" name="table" value="reporter">
          
          <input type="hidden" name="redirect_path" value="../view/viewActiveReporter.php">
          </form>
          `;
  
          maincontainer.appendChild(f);
        }
      }
    };
  
    xhttp.open(
      "POST",
      "/wt-final-project/admin/controller/getActiveReporter.php",
      true
    );
  
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("fname=henry&lname=Ford");
  }