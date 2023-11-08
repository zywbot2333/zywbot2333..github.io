<?php
/**
 ***************************************************************************
 * 小雪备忘录v1.0
 * 作者：雪落
 * 官方：https://xueluo.cn/xNote
 * 时间：2022-08-09
 ***************************************************************************
 * 数据库
 * db-title:私人备忘录
 * db-password:qwe123..
 * db-note:return array (0 =>array ('title' => '暗夜周卡卡密以及下载地址','content' => '<p>暗夜周卡登录卡密：ZKA4541A64B6F648109317309091262118_@n@_暗夜下载网盘：https://wwsa.lanzouj.com/s/anye666_@n@_网盘密码：123</p>',),1 =>array ('title' => 'NE下载网盘','content' => '<p>网盘地址：https://wwml.lanzouw.com/s/NEE_@n@_登录密码：123</p>',),2 =>array ('title' => 'NE账号密码 2023年11月6日06:44:03','content' => '<p>账号：cq1237 密码：cq1237</p>',),3 =>array ('title' => '小智上号器','content' => '<p>下载网盘：https://wwrm.lanzoub.com/b03f2mjtg</p>',),4 =>array ('title' => 'US缓存网盘','content' => '<p>下载地址：https://wwmx.lanzoum.com/b052ig10d  密码123</p>',),5 =>array ('title' => 'QQ截图独立版','content' => '<p>https://www.123pan.com/s/6InKVv-Pe0Kh.html</p>',),6 =>array ('title' => 'NE全隐藏缓存','content' => '<p>https://www.123pan.com/s/6InKVv-Xe0Kh.html</p>',),7 =>array ('title' => 'MTProto代理信息：','content' => '<p>当前状态：已安装 正在运行_@n@_IP：38.47.124.247_@n@_端口：6688_@n@_密钥：ee77dfddca3a436ad4b9a5a2e9d97c38e430346438303564333764663166383838623065316165656232373239336636382e636f6d_@n@__@n@__@n@_vmess://ewoidiI6ICIyIiwKInBzIjogIm5hbWVfMzguNDcuMTI0LjI0NyIsCiJhZGQiOiAiMzguNDcuMTI0LjI0NyIsCiJwb3J0IjogIjMxNTM1IiwKImlkIjogImIyZGQ5MjZkLTZhZTMtNDQ0Mi1iNGQ2LTVlYmExMjhiYmQ0NCIsCiJhaWQiOiAiMCIsCiJuZXQiOiAia2NwIiwKInR5cGUiOiAiZHRscyIsCiJob3N0IjogIiIsCiJwYXRoIjogIiIsCiJ0bHMiOiAiIgp9Cg==_@n@__@n@_订阅转换工具：https://convert.imgki.com/</p>',),8 =>array ('title' => '123云盘','content' => '<p>网址：https://www.123pan.com/login_@n@_账号：15777087288_@n@_密码：qwe123456</p>',),9 =>array ('content' => '<p>地址：http://soft.125.la/</p>','title' => '精易编程助手',),10 =>array ('title' => '大众网吧助手1.0','content' => '<p>下载地址：https://www.123pan.com/s/6InKVv-0e0Kh.html</p>',),11 =>array ('title' => '电脑激活工具','content' => '<p>下载地址：https://www.123pan.com/s/6InKVv-3t0Kh.html</p>',),12 =>array ('title' => 'BBC','content' => '<p>TK1F442368742045E3969C82407183EDCA_@n@__@n@_</p>',),13 =>array ('title' => 'R星','content' => '<p>下载地址：https://meier888.lanzoue.com/b04kqag2j_@n@_账号：cq123_@n@_卡密：TK4e92984989H0904065bfe14a2713ca</p>',),14 =>array ('content' => '<p>https://www.123pan.com/s/6InKVv-at0Kh.html</p>','title' => 'Webview2离线安装包',),15 =>array ('content' => '<p>898911868F8F8F4989EC878B7989B0BE0035D7BE_@n@_http://download.uupan.net/_@n@_https://wwrm.lanzoub.com/b03f2mjtg_@n@_</p>',),16 =>array ('title' => '服务器信息','content' => '<p>IP：_@n@_账号：root_@n@_密码：zRy9tPnfjHT43WD8</p>',),17 =>array ('title' => 'SSH工具','content' => '<p>https://www.terminal.icu/</p>',),);
 ***************************************************************************
 */
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('PRC');
session_start();
define('LOGIN', isset($_SESSION['login'])?$_SESSION['login']:0);
define('AJAX',(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower(trim($_SERVER['HTTP_X_REQUESTED_WITH']))=='xmlhttprequest'));
/**
 * 类型获取与转换
 * 说明：如果$data为数组类型，将转换所有数组值为$type
 * @param mixed $data 数据
 * @param string $type 转换类型，为空返回数据类型
 * @return mixed
 */
function type($data,$type=false){
	if(!isset($data) || $data===false || $data==='undefined' || (!$data && $data!==0 && $data!=='0') )return false;
	if(!$type)return gettype($data);
	if($type=='str' || $type=='string') {
		$data = (is_array($data) || is_object($data))?var_export($data,true):(string)$data;
	}elseif($type=='stripTags') {
		$data = strip_tags((string)$data);
	}elseif($type=='trim') {
		$data = trim((string)$data);
	}elseif($type=='int' || $type=='integer') {
		$data = intval($data);
	}elseif($type=='float'){
		$data = floatval($data);
	}elseif($type=='object'){
		if(is_object($data))return $data;
		if(is_array($data)){
			$data = json_decode(json_encode($data,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES));
		}elseif(is_string($data)){
			$data = json_decode($data);
		}else{
			$data = (object)$data;
		}
	}elseif($type=='array'){
		if(is_array($data))return $data;
		if(is_object($data)){
			$data = json_decode(json_encode($data,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES),true);
		}elseif(is_string($data)){
			$data = json_decode($data,true);
		}else{
			$data = (array)$data;
		}
	}elseif($type=='bool'){
		$data=trim($data);
		if($data=='true' || $data=='1'){
			$data=true;
		}elseif($data=='false' || $data=='null' || $data=='0'){
			$data=false;
		}else{
			$data=boolval($data);
		}
	}elseif($type=='json'){
		//第二个参数：转为Unicode编码| 
		$data=is_array($data)||is_object($data)?json_encode($data,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_NUMERIC_CHECK):false;
	}
	return isset($data)?$data:false;
}
/**
 * 获取URL上参数和$_GET参数
 * @param string|int $key 数据的KEY，为空将获取所有参数
 * @param string $type 数据转换类型，为空默认为字符串，有效值参考type方法
 * @param mixed $def 获取的get不存在的话，返回该设定数值
 * @return mixed
 */
function get($key=false,$type=false,$def=false){
	if($key===false)return $_GET;
	if(!isset($_GET[$key]))return $def!==false?$def:false;
	if(!$type)return $_GET[$key];
	return type($_GET[$key],$type);
}
/**
 ****************************************************************************
 * 功能：获取$_POST参数并安全转换类型
 * @param $key  {string}  数据的KEY，为空将获取所有参数
 * @param $type {string}      数据转换类型，为空默认为字符串，有效值参考type方法
 * @param $def  {mix}         获取的post不存在的话，默认返回该数值
 * @return mix
 ****************************************************************************
 */
function post($key=false,$type=false,$def=false){
	if($key===false)return $_POST;
	if(!isset($_POST[$key]))return $def!==false?$def:false;
	if(!$type)return $_POST[$key];
	return type($_POST[$key],$type);
}
/**
 * 打印消息
 * @param bool $error 状态代码或消息
 * @param mixed $data 如果为空，默认直接打印消息，多用于AJAX
 */
function ajax($error, $data=false) {
	echo json_encode(['error'=>$error, 'data'=>$data],JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_NUMERIC_CHECK);
	exit;
}
/**
 * 保存数据
 * @param string $name 数据库名称
 * @param string $content 内容
 */
function save($name,$content){
	$fileContent = file_get_contents(__FILE__);
	$pattern='/\s\*\sdb-'.$name.':.*/';
	$fileContent = preg_replace($pattern, ' * '.'db-'.$name.':'.$content, $fileContent);
	file_put_contents(__FILE__,$fileContent);
}

//页面路由
$page = get('page','string');

//获取当前文件内容
$fileContent = file_get_contents(__FILE__);

//获取数据库信息
preg_match_all('/\s\*\sdb-(.*?):(.*)/', $fileContent, $matches);
$db = [];
if(isset($matches[1]) && isset($matches[2])){
	foreach ($matches[1] as $k => $v) {
		$db[$v] = trim($matches[2][$k]);
	}
}

//页面路由
$page = post('page','string');
$type = post('type','string');

if(AJAX){
	//登录
	if($page == 'login'){
		$password = post('password','string',false);
		if($password === $db['password']){
			$_SESSION['login'] = 1;
			ajax(0,'登录成功');
		}
		ajax(1,'密码不正确');
	}
	//退出
	elseif($page == 'logout'){
		unset($_SESSION['login']);
	    unset($_SESSION);
	    session_destroy();
	    ajax(0,'注销成功');
	}
	//备忘录
	else{
		if(!LOGIN) ajax(1,'请登录');
		//设置
		if($page == 'setting'){
			$title = post('title','string',false);
			$password = post('password','string',false);
			if($title) save('title',$title);
			if($password) save('password',$password);
			ajax(0,'修改成功');
		}
		if($page == 'note'){
			//获取
			if($type == 'get'){
				$db['note'] = str_replace('_@n@_',"\n",$db['note']);
				ajax(0,eval($db['note']));
			}
			//更新
			elseif($type == 'update'){
				$key = post('key','int',false);
				$field = post('field','string',false);
				$content = post('content','string',false);
				if($key !== false && $field){
					$content = str_replace("\n", '_@n@_', $content);
					$db['note'] = eval($db['note']);
					$db['note'][$key][$field] = $content;
					$value = var_export(array_values($db['note']),true);
					$value = explode("\n", $value);
					foreach($value as &$v){
						$v = trim($v);
					}
					$value = implode('', $value);
					save('note','return '.$value.';');
					ajax(0,'保存成功');
				}
				ajax(1,'系统出错');
			}
			//删除
			elseif($type == 'delete'){
				$key = post('key','int',false);
				if($key !== false){
					$db['note'] = eval($db['note']);
					unset($db['note'][$key]);
					$value = var_export(array_values($db['note']),true);
					$value = explode("\n", $value);
					foreach($value as &$v){
						$v = trim($v);
					}
					$value = implode('', $value);
					save('note','return '.$value.';');
					ajax(0,'保存成功');
				}
				ajax(1,'系统出错');
			}
		}
	}
}
?>
<!DOCTYPE html>
<html lang="zh-Hans">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0"/>
	<title><?php echo $db['title'];?></title>
	<script src="https://iceui.cn/iceui/src/ice.js"></script>
	<style>
		*{margin:0;padding:0;font-family:Tahoma,Arial,sans-serif,'Microsoft YaHei';font-size:15px;box-sizing:border-box;}
		body{color:#373e4e;background:#f5f5f5;margin:50px 30px 150px;}
		*::selection{color:#fff;background-color:#4f9552;}
		input::-webkit-input-placeholder,textarea::-webkit-input-placeholder{color:#c5c5c5;}
		input{color:#525d76;resize:none;outline:none;height:25px;line-height:25px;padding:0 10px;box-sizing:border-box;border:1px solid #9f9f9f;vertical-align:middle;border-radius:2px;}
		a{color:#373e4e;}
		a:hover{color:#57af4c;text-decoration:underline;}
		.btn{color:white;background-color:#373e4e;padding:0 25px;border:none;height:25px;line-height:25px;margin:10px 0;display:inline-block;text-decoration:none!important;cursor:pointer;vertical-align:middle;border-radius:2px;}
		.btn:hover{color:#ffffff;background-color:#5e6779;}
		.title{text-align:center;font-size:27px;margin-bottom:20px;}
		.prompt{margin-top:10px;}
		.login{text-align:center;background:#fff;width:500px;margin:0 auto;padding:30px;border-radius:4px;}
		.note{width:40%;margin:auto;}
		.tip{margin:10px;background:#fff;border-radius:4px;padding:0 10px;position:relative;}
		.tip-title{padding:10px;padding-bottom:0;height:40px;display:flex;align-items:center;font-weight:bold;outline:none;-webkit-user-modify:read-write;-webkit-user-modify:read-write-plaintext-only;}
		.tip-title a{margin-left:10px;text-decoration:none;font-weight:normal;}
		.tip-title a:first-child{margin-left:auto;}
		.tip-close{position:absolute;right:20px;top:15px;cursor:pointer;}
		.tip-content{padding:10px;padding-top:0;color:#444;outline:none;-webkit-user-modify:read-write;white-space:pre-wrap;-webkit-user-modify:read-write-plaintext-only;word-break: break-all;}
		.tip-content p{margin:3px 0;}
		.tool{position:fixed;top:120px;left:calc(70% + 20px);}
		.tool-btn{background:#4caf50;color:#fff;height:50px;width:50px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:14px;font-family:initial;font-weight:300;cursor:pointer;margin-bottom:10px;}
		.tool-btn:hover{background:#318334;}
		#logout,#setting{background:#a2a8ba;}
		#logout:hover,#setting:hover{background:#858ca1;}
		.form{margin:10px 0;padding:0 10px;display:flex;}
		.key{display:inline-block;text-align:right;padding-right:10px;vertical-align:top;line-height:25px;}
		.value{flex:1;line-height:25px;}
		.value input[type=text],.value input[type=password],.value input[type=number]{width:100%;}
		.setting {text-align: center;position: fixed;top: 0;left: 0;right: 0;bottom: 0;margin: auto;width: 400px;height: 200px;background: #fff;padding: 15px;box-shadow: 0 0 15px rgb(0 0 0 / 18%);border-radius: 4px;display:none;}
		.setting-close {position: absolute;top: 15px;right: 15px;cursor: pointer;}
		.setting-title {text-align: left;font-weight: bold;margin-bottom: 20px;}
		@media (max-width:768px){
		    body{margin: 20px 0 150px;}
		    .note{width:100%;margin:auto;}
		    .tool{top:initial;left:initial;bottom:50px;right:30px;}
		}
	</style>
</head>
<body>
	<div class="title"><?php echo $db['title'];?></div>
	<?php if(!LOGIN){ ?>
	<div class="login">
		<input type="password" name="password" placeholder="密码登录"/>
		<input type="submit" class="btn" value="确认"/>
		<div class="prompt">请输入密码</div>
	</div>
	<script>
		//登录
		ice('[type=submit]').click(function(){
			ice.ajax(window.location.href,{page:'login',password:ice('[name=password]').val()}).then(res=>{
				if(res.error){
					ice('.prompt').html(res.data);
				}else{
					location.reload();
				}
			})
		})
	</script>
	<?php }else{ ?>
	<div class="note">
		<div id="note-list"></div>
	</div>
	<div class="tool">
		<div class="tool-btn" id="note-add">添加</div>
		<div class="tool-btn" id="setting">设置</div>
		<div class="tool-btn" id="logout">退出</div>
	</div>
	<div class="setting">
		<div class="setting-title">设置</div>
		<div class="setting-close">✕</div>
		<div class="form">
	        <div class="key">网站标题</div>
	        <div class="value">
	            <input type="text" name="title" placeholder="网站标题" value="<?php echo $db['title'];?>"/>
	        </div>
	    </div>
	    <div class="form">
	        <div class="key">登录密码</div>
	        <div class="value">
	            <input type="text" name="password" placeholder="登录密码" value="<?php echo $db['password'];?>"/>
	        </div>
	    </div>
	    <div class="btn" onclick="setting()">确定</div>
	</div>
	<script>
		// 添加
		ice('#note-add').click(function(){
			ice('#note-list').append(`<div class="tip"><div class="tip-title">标题</div><div class="tip-close">✕</div><div class="tip-content"><p>内容</p></div></div>`);
			noteInit();
			ice.setScrollB();
		})
		// 设置
		ice('#setting').click(function(){
			ice('.setting').show();
		})
		ice('.setting-close').click(function(){
			ice('.setting').hide();
		})
		// 退出
		ice('#logout').click(function(){
			ice.ajax(window.location.href,{page:'logout'}).then(res=>{
				location.reload();
			})
		})
		function setting(){
			ice.ajax(window.location.href,{page:'setting',title:ice('[name=title]').val(),password:ice('[name=password]').val()}).then(res=>{
				location.reload();
			})
		}

		function noteInit(){
			ice('.tip-title').each(function(i){
				ice(this).attr('data-key',i)
				this.oninput = function(){
					ice.ajax(window.location.href,{page:'note',type:'update',key:i,field:'title',content:this.innerHTML.replace(/<[^>]*>/,'')});
				}
			})
			ice('.tip-content').each(function(i){
				ice(this).attr('data-key',i)
				this.oninput = function(){
					ice.ajax(window.location.href,{page:'note',type:'update',key:i,field:'content',content:this.innerHTML.replace('\n','_@n@_')});
				}
			})
			ice('.tip-close').each(function(i){
				ice(this).attr('data-key',i)
				this.onclick = function(){
					if(confirm('确定删除该笔记吗？删除后无法恢复！')){
						ice('.tip').i(i).del();
						ice.ajax(window.location.href,{page:'note',type:'delete',key:i}).then(res=>{
							noteInit();
						})
					}
				}
			})
		}
		//获取备忘录信息
		ice.ajax({
			url:window.location.href,
			data:{page:'note',type:'get'},
			success:function(res){
				if(!res.error){
					var html = '';
					res.data.forEach((v,k)=>{
						html += `<div class="tip"><div class="tip-title">${v.title ? v.title : ''}</div><div class="tip-close">✕</div><div class="tip-content">${v.content ? v.content : ''}</div></div>`
					})
					ice('#note-list').html(html);
					noteInit();
				}
			}
		})
	</script>
	<?php } ?>
</body>
</html>
