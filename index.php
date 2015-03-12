<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>Erich Zbinden Hallenturnier 2015</title> 
<script type="text/javascript" src="etc/config.js"></script>
<script>

var debug = false;
var timer=15;
var count=timer;
var i=0;
var webPageToShow = [];

setInterval(openUrl, timer * 1000); // Wait 10 seconds
setInterval(buildArray,5000);

function fadeOut(el, duration) {
  var step = 10 / duration;
  var opacity = 1;
  function next() {
    if (opacity <= 0) { 
	  //el.style.opacity = 1;
	  return; 
	}
    el.style.opacity = ( opacity -= step );
    setTimeout(next, 10);
	console.log('fadeOut opacity=' + opacity);
  }
  next();
}

function fadeIn(el, duration){
  var step = 10 / duration;
  var opacity = 0;
  function next() {
    if (opacity >= 1) { 
	  //el.style.opacity = 1;
	  return; 
	}
    el.style.opacity = ( opacity += step );
    setTimeout(next, 10);
	console.log('fadeIn opacity=' + opacity);
  }
  next();
}

function openUrl(){
   console.log('i=' + i + ' = ' + webPageToShow[i]);
   if (i>=webPageToShow.length){
     i=0;
   }
   var iframe = document.getElementById('myframe');
   
   //fadeOut(iframe,1000);
   
   iframe.src = webPageToShow[i];  
   
   //fadeIn(iframe,1000);
   //iframe.style.opacity = 1;
   
   if (debug){
     document.getElementById('debug').innerHTML = webPageToShow[i]; 	 
   }
 
   i++;
   return false;
   
}

function buildArray(){
  // check if time is ready to show
  console.log('buildArray');
  var webPageToShowNew = [];
  for (var i=0;i<webpageArray.length;i++){
    var start = webpageArray[i][0];
    var end   = webpageArray[i][1];
    var now   = new Date();
    var nowHours = now.getHours();
    var nowMinutes = now.getMinutes();
    var nowInMin = (nowHours) * 60 + nowMinutes;
    
    var startInMin = calcMin(start);
    var endInMin = calcMin(end);
    console.log('nowInMin=' + nowInMin+' startInMin='+startInMin+' endInMin='+endInMin);
    if (nowInMin>=startInMin && nowInMin<=endInMin){
      console.log('shown: ' + webpageArray[i][2]);
      webPageToShowNew.push(webpageArray[i][2]);
    }else{
      console.log('blocked: ' + webpageArray[i][2]);
    }
  }
  webPageToShow = webPageToShowNew;
  console.log(webPageToShow);
}

function calcMin(time){
  var timeArr = time.split(':');
  var result = (parseInt(timeArr[0]) * 60) + parseInt(timeArr[1]);
  console.log('time=' + time + ' result=' + result);
  return result;
}

</script>

</head>
<body>
  <p id='debug'></p>
  <iframe seamless="seamless" style="overflow:hidden;" scrolling="no" height='100%' width='100%' id='myframe' src="http://localhost/joomla_hallenturnier" />
</body>
</html>