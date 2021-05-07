function MyAjaxFunc() {
    var xhttp = new XMLHttpRequest();
    var res;
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        res = JSON.parse(this.responseText);
        console.log(res);
        var maincontainer = document.getElementById("main-container");
        var l = Object.keys(res).length;
        console.log(l);
        var d;

        for (i = 0; i < l; i++) {
          d = document.createElement("div");
          d.innerHTML = `
          <form action="../control/viewpendingnewscheck.php" method="post" > 
          <div class="header-container">
          <div class="">
          <p>`+ res[i].id +`</p>
          </div>
          <div class="">
          <p>`+ res[i].rid +`</p>
          </div>
          <div class="">
          <p>` + res[i].title + `<p>
          </div>
          <div class="">
          <p>` + res[i].catagory + `</p>
          </div>
          <div class="view">
          <input type="submit" value="view" name="view" >
          </div>
          <input type="hidden" name="id" id="id" value ="`+ res[i].id +`">
          <input type="hidden" name="rid" id="rid" value ="`+ res[i].rid +`">
          </div>
          
          </form>
          `;

          //console.log(res[i].id);

          maincontainer.appendChild(d);
        }
      }
    };

    xhttp.open("POST", "/wt-final-project/editor/control/getpendingnews.php", true);
  
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
  }