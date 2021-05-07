
function MyAjaxFunc( uid) {
  var xhttp = new XMLHttpRequest();
 
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      res = JSON.parse(this.responseText);
    
      var maincontainer = document.getElementById("main-container");
      var name;
      var l = Object.keys(res).length;
      console.log(l);
      var f;
      var e;
      var a;
      var r;
   

      for (i = 0; i < l; i++) {
        f = document.createElement("div");
        f.innerHTML = `
        <div class="news-grid-container">
            <p>News Id :</p>
            <p>`+res[i].id+`</p>
            <p>Reporter Id :</p>
            <p>`+res[i].rid+`</p>
            <p>Editor Id :</p>
            <p>`+res[i].eid+`</p>
            <p>News Status :</p>
            <p>`+res[i].status+`</p>
            <p>Category :</p>
            <p>`+res[i].catagory+`</p>
            <p>Publish Date :</p>
            <p>`+res[i].date+`</p>
            <img id="news-img" ; src="`+res[i].images+`" alt="" srcset="">

            <p>News Title :</p>
            <p class="news-title">`+res[i].title+`</p>
            <p>News Body :</p>
            <p class="news-title">`+res[i].body+`</p>
            <br>
        </div>
        `;

        maincontainer.appendChild(f);
      }
    }
	
  };

  xhttp.open("GET", "http://localhost//wt-final-project/reporter/control/getsentnews.php?id="+uid, true);
 
  xhttp.send();
}