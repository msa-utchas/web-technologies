function getNews() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
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
                  
                  <p>Category :</p>
                  <p>`+res[i].catagory+`</p>
    
                  <img id="news-img" ; src="`+res[i].images+`" alt="" srcset="">
                  <p>Publish Date :</p>
                  <p>`+res[i].date+`</p>
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
    xhttp.open("POST", "/wt-final-project/newsdaily/controller/getNews.php", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("fname=henry&lname=Ford");

}