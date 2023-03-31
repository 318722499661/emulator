
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Emulator - SuperNintendo</title>
<link rel="stylesheet" href="emulators.css">
<script src="../js/common.js" type="text/javascript"></script>
</head>
<body>
		<script>
			var container_width;
			var container_height;

			function loadRomIntoVD(){
				if(!parent || !parent.g_lastdata2 || !parent.g_lastdata2.data)return;

				startFileSystem();
				var dataView=new Uint8Array(parent.g_lastdata2.data);
				FS.createDataFile("/","game.smc",dataView,true,false);

				FS.createFolder("/home/web_user", "retroarch", true, true);
				FS.createFolder("/home/web_user/retroarch", "userdata", true, true);

				var emptyValue = "scroll_lock";

				var config = "";

				config += "rgui_browser_directory = /\n";

				var opt=get_optdata();				
				var opt2={};
				if(opt['shortcuts'] && opt['shortcuts']['Super Nintendo']) opt2=opt['shortcuts']['Super Nintendo'];
				var s1=opt2['A, B, X, Y, L, R'] || '';
				var arr1=s1.split(",");

				// SETS THE KEY FOR THE START AND SELECT BUTTON
				config += "input_player1_start = "+trim(opt2['START'] || "e").toLowerCase()+"\n";
				config += "input_player1_select = "+trim(opt2['SELECT'] || "r").toLowerCase()+"\n";

				// SETS THE KEYS FOR THE BUTTONS A, B, X, Y, L, R
				config += "input_player1_a = "+trim(arr1[0] || "x")+"\n";
				config += "input_player1_b = "+trim(arr1[1] || "z")+"\n";
				config += "input_player1_x = "+trim(arr1[2] || "s")+"\n";
				config += "input_player1_y = "+trim(arr1[3] || "a")+"\n";
				config += "input_player1_l = "+trim(arr1[4] || "w")+"\n";
				config += "input_player1_r = "+trim(arr1[5] || "q")+"\n";

				// SETS THE KEYS FOR UNWANTED FUNCTIONS
				config += "input_toggle_fast_forward = " + emptyValue + "\n";
				config += "input_hold_fast_forward = " + emptyValue + "\n";
				config += "input_toggle_slowmotion = " + emptyValue + "\n";
				config += "input_hold_slowmotion = " + emptyValue + "\n";
				config += "input_save_state = " + emptyValue + "\n";
				config += "input_load_state = " + emptyValue + "\n";
				config += "input_toggle_fullscreen = " + emptyValue + "\n";
				config += "input_exit_emulator = " + emptyValue + "\n";
				config += "input_state_slot_increase = " + emptyValue + "\n";
				config += "input_state_slot_decrease = " + emptyValue + "\n";
				config += "input_rewind = " + emptyValue + "\n";
				config += "input_movie_record_toggle = " + emptyValue + "\n";
				config += "input_pause_toggle = " + emptyValue + "\n";
				config += "input_frame_advance = " + emptyValue + "\n";
				config += "input_reset = " + emptyValue + "\n";
				config += "input_shader_next = " + emptyValue + "\n";
				config += "input_shader_prev = " + emptyValue + "\n";
				config += "input_cheat_index_plus = " + emptyValue + "\n";
				config += "input_cheat_index_minus = " + emptyValue + "\n";
				config += "input_cheat_toggle = " + emptyValue + "\n";
				config += "input_screenshot = " + emptyValue + "\n";
				config += "input_audio_mute = " + emptyValue + "\n";
				config += "input_osk_toggle = " + emptyValue + "\n";
				config += "input_netplay_game_watch = " + emptyValue + "\n";
				config += "input_enable_hotkey = " + emptyValue + "\n";
				config += "input_volume_up = " + emptyValue + "\n";
				config += "input_volume_down = " + emptyValue + "\n";
				config += "input_overlay_next = " + emptyValue + "\n";
				config += "input_disk_eject_toggle = " + emptyValue + "\n";
				config += "input_disk_next = " + emptyValue + "\n";
				config += "input_disk_prev = " + emptyValue + "\n";
				config += "input_grab_mouse_toggle = " + emptyValue + "\n";
				config += "input_game_focus_toggle = " + emptyValue + "\n";
				config += "input_menu_toggle = " + emptyValue + "\n";
				config += "input_recording_toggle = " + emptyValue + "\n";
				config += "input_streaming_toggle = " + emptyValue + "\n";

				// PLAYER 1
				config += "input_player1_l2 = " + emptyValue + "\n";
				config += "input_player1_l3 = " + emptyValue + "\n";
				config += "input_player1_r2 = " + emptyValue + "\n";
				config += "input_player1_r3 = " + emptyValue + "\n";
				config += "input_player1_l_x_plus = " + emptyValue + "\n";
				config += "input_player1_l_x_minus = " + emptyValue + "\n";
				config += "input_player1_l_y_plus = " + emptyValue + "\n";
				config += "input_player1_l_y_minus = " + emptyValue + "\n";
				config += "input_player1_r_x_plus = " + emptyValue + "\n";
				config += "input_player1_r_x_minus = " + emptyValue + "\n";
				config += "input_player1_r_y_plus = " + emptyValue + "\n";
				config += "input_player1_r_y_minus = " + emptyValue + "\n";
				config += "input_player1_gun_trigger = " + emptyValue + "\n";
				config += "input_player1_gun_offscreen_shot = " + emptyValue + "\n";
				config += "input_player1_gun_aux_a = " + emptyValue + "\n";
				config += "input_player1_gun_aux_b = " + emptyValue + "\n";
				config += "input_player1_gun_aux_c = " + emptyValue + "\n";
				config += "input_player1_gun_start = " + emptyValue + "\n";
				config += "input_player1_gun_select = " + emptyValue + "\n";
				config += "input_player1_gun_dpad_up = " + emptyValue + "\n";
				config += "input_player1_gun_dpad_down = " + emptyValue + "\n";
				config += "input_player1_gun_dpad_left = " + emptyValue + "\n";
				config += "input_player1_gun_dpad_right = " + emptyValue + "\n";
				config += "input_player1_turbo = " + emptyValue + "\n";

				// PLAYER 2
				config += "input_player2_up = " + emptyValue + "\n";
				config += "input_player2_down = " + emptyValue + "\n";
				config += "input_player2_left = " + emptyValue + "\n";
				config += "input_player2_right = " + emptyValue + "\n";
				config += "input_player2_start = " + emptyValue + "\n";
				config += "input_player2_select = " + emptyValue + "\n";
				config += "input_player2_a = " + emptyValue + "\n";
				config += "input_player2_b = " + emptyValue + "\n";
				config += "input_player2_x = " + emptyValue + "\n";
				config += "input_player2_y = " + emptyValue + "\n";
				config += "input_player2_l = " + emptyValue + "\n";
				config += "input_player2_l2 = " + emptyValue + "\n";
				config += "input_player2_l3 = " + emptyValue + "\n";
				config += "input_player2_r = " + emptyValue + "\n";
				config += "input_player2_r2 = " + emptyValue + "\n";
				config += "input_player2_r3 = " + emptyValue + "\n";
				config += "input_player2_l_x_plus = " + emptyValue + "\n";
				config += "input_player2_l_x_minus = " + emptyValue + "\n";
				config += "input_player2_l_y_plus = " + emptyValue + "\n";
				config += "input_player2_l_y_minus = " + emptyValue + "\n";
				config += "input_player2_r_x_plus = " + emptyValue + "\n";
				config += "input_player2_r_x_minus = " + emptyValue + "\n";
				config += "input_player2_r_y_plus = " + emptyValue + "\n";
				config += "input_player2_r_y_minus = " + emptyValue + "\n";
				config += "input_player2_gun_trigger = " + emptyValue + "\n";
				config += "input_player2_gun_offscreen_shot = " + emptyValue + "\n";
				config += "input_player2_gun_aux_a = " + emptyValue + "\n";
				config += "input_player2_gun_aux_b = " + emptyValue + "\n";
				config += "input_player2_gun_aux_c = " + emptyValue + "\n";
				config += "input_player2_gun_start = " + emptyValue + "\n";
				config += "input_player2_gun_select = " + emptyValue + "\n";
				config += "input_player2_gun_dpad_up = " + emptyValue + "\n";
				config += "input_player2_gun_dpad_down = " + emptyValue + "\n";
				config += "input_player2_gun_dpad_left = " + emptyValue + "\n";
				config += "input_player2_gun_dpad_right = " + emptyValue + "\n";
				config += "input_player2_turbo = " + emptyValue + "\n";

				// PLAYER 3
				config += "input_player3_up = " + emptyValue + "\n";
				config += "input_player3_down = " + emptyValue + "\n";
				config += "input_player3_left = " + emptyValue + "\n";
				config += "input_player3_right = " + emptyValue + "\n";
				config += "input_player3_start = " + emptyValue + "\n";
				config += "input_player3_select = " + emptyValue + "\n";
				config += "input_player3_a = " + emptyValue + "\n";
				config += "input_player3_b = " + emptyValue + "\n";
				config += "input_player3_x = " + emptyValue + "\n";
				config += "input_player3_y = " + emptyValue + "\n";
				config += "input_player3_l = " + emptyValue + "\n";
				config += "input_player3_l2 = " + emptyValue + "\n";
				config += "input_player3_l3 = " + emptyValue + "\n";
				config += "input_player3_r = " + emptyValue + "\n";
				config += "input_player3_r2 = " + emptyValue + "\n";
				config += "input_player3_r3 = " + emptyValue + "\n";
				config += "input_player3_l_x_plus = " + emptyValue + "\n";
				config += "input_player3_l_x_minus = " + emptyValue + "\n";
				config += "input_player3_l_y_plus = " + emptyValue + "\n";
				config += "input_player3_l_y_minus = " + emptyValue + "\n";
				config += "input_player3_r_x_plus = " + emptyValue + "\n";
				config += "input_player3_r_x_minus = " + emptyValue + "\n";
				config += "input_player3_r_y_plus = " + emptyValue + "\n";
				config += "input_player3_r_y_minus = " + emptyValue + "\n";
				config += "input_player3_gun_trigger = " + emptyValue + "\n";
				config += "input_player3_gun_offscreen_shot = " + emptyValue + "\n";
				config += "input_player3_gun_aux_a = " + emptyValue + "\n";
				config += "input_player3_gun_aux_b = " + emptyValue + "\n";
				config += "input_player3_gun_aux_c = " + emptyValue + "\n";
				config += "input_player3_gun_start = " + emptyValue + "\n";
				config += "input_player3_gun_select = " + emptyValue + "\n";
				config += "input_player3_gun_dpad_up = " + emptyValue + "\n";
				config += "input_player3_gun_dpad_down = " + emptyValue + "\n";
				config += "input_player3_gun_dpad_left = " + emptyValue + "\n";
				config += "input_player3_gun_dpad_right = " + emptyValue + "\n";
				config += "input_player3_turbo = " + emptyValue + "\n";

				// PLAYER 4
				config += "input_player4_up = " + emptyValue + "\n";
				config += "input_player4_down = " + emptyValue + "\n";
				config += "input_player4_left = " + emptyValue + "\n";
				config += "input_player4_right = " + emptyValue + "\n";
				config += "input_player4_start = " + emptyValue + "\n";
				config += "input_player4_select = " + emptyValue + "\n";
				config += "input_player4_a = " + emptyValue + "\n";
				config += "input_player4_b = " + emptyValue + "\n";
				config += "input_player4_x = " + emptyValue + "\n";
				config += "input_player4_y = " + emptyValue + "\n";
				config += "input_player4_l = " + emptyValue + "\n";
				config += "input_player4_l2 = " + emptyValue + "\n";
				config += "input_player4_l3 = " + emptyValue + "\n";
				config += "input_player4_r = " + emptyValue + "\n";
				config += "input_player4_r2 = " + emptyValue + "\n";
				config += "input_player4_r3 = " + emptyValue + "\n";
				config += "input_player4_l_x_plus = " + emptyValue + "\n";
				config += "input_player4_l_x_minus = " + emptyValue + "\n";
				config += "input_player4_l_y_plus = " + emptyValue + "\n";
				config += "input_player4_l_y_minus = " + emptyValue + "\n";
				config += "input_player4_r_x_plus = " + emptyValue + "\n";
				config += "input_player4_r_x_minus = " + emptyValue + "\n";
				config += "input_player4_r_y_plus = " + emptyValue + "\n";
				config += "input_player4_r_y_minus = " + emptyValue + "\n";
				config += "input_player4_gun_trigger = " + emptyValue + "\n";
				config += "input_player4_gun_offscreen_shot = " + emptyValue + "\n";
				config += "input_player4_gun_aux_a = " + emptyValue + "\n";
				config += "input_player4_gun_aux_b = " + emptyValue + "\n";
				config += "input_player4_gun_aux_c = " + emptyValue + "\n";
				config += "input_player4_gun_start = " + emptyValue + "\n";
				config += "input_player4_gun_select = " + emptyValue + "\n";
				config += "input_player4_gun_dpad_up = " + emptyValue + "\n";
				config += "input_player4_gun_dpad_down = " + emptyValue + "\n";
				config += "input_player4_gun_dpad_left = " + emptyValue + "\n";
				config += "input_player4_gun_dpad_right = " + emptyValue + "\n";
				config += "input_player4_turbo = " + emptyValue + "\n";

				// PLAYER 5
				config += "input_player5_up = " + emptyValue + "\n";
				config += "input_player5_down = " + emptyValue + "\n";
				config += "input_player5_left = " + emptyValue + "\n";
				config += "input_player5_right = " + emptyValue + "\n";
				config += "input_player5_start = " + emptyValue + "\n";
				config += "input_player5_select = " + emptyValue + "\n";
				config += "input_player5_a = " + emptyValue + "\n";
				config += "input_player5_b = " + emptyValue + "\n";
				config += "input_player5_x = " + emptyValue + "\n";
				config += "input_player5_y = " + emptyValue + "\n";
				config += "input_player5_l = " + emptyValue + "\n";
				config += "input_player5_l2 = " + emptyValue + "\n";
				config += "input_player5_l3 = " + emptyValue + "\n";
				config += "input_player5_r = " + emptyValue + "\n";
				config += "input_player5_r2 = " + emptyValue + "\n";
				config += "input_player5_r3 = " + emptyValue + "\n";
				config += "input_player5_l_x_plus = " + emptyValue + "\n";
				config += "input_player5_l_x_minus = " + emptyValue + "\n";
				config += "input_player5_l_y_plus = " + emptyValue + "\n";
				config += "input_player5_l_y_minus = " + emptyValue + "\n";
				config += "input_player5_r_x_plus = " + emptyValue + "\n";
				config += "input_player5_r_x_minus = " + emptyValue + "\n";
				config += "input_player5_r_y_plus = " + emptyValue + "\n";
				config += "input_player5_r_y_minus = " + emptyValue + "\n";
				config += "input_player5_gun_trigger = " + emptyValue + "\n";
				config += "input_player5_gun_offscreen_shot = " + emptyValue + "\n";
				config += "input_player5_gun_aux_a = " + emptyValue + "\n";
				config += "input_player5_gun_aux_b = " + emptyValue + "\n";
				config += "input_player5_gun_aux_c = " + emptyValue + "\n";
				config += "input_player5_gun_start = " + emptyValue + "\n";
				config += "input_player5_gun_select = " + emptyValue + "\n";
				config += "input_player5_gun_dpad_up = " + emptyValue + "\n";
				config += "input_player5_gun_dpad_down = " + emptyValue + "\n";
				config += "input_player5_gun_dpad_left = " + emptyValue + "\n";
				config += "input_player5_gun_dpad_right = " + emptyValue + "\n";
				config += "input_player5_turbo = " + emptyValue + "\n";

				// SETS THE VIDEO CONFIGURATION
				container_width = document.getElementById("container").offsetWidth;
				container_height = document.getElementById("container").offsetHeight;
				config += "video_vsync = true\n";
				config += "video_scale = 1\n";
				config += "video_window_x = " + container_width + "\n";
				config += "video_window_y = " + container_height + "\n";
				config += "aspect_ratio_index = 23\n";
				config += "custom_viewport_width = " + container_width + "\n";
				config += "custom_viewport_height = " + container_height + "\n";
				config += "custom_viewport_x = 0\n";
				config += "custom_viewport_y = 0\n";

				// SETS THE AUDIO LATENCY
				config += "audio_latency = 128\n";

				// HIDES THE NOTIFICATION MESSAGES
				config += "video_message_pos_x = -100\n";
				config += "video_message_pos_y = -100\n";
				config += "menu_enable_widgets = false\n";

				FS.createDataFile("/home/web_user/retroarch/userdata", "retroarch.cfg", config, true, true);
				Module.callMain(["-v","/game.smc"]);
				document.getElementById("canvas").width = container_width;
				document.getElementById("canvas").height = container_height;
			}

			var proc_load = function(){
				document.getElementById("container").style.display="block";
				setTimeout(function(){loadRomIntoVD();},100);
				document.addEventListener("click", parent.goBackButtonResetIncrement, false);
				document.addEventListener("dblclick", parent.goBackButtonResetIncrement, false);
				document.addEventListener("mousemove", parent.goBackButtonResetIncrement, false);
			}
			window.onerror = function (msg, url, lineNo, columnNo, error){
				setTimeout(function(){
					Module.callMain(["-v","/game.smc"]);

					document.getElementById("canvas").width = container_width;
					document.getElementById("canvas").height = container_height;
				}, 5000);
				return true;
			}
		</script>

<table id="loading" align=center style="font-size:13px; margin-top:40px;background: white;padding:3px;border:0px solid silver;-webkit-box-shadow: 0 0 10px #999;	-moz-box-shadow: 0 0 10px #999; box-shadow: 0 0 10px #999;"><tr>
<td><img src="../images/wait.gif">
<td>Loading library... Please wait a moment. <span id="gd_progress"></span>
</table>

<div id="container">
<canvas id="canvas" tabindex="1" onclick="this.focus()" oncontextmenu="event.preventDefault()"></canvas>
</div>

<script>
var Module = {
    noInitialRun: true,
    arguments: ["-v", "--menu"],
    preRun: [],
    postRun: function(){
		proc_loadend();
		proc_load();
		//console.log('end load');
	},
    print: (function() {})(),
    printErr: function(text) {},
    canvas: document.getElementById("canvas"),
    setStatus: function(text) {},
    totalDependencies: 0,
    monitorRunDependencies: function(left){}
	/*onFullScreen:function(s){
	}*/
};

function proc_volume(v){
	if(gainNode) gainNode.gain.value = v;
}
function get_optdata(){
	var s=getstorage('optdata');
	if(!s) s='{}';
	var a={};
	try{
		a=JSON.parse(s);
	}catch(err){
		a={};
	}
	if(!a)a={};
	return a;
}
function proc_loadend(){
	_getid('loading').style.display='none';
}
function proc_resize(){
	var ww=getWindowWidth();
	var wh=getWindowHeight();
	var a=_getid('canvas');
	if(a){
		a.style.width=ww+'px';
		a.style.height=wh+'px';
	}
}
function init(){
	function inject(s){
		var o = document.createElement('scri' + 'pt');
		o.setAttribute('src', s);
		o.setAttribute('type', 'text/javascript');
		document.body.appendChild(o);
	}
	window.onresize=proc_resize;

	function keydown(e){
		if(!e)e=window.event;
		if(e && e.keyCode==27){
			if(parent && parent.proc_full){
				parent.proc_full(false,true);
			}
		}
	}
	document.addEventListener("keydown", keydown, true);

  try{
	var gd_lastprogress=(new Date()).getTime();
	var xhr = new XMLHttpRequest();
	xhr.open("GET", 'SuperNintendo.wasm', true);
	xhr.responseType = "arraybuffer";
	xhr.onprogress=function(event){
		if(gd_lastprogress){
			var elaspetime = new Date();
			var dt=(elaspetime.getTime()-gd_lastprogress);
			if(dt<300)return;
			gd_lastprogress=elaspetime.getTime();
		}
		var a=event;
		var total=a.totalSize || a.total || 0;
		var current=a.position || a.loaded  || 0;
		var c=_getid('gd_progress');
		if(c) c.innerHTML='Downloading... ('+number_format(current)+'/'+number_format(total)+')';
	}
	xhr.onload = function(){
		if(xhr.status == 200){
			Module['wasmBinary']=xhr.response;
			//console.log(Module['wasmBinary']);
			var c=_getid('gd_progress');
			if(c) c.innerHTML='';
			inject('SuperNintendo.js?t=4');
			return;
		}
		proc_loadend();
		alert("Error (status) " + this.status + "("+this.statusText+") occurred while receiving the library.");
	}
	xhr.onerror=function(e){
		proc_loadend();
		alert("Error " + e.target.status + " occurred while receiving the library.");
	}
	xhr.send(null);
  }catch(err){
	proc_loadend();
	alert(err+'\n\nor This browser does not support. Please upgrade your browser.');
  }
}

init();
</script>

</body>
</html>