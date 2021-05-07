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

      for (i = 0; i < l; i++) {
        f = document.createElement("div");
        f.innerHTML = `
          <form action="../controller/verifysignup.php" method="post">
          <div class="grid-container-1">
              <div>
                  <p>`+ res[i].id + `</p>
              </div>
              <div>
                  <p>`+ res[i].status + `</p>
              </div>
              <div>
                  <p>`+ res[i].catagory + `</p>
              </div>
              <div>
                  <p>`+ res[i].eid + `</p>
              </div>
              <div>
                  <p>`+ res[i].date + `</p>
              </div>
              <div id="sub-grid">
                      <input class="btn-action btn-reject" type="submit" value="remove" name="remove">
                      <input class="btn-action btn-reject" type="submit" value="view" name="view">
              </div>
          </div>
          <div>
          </div>
          <input type="hidden" name="id" value="` + res[i].id + `">
          <input type="hidden" name="table" value="news">
          
          <input type="hidden" name="redirect_path" value="../view/showAllNews.php">
          </form>
          `;

        maincontainer.appendChild(f);
      }
    }
  };

  xhttp.open(
    "POST",
    "/wt-final-project/admin/controller/getAllNews.php",
    true
  );

  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("fname=henry&lname=Ford");
}