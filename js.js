function nam(){
    document.getElementById("fil").click();
    document.getElementById("fil").addEventListener("change",function(){
        var val=document.getElementById("fil").files;
        var marq=document.createElement("marquee");
        document.getElementById("sax").innerHTML="";
       if(val.length>2)
       document.getElementById("sax").style.justifyContent="start";
       for(var i=0;i<val.length;i++){
       marq.textContent+='|'+val[i].name;
       
       }
       document.getElementById("sax").appendChild(marq);
    })
}
var a=3;
function ses(){
    a++;
    if(Number.isInteger(a/2)==true){
    document.getElementById('subec').style.visibility="visible";
    }else{
        document.getElementById('subec').style.visibility="hidden";
    }
}
