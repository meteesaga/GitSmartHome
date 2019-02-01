<!DOCTYPE html>
<html lang="en">
<head>
  <title>Smart Farm</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdn.netpie.io/microgear.js"></script>
  <!-- <script src="raphael-2.1.4.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
  <!-- <script src="justgage.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/justgage/1.2.9/justgage.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://www.google.com/jsapi"></script>
  <!-- <script src="weather-icons.min.css"></script> -->
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>

  <!-- (Optional) Latest compiled and minified JavaScript translation files -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/i18n/defaults-*.min.js"></script>
  <script src="https://www.gstatic.com/firebasejs/3.6.6/firebase.js"></script>
  <script src="https://cdn.firebase.com/js/client/2.4.2/firebase.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDL-cRJzy6WSOSsAymv_8WurQmtO54NXzA"></script>
  <!-- <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.1.min.js"></script> -->

  <style>

    * {
      box-sizing: border-box;
    }
/*.header {
  border: 1px;
  border: 1px;
  padding: 15px;
}*/
.row::after {
  content: "";
  clear: both;
  display: block;
}
.box{
  width: 100px;
  border: 2px solid gray;
  padding: 10px;
  margin: 2px;
}
.gauge {
  width: 300;
  height: 200px;
  /*border: 1px solid black;*/
}
p {
  padding: 3px;
  font-family: 'Arial';
}
.onoffswitch {
  position: relative; width: 86px;
  -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}
.onoffswitch-checkbox {
  display: none;
}
.onoffswitch-label {
  display: block; overflow: hidden; cursor: pointer;
  border: 2px solid #999999; border-radius: 50px;
}
.onoffswitch-inner {
  display: block; width: 200%; margin-left: -100%;
  transition: margin 0.3s ease-in 0s;
}
.onoffswitch-inner:before, .onoffswitch-inner:after {
  display: block; float: left; width: 50%; h
  eight: 24px; padding: 0; line-height: 24px;
  font-size: 18px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
  box-sizing: border-box;
}
.onoffswitch-inner:before {
  content: "ON ---";
  padding-left: 12px;
  background-color: #34A7C1; color: #FFFFFF;
}
.onoffswitch-inner:after {
  content: "OFF";
  padding-right: 12px;
  background-color: #EEEEEE; color: #999999;
  text-align: right;
}
.onoffswitch-switch {
  display: block; width: 31px; margin: -3.5px;
  background: #FFFFFF;
  position: absolute; top: 0; bottom: 0;
  right: 58px;
  border: 2px solid #999999; border-radius: 50px;
  transition: all 0.3s ease-in 0s; 
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
  margin-left: 0;
}
.onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
  right: 0px; 
}
.style1 {color: #808080}


</style>
</head>
<body>

<div class="container-fluid">
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">
      Dashboard <small>My Home</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active">
        <i class="fa fa-dashboard"></i> Dashboard
      </li>
    </ol>
  </div>
</div>

<div class="row">
  <div class="col-lg-3 col-md-6">
    <div class = "panel panel-success">
      <div class = "panel-heading">
        <h3 class = "panel-title"><center>SENSOR 1</center></h3>
      </div>
      <div class = "panel-body">
        <div id="Tem" class="gauge"></div>
        <div id="Hum" class="gauge"></div>
      </div>
      <div class="panel-footer">
        <a><span class="pull-left" data-toggle="collapse" data-target="#demo">View Details</span></a>
        <div id="demo" class="collapse">
          <p></p><br>
          <p id="ip_cluster1"></p>
          <p id="mac_cluster1"></p>
          <p id="ssid_cluster1"></p>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>

  </div>
  <div class="col-lg-3 col-md-6">
    <div class = "panel panel-info">
      <div class = "panel-heading">
        <h3 class = "panel-title"><center>SENSOR 2</center></h3>
      </div>

      <div class = "panel-body">
        <div id="Tem2" class="gauge"></div>
        <div id="Hum2" class="gauge"></div>
      </div>

      <div class="panel-footer">
        <a><span class="pull-left" data-toggle="collapse" data-target="#demo1">View Details</span></a>
        <!-- <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Simple collapsible</button> -->
        <div id="demo1" class="collapse">
   <p></p><br>
   <p id="ip_cluster2"></p>
   <p id="mac_cluster2"></p>
   <p id="ssid_cluster2"></p>

 </div>
 <div class="clearfix"></div>
</div>
</div>
</div>

</div>

<script>
  var Tem = new JustGage({
    id: 'Tem',
    value: 0,
    min: 0,
    max: 100,
    title: 'Temperature',
    symbol: ' C',
    pointer: true,
    pointerOptions: {
      toplength: -15,
      bottomlength: 10,
      bottomwidth: 12,
      color: '#8e8e93',
      stroke: '#ffffff',
      stroke_width: 3,
      stroke_linecap: 'round'
    },
    gaugeWidthScale: 0.65,
    counter: true,  
  });
  var Hum = new JustGage({
    id: 'Hum',
    value: 0,
    min: 0,
    max: 100,
    title: 'Humidity',
    symbol: ' %RH',
    pointer: true,
    pointerOptions: {
      toplength: -15,
      bottomlength: 10,
      bottomwidth: 12,
      color: '#8e8e93',
      stroke: '#ffffff',
      stroke_width: 3,
      stroke_linecap: 'round'
    },
    gaugeWidthScale: 0.65,
    counter: true,
  });

  var Tem2 = new JustGage({
    id: 'Tem2',
    value: 0,
    min: 0,
    max: 100,
    title: 'Temperature',
    symbol: ' C',
    pointer: true,
    pointerOptions: {
      toplength: -15,
      bottomlength: 10,
      bottomwidth: 12,
      color: '#8e8e93',
      stroke: '#ffffff',
      stroke_width: 3,
      stroke_linecap: 'round'
    },
    gaugeWidthScale: 0.65,
    counter: true,  
  });
  var Hum2 = new JustGage({
    id: 'Hum2',
    value: 0,
    min: 0,
    max: 100,
    title: 'Humidity',
    symbol: ' %RH',
    pointer: true,
    pointerOptions: {
      toplength: -15,
      bottomlength: 10,
      bottomwidth: 12,
      color: '#8e8e93',
      stroke: '#ffffff',
      stroke_width: 3,
      stroke_linecap: 'round'
    },
    gaugeWidthScale:0.65,
    counter: true,

  });
</script>
<script>
  const APPID     = "apphtml";
  const APPKEY    = "WTZoHpfz0XFftFN";
  const APPSECRET = "IFn4cjhlZm7QfvWKpRVp3AHRK";
  var microgear = Microgear.create({
    gearkey: APPKEY,
    gearsecret: APPSECRET
  });
  microgear.on('message',function(topic,msg) {
    document.getElementById("data").innerHTML = msg;
    if(msg=="C11"){
      document.getElementById('myonoffswitch').checked = true;
    }else if(msg=="C10"){
      document.getElementById('myonoffswitch').checked = false;
    }else if(msg=="statuswaterON"){
      document.getElementById('toggle-statuswater').checked = true;
      toggleOnBystatuswater();
    }else if(msg=="statuswaterOFF"){
      document.getElementById('toggle-statuswater').checked = true;
      toggleOffBystatuswater();
    }else if(msg=="Controlconnect"){
      connect[0] = "control";
      // connect.push("control");
      numofconnect();
    }else{
      var split_msg = msg.split(",");
      if(split_msg[0]=='predic'){
        document.getElementById("predicpy").innerHTML = "Weather: "+split_msg[1]  
        document.getElementById("Timepredicpy").innerHTML = " TIME(Y-M-D): "+split_msg[2]  
        document.getElementById("RequestTime").innerHTML = " Request Time: "+split_msg[3] 

      }
      if(typeof(split_msg[3])!='undefined' && split_msg[3]=='cluster_2'){
        Tem.refresh(split_msg[0]);
        Hum.refresh(split_msg[1]);
        Tem2.refresh(split_msg[0]);
        Hum2.refresh(split_msg[1]);
        document.getElementById("ssid_cluster1").innerHTML = "SSID: " + split_msg[7]
        document.getElementById("ip_cluster1").innerHTML = "IP ADDRESS: " + split_msg[8]
        document.getElementById("mac_cluster1").innerHTML = "MAC ADDRESS: " + split_msg[9]
        document.getElementById("voltage_cluster1").innerHTML = "Voltage node1 : " + split_msg[2]

        connect[10] = "cluster1";
        // connect.push("slave1");
        numofconnect();
        document.getElementById("control_node1").innerHTML = "Temp Control : " + split_msg[5];
        if(split_msg[6]=='1')
          document.getElementById("status_control1").innerHTML = "Mode : Automation"
        else 
          document.getElementById("status_control1").innerHTML = "Mode : Manual" 
      }
      if(typeof(split_msg[3])!='undefined' && split_msg[3]=='cluster_1'){
        Tem2.refresh(split_msg[0]);
        Hum2.refresh(split_msg[1]);
        Tem.refresh(split_msg[0]);
        Hum.refresh(split_msg[1]);
        document.getElementById("ssid_cluster2").innerHTML = "SSID: " + split_msg[7]  
        document.getElementById("ip_cluster2").innerHTML = "IP ADDRESS: " + split_msg[8]
        document.getElementById("mac_cluster2").innerHTML = "MAC ADDRESS: " + split_msg[9]
        document.getElementById("voltage_cluster2").innerHTML = "Voltage Node2 : " + split_msg[2]
        document.getElementById("control_cluster2").innerHTML = "Temp Control : " +  split_msg[5];
        connect[1] = "cluster2";
        // connect.push("slave2");
        numofconnect();
        if(split_msg[6]=='1')
          document.getElementById("status_control2").innerHTML = "Automation"
        else 
          document.getElementById("status_control2").innerHTML = "Manual"  
      }
      if(typeof(split_msg[3])!='undefined' && split_msg[3]=='node_3'){
        connect[2] = "slave3";
        // connect.push("slave3");
        numofconnect();
      }
      if(typeof(split_msg[3])!='undefined' && split_msg[3]=='node_4'){
        connect[3] = "slave4";
        // connect.push("slave4");
        numofconnect();  
      }
      if(typeof(split_msg[3])!='undefined' && split_msg[3]=='node_5'){
        connect[4] = "slave5";
        // connect.push("slave5");
        numofconnect();  
      }
      if(typeof(split_msg[3])!='undefined' && split_msg[3]=='node_6'){
        connect[5] = "slave6";
        // connect.push("slave6");
        numofconnect();  
      }
      if(typeof(split_msg[3])!='undefined' && split_msg[3]=='node_7'){
        connect[6] = "slave7";
        // connect.push("slave7");
        numofconnect();  
      }
      if(typeof(split_msg[3])!='undefined' && split_msg[3]=='node_8'){
        connect[7] = "slave8";
        // connect.push("slave8");
        numofconnect();  
      }
      if(typeof(split_msg[3])!='undefined' && split_msg[3]=='node_1'){
        connect[8] = "slave1";
        // connect.push("cluster1");
        numofconnect();  
      }
      if(typeof(split_msg[3])!='undefined' && split_msg[3]=='node_2'){
        connect[9] = "slave2"; 
        // connect.push("cluster2");
        numofconnect();  
      }             
    }
  });
  microgear.on('connected', function() {
    microgear.setAlias('webapp');    /* alias can be renamed anytime with this function */
    document.getElementById("data").innerHTML = "Now I am connected with netpie...";
  });
  microgear.on('present', function(event) {
    console.log(event);
  });
  microgear.on('absent', function(event) {
    console.log(event);
  });
  microgear.connect(APPID);
</script>
<script>
  function toggleOnByInput() {
    $('#toggle-trigger').prop('checked', true).change()
    console.log("on");
  }
  function toggleOffByInput() {
    $('#toggle-trigger').prop('checked', false).change()
    console.log("off");
      // document.getElementById("turn_off").disabled = true;
    }
  function toggleOnBystatuswater() {
    $('#toggle-statuswater').prop('checked', true).change()
    console.log("on");
  }
  function toggleOffBystatuswater() {
    $('#toggle-statuswater').prop('checked', false).change()
    console.log("off");
  } 
  function numofconnect(){

    console.log(connect);
    var i;
    var text = "";
    for(i=0;i<connect.length;i++){
      if(connect[i] != "0"){
        numberofconnect++;
        console.log(connect[i]);
        text += connect[i] + " ";
      }
    }
    // for (i = 1;(i < connect.length)&&(cmp<=connect.length); i++) {
    //     if(connect[i] != connect[cmp]){
    //       text += connect[i] + " ";
    //       numberofconnect++;

    //     }
    //   cmp++;
    // }
    // numberofconnect = connect.length;
    // for (i =1; i < connect.length; i++) {
    //     for(j=(i-1);j>=0;j--){
    //           console.log("i= ,j="+ i+j +connect[i]+connect[j]);
    //           if(connect[i]==connect[j]){
    //             console.log("DDDDD");
    //             duplicate++;
    //             j=-1;
    //             console.log("duplicate" +duplicate);
    //           }   
    //     if(duplicate = 0){
    //     numberofconnect = i+1;
    //     text += connect[i] + " ";
    //   }
    //     }
    // }

    console.log(numberofconnect);
    document.getElementById("numconnect").innerHTML = numberofconnect 
    numberofconnect =0;
    document.getElementById("presentationconnect").innerHTML = text 
  }
  function clearnumofconnect(){
    connect = ["0","0","0","0","0","0","0","0","0","0","0","0"];
    numberofconnectclear = 0;    
    console.log(connect);
    document.getElementById("numconnect").innerHTML = numberofconnectclear 
  }
  setInterval("clearnumofconnect()", 300000);
  </script>
  <canvas id="canvas_id" width="200" height="200"></canvas>
  <div id="data"></div>
  <div id="data2"></div>
  <div id="control_node1"></div>
  <div id="control_node2"></div>
  <div id="status_control1"></div>
  <div id="status_control2"></div>
  <div id="Temperature"></div>
  <div id="Humidity"></div>
  <div id="Temperature2"></div>
  <div id="Humidity2"></div>
  <div id="ssid_node1"></div>
  <div id="ssid_node2"></div>
  <div id="ssid_cluster_1"></div>
  <div id="ip_node1"></div>
  <div id="ip_node2"></div>
  <div id="ip_cluster1"></div>
  <div id="mac_node1"></div>
  <div id="mac_node2"></div>
  <div id="mac_cluster1"></div>
  <div id="voltage_node1"></div>
  <div id="voltage_node2"></div>
  <div id="voltage_cluster1"></div>
  <div id="predicpy"></div>
  <div id="Timepredicpy"></div>
  <div id="RequestTime"></div>
  <script>
    document.addEventListener("DOMContentLoaded", function(event) {
      document.getElementById('turn_on').addEventListener('click', function() {

        microgear.chat('control',"ON");
  });
      document.getElementById('turn_off').addEventListener('click', function() {

        microgear.chat('control',"OFF");
      });
      document.getElementById('confirm_tem').addEventListener('click', function() {

        var input = document.getElementById("temcontrol");
        console.log(temcontrol.value);
        microgear.chat('cluster1',"temcontrol"+temcontrol.value);
        microgear.chat('cluster2',"temcontrol"+temcontrol.value);
        // microgear.chat('Sensor',temcontrol.value);
        // microgear.chat('Sensor2',temcontrol.value);
        // microgear.chat('slave1',temcontrol.value);
        // microgear.chat('slave2',temcontrol.value);
        // microgear.chat('slave3',temcontrol.value);
        // microgear.chat('slave4',temcontrol.value);
        // microgear.chat('slave5',temcontrol.value);
        // microgear.chat('slave6',temcontrol.value);
        // microgear.chat('slave7',temcontrol.value);
        // microgear.chat('slave8',temcontrol.value);
    // microgear.chat('prediction',"GetValue");
    microgear.chat('control',temcontrol.value);
  });
      document.getElementById('btnweather').addEventListener('click', function() {
    // var inputcity = document.getElementById("city");
    var inputcity = document.getElementById("inlineFormCity");
    var strUser = inputcity.options[inputcity.selectedIndex].value;
    console.log(strUser);
    microgear.chat('prediction',"GetValue:"+strUser);
    microgear.chat('location_gps_pressweb',"GetValue:"+strUser);
    console.log("location_gps_pressweb");
    // microgear.chat('prediction',"GetValue");
  });
    document.getElementById('findlocation').addEventListener('click', function() {
    // var inputcity = document.getElementById("city");
    microgear.chat('prediction',"Getlocation");
    console.log("Getlocation");
    // microgear.chat('prediction',"GetValue");
  });
    });  
    function switchPress(){

      if(document.getElementById('myonoffswitch').checked == true){
    // microgear.chat("node2","auto_on");
    microgear.chat('Sensor2',"auto_on");
    microgear.chat('Sensor',"auto_on");
    microgear.chat('slave1',"auto_on");
    microgear.chat('slave2',"auto_on");
    microgear.chat('control',"auto_on");
    microgear.chat('cluster1',"auto_on");
    microgear.chat('cluster2',"auto_on");
    microgear.chat('slave3',"auto_on");
    microgear.chat('slave4',"auto_on");
    microgear.chat('slave5',"auto_on");
    microgear.chat('slave6',"auto_on");
    microgear.chat('slave7',"auto_on");
    microgear.chat('slave8',"auto_on");
    document.getElementById("turn_on").disabled = true;
    document.getElementById("turn_off").disabled = true;
    document.getElementById("confirm_tem").disabled = false;

  }else if(document.getElementById('myonoffswitch').checked == false){
      // microgear.chat("node2","auto_off");
      microgear.chat('Sensor2',"auto_off");
      microgear.chat('Sensor',"auto_off");
      microgear.chat('slave1',"auto_off");
      microgear.chat('slave2',"auto_off");
      microgear.chat('control',"auto_off");
      microgear.chat('cluster1',"auto_off");
      microgear.chat('cluster2',"auto_off");
      microgear.chat('slave3',"auto_off");
      microgear.chat('slave4',"auto_off");
      microgear.chat('slave5',"auto_off");
      microgear.chat('slave6',"auto_off");
      microgear.chat('slave7',"auto_off");
      microgear.chat('slave8',"auto_off");
      document.getElementById("turn_on").disabled = false;
      document.getElementById("turn_off").disabled = false;
      document.getElementById("confirm_tem").disabled = true;
    }
  }
</script>  
</body>
</html>


