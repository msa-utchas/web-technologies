function MyAjaxFunc() {
    var xhttp = new XMLHttpRequest();
    var res;
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        res = JSON.parse(this.responseText);
        console.log(res);
        var title = document.getElementById("title");
        var body = document.getElementById("body");
        var image = document.getElementById("image");
        var l = Object.keys(res).length;
        console.log(l);
        var d;
        for (i = 0; i < l; i++) {
          title.innerHTML=res[i].title;
          body.innerHTML=res[i].body;
          image.setAttribute.add("src",res[i].images);
        }
      }
    };

    xhttp.open("POST", "/wt-final-project/editor/control/getnews.php", true);
  
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
  }

  