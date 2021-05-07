function MyAjaxFunc(){
  var xhttp =new XMLHttpRequest();
  var res;
  xhttp.onreadystatechange =function (){
    if(this.readyState==4 && this.status==200){
      res=  JSON.parse(this.responseText);
      console.log(res);
      var maincontainer= document.getElementById("maincontainer");
      var name;
      var length = Object.keys(res).length;
      console.log(length);

      var f, d, a, r;

      for(var i=0; i<length; i++)
      {
        f=document.createElement("form");
        f.setAttribute("method","post");
        f.setAttribute("action","../control/verifynews.php");

        d=document.createElement("input");
        d.setAttribute("type","text");
        d.setAttribute("name","id");
        d.setAttribute("value",res[i].id);

        a=document.createElement("input");
        a.setAttribute("type","submit");
        a.setAttribute("name","approve");
        a.setAttribute("value","approve");

        r=document.createElement("input");
        r.setAttribute("type","submit");
        r.setAttribute("name","reject");
        r.setAttribute("value","reject");

        f.appendChild(d);
        f.appendChild(a);
        f.appendChild(r);

        maincontainer.appendChild(f);
      }
      
    }
  };

  xhttp.open("POST","/NewsDaily/editor/control/newsrequestdata.php",true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();
}