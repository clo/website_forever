<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>-Erich Zbinden Hallenturnier 2015</title> 
<script>

var i=0;
var webpageArray = [
  // from, to,    ,url
  ['05:00','22:00','http://localhost/joomla_hallenturnier/index.php/impressionen-june'],
  ['05:00','22:00','http://localhost/joomla_hallenturnier/index.php/impressionen-junf'],
  ['06:50','16:10','http://localhost/joomla_hallenturnier/index.php/spielbetrieb/spielbetrieb-vorrunde'],
  ['13:45','15.00','http://localhost/joomla_hallenturnier/index.php/spielbetrieb/rangliste-vorrunde'],
  ['16:20','17:00','http://localhost/joomla_hallenturnier/index.php/spielbetrieb/spielbetrieb-final'],
  ['16:20','18:00','http://localhost/joomla_hallenturnier/index.php/schlussrangliste'],
  ['05:00','13:00','http://localhost/joomla_hallenturnier/index.php/essensplan'],
];
var webPageToShow = [];

setInterval(openUrl, 30000); // Wait 10 seconds
setInterval(buildArray,1000);
function openUrl(){
   
   //buildArray();
   //if (!webPageToShow){
   //  return false;
   //}
   
   console.log('i=' + i + ' = ' + webPageToShow[i]);
   if (i>=webPageToShow.length){
     i=0;
   }
   var iframe = document.getElementById("myframe");
   iframe.src = webPageToShow[i];  
	  
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
  <iframe seamless="seamless" style="overflow:hidden;" scrolling="no" height='100%' width='100%' id='myframe' src="http://localhost/joomla_hallenturnier" />
</body>
</html>