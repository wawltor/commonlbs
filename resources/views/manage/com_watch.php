<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="百度地图,百度地图API，百度地图自定义工具，百度地图所见即所得工具" />
<meta name="description" content="百度地图API自定义地图，帮助用户在可视化操作下生成百度地图" />
<title>百度地图API自定义地图</title>
<!--引用百度地图API-->
<style type="text/css">
    html,body{margin:0;padding:0;}
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
</style>

<link href="../bootstrap/bootstrap-theme.css" rel="stylesheet" type="text/css" />
<link href="../bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../bootstrap/bootstrap-select.css" rel="stylesheet" type="text/css" />
<link href="../css/demo.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=pDDXwvEkCu1uMLZNZqGwBdpE"></script>
<script type="text/javascript" src="http://api.map.baidu.com/library/GeoUtils/1.2/src/GeoUtils_min.js"></script>
<script type="text/javascript" src="../bootstrap/jquery.min.js"></script>
<script type="text/javascript" src="../bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/bootstrap-select.js"></script>

<script type="text/javascript" src="/scripts/handle.js"></script>


</head>

<body onload="refresh_data()">
  <!--百度地图容器-->
  <h1>社区管理&gt事件分类</h1>
  <div>
  <div style="width:680px;height:480px;border:#ccc solid 1px;margin:1em;float:left" id="dituContent"></div>
  <div style="width:380px;height:480px;border:#ccc solid 1px;margin:1em;float:right">
  <div style="margin:0.5em">
  		<a style="text-decoration:none">待处理事件：<span id="remain_count" style="color:red"></span>  待分类事件：<span id="remain_cate" style="color:red"></span></a>
    	<button type="button" class="btn btn-info" onclick="refresh_data()" style="float:right">刷新</button>
  	
  </div>
  <hr/>
  <div id="list_event" style="height:350px;margin:0.5em;border:1px #ccc solid;overflow-y:auto">
	  
  </div>
  </div>
  </div>
  <div class="modal fade" id="myClassy"  role="dialog" tabindex="-1"
			aria-labelledby="myModalLabel" aria-hidden="true">
	   <div class="modal-dialog">
			   		
	      <div class="modal-content">
	         <div class="modal-body">
	         		<div class="modal-header">
	         		<button type="button" class="close" 
              		 data-dismiss="modal" aria-hidden="true">
                  		&times;
            		</button>
		            <h4 class="modal-title" id="myModalLabel">
		               	事件分类窗口
		            </h4>
         			</div>
	            	<div id="list_content" class="modal-body"></div>
	            	<hr>
	            	<div>
	            		<a style="text-decoration:none">一级分类：</a><select id="first_classy" class="selectpicker" data-width="auto" style="float:left" onchange="getChange()">
							<option value=1 >公用设施类</option>
				           <option value=2 >道路交通类</option>
				           <option value=3 >市容环境类</option>
				           <option value=4 >园林绿化类</option>
				           <option value=5 >房屋土地类</option>
				           <option value=6 >扩展部件类 </option>
							</select>
						<a style="text-decoration:none">二级分类：</a>
						<select id="second_classy" class="selectpicker" data-width="auto" style="float:left">
							<option value="水、电、气、热">水、电、气、热</option>
							<option value="井盖问题">井盖问题</option>
							<option value="下水道问题">下水道问题</option>
							<option value="设备损坏">设备损坏</option>
							<option value="其他">其他</option>
						</select>
						<button class="btn btn-info" style="float:right" onclick="submit_cate()">确认分类</button>
						
	            	</div>
	            	
	         </div>
	      </div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
</div>  
  
  
</body>
<script type="text/javascript">
    //创建和初始化地图函数：
    
   
    
    function initMap(){
        createMap();//创建地图
        setMapEvent();//设置地图事件
        addMapControl();//向地图添加控件
       // addCover(116.361303,39.973305,116.367928,39.963918,1);
       // addCover(116.367712,39.973364,116.377342,39.964074,2);
    	myCover();
    
    }
    
    //创建地图函数：
    function createMap(){
        var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        var point = new BMap.Point(116.372595,39.963987);//定义一个中心点坐标
        map.centerAndZoom(point,15);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    }
    
    //地图事件设置函数：
    function setMapEvent(){
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
        
 

       
    }
    
    //地图控件添加函数：
    function addMapControl(){
        //向地图中添加缩放控件
	var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
	map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
	var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
	map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
	var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
	map.addControl(ctrl_sca);
    }
    
    function addCover(x1,y1,x2,y2,color){//添加矩形
    var pStart = new BMap.Point(x1,y1);
	var pEnd = new BMap.Point(x2,y2);
//	map.centerAndZoom("北京",15);
if(color==1){
	var polygon = new BMap.Polygon([
  	new BMap.Point(pStart.lng,pStart.lat),
  	new BMap.Point(pEnd.lng,pStart.lat),
  	new BMap.Point(pEnd.lng,pEnd.lat),
  	new BMap.Point(pStart.lng,pEnd.lat)], {strokeColor:"red", strokeWeight:2, strokeOpacity:0.6});
  	}else{
  	var polygon = new BMap.Polygon([
  	new BMap.Point(pStart.lng,pStart.lat),
  	new BMap.Point(pEnd.lng,pStart.lat),
  	new BMap.Point(pEnd.lng,pEnd.lat),
  	new BMap.Point(pStart.lng,pEnd.lat)], {strokeColor:"blue", strokeWeight:2, strokeOpacity:0.6});
  	}
	map.addOverlay(polygon);
    }
    
    
    
    
    function myCover(){
			   var polygon_beiyou = new BMap.Polygon([
			//abckj
			  new BMap.Point(116.361316,39.972514),
			  new BMap.Point(116.363544,39.973329),
			  new BMap.Point(116.367497,39.973281),
			  new BMap.Point(116.367901,39.96397),
			  new BMap.Point(116.361882,39.963763)
			], {strokeColor:"red", strokeWeight:4, strokeOpacity:0.5,fillOpacity:0.3});
			  map.addOverlay(polygon_beiyou);
			  
			  
			  var polygon_beishi = new BMap.Polygon([
			//cdek
			  new BMap.Point(116.367497,39.973281),
			  new BMap.Point(116.376632,39.973854),
			  new BMap.Point(116.377558,39.963929),
			  new BMap.Point(116.367901,39.96397)
			], {strokeColor:"green", strokeWeight:4, strokeOpacity:0.5,fillOpacity:0.3});
			map.addOverlay(polygon_beishi);
			  
			
			  var polygon_wenhuiyuan = new BMap.Polygon([
			   //efghij
			  new BMap.Point(116.377558,39.963929),
			  new BMap.Point(116.378052,39.956877),
			  new BMap.Point(116.36711,39.953545),
			  new BMap.Point(116.363409,39.953711),
			  new BMap.Point(116.3619,39.957403),
			  new BMap.Point(116.361882,39.963763),
			  new BMap.Point(116.367901,39.96397)
			], {strokeColor:"purple", strokeWeight:4, strokeOpacity:0.5,fillOpacity:0.3});
			map.addOverlay(polygon_wenhuiyuan);
			
			
			  var polygon_xinjie = new BMap.Polygon([
			   //lmed
			  new BMap.Point(116.386801,39.974241),
			  new BMap.Point(116.385472,39.96426),
			  new BMap.Point(116.377558,39.963929 ),
			  new BMap.Point(116.376632,39.973854)
			], {strokeColor:"blue", strokeWeight:4, strokeOpacity:0.5,fillOpacity:0.3});
			map.addOverlay(polygon_xinjie);
			
			var polygon_jishuitan = new BMap.Polygon([
			   //mnopfe
			  new BMap.Point(116.385472,39.96426),
			  new BMap.Point(116.385795,39.958011),
			  new BMap.Point(116.383891,39.955108),
			  new BMap.Point(116.378501,39.954859),
			  new BMap.Point(116.378052,39.956877),
			  new BMap.Point(116.377558,39.963929)
			], {strokeColor:"red", strokeWeight:4, strokeOpacity:0.5,fillOpacity:0.3});
			map.addOverlay(polygon_jishuitan);
			
			
			var polygon_zhengfa = new BMap.Polygon([
			   //qrsjw
			  new BMap.Point(116.351682,39.973115),
			  new BMap.Point(116.352401,39.968097),
			  new BMap.Point(116.354557,39.963866),
			  new BMap.Point(116.361882,39.963763),
			  new BMap.Point(116.361348,39.973267)
			], {strokeColor:"blue", strokeWeight:4, strokeOpacity:0.5,fillOpacity:0.3});
			map.addOverlay(polygon_zhengfa);
			
			
			  var polygon_mingguang = new BMap.Polygon([
			//stij
			  new BMap.Point(116.354557,39.963866),
			  new BMap.Point(116.358437,39.956234),
			  new BMap.Point(116.3619,39.957403),
			  new BMap.Point(116.361882,39.963763)
			], {strokeColor:"green", strokeWeight:4, strokeOpacity:0.5,fillOpacity:0.3});
			map.addOverlay(polygon_mingguang);

    
    }
    
    
    initMap();//创建和初始化地图
</script>
</html>