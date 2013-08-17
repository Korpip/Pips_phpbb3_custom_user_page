<?php
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_user.' . $phpEx);
// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();

$user->get_profile_fields( $user->data['user_id'] );
$user_fields = $user->profile_fields;
$full_name =  (isset( $user_fields['REALNAME'] )) ? $user_fields['REALNAME'] : '';
$template->assign_vars(array(
    'FULL_NAME'         => $full_name
));
// END

//UserPage data
$streamon;
//UserPage data

// Get URL function
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
// END

function getdatatoseecustomuserpage($url) {
global $phpbb_root_path, $phpEx, $user, $db, $config, $cache, $template;
		$userspage = parse_url($url);
		$selecteduser = str_replace('u=', '', $userspage[query]);
		$db->sql_escape($selecteduser);
		$sql_array = array(
			'username'    => $selecteduser,
		);
		$sql = 'SELECT user_id 
				FROM ' . USERS_TABLE . ' 
				WHERE ' . $db->sql_build_array('SELECT', $sql_array);
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);                       
		$db->sql_freeresult($result);
		$selecteduserid = $row['user_id']; 
		$sql_arrayid = array(
			'user_id'    => $selecteduserid,
		);
		$sqlid = 'SELECT pf_acepage 
				FROM `phpbb_profile_fields_data` 
				WHERE ' . $db->sql_build_array('SELECT', $sql_arrayid);
		$resultid = $db->sql_query($sqlid);
		$rowid = $db->sql_fetchrow($resultid);                       
		$db->sql_freeresult($resultid);
		$foo = htmlspecialchars_decode($rowid['pf_acepage']);
		return $foo;
}

function getdatatoseecustomuserbanner($url) {
global $phpbb_root_path, $phpEx, $user, $db, $config, $cache, $template;
		$userspage = parse_url($url);
		$selecteduser = str_replace('u=', '', $userspage[query]);
		$sql_array = array(
			'username'    => $selecteduser,
		);
		$sql = 'SELECT user_id 
				FROM ' . USERS_TABLE . ' 
				WHERE ' . $db->sql_build_array('SELECT', $sql_array);
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);                       
		$db->sql_freeresult($result);
		$selecteduserid = $row['user_id']; 
		$sql_arrayid = array(
			'user_id'    => $selecteduserid,
		);
		$sqlid = 'SELECT pf_user_banner 
				FROM `phpbb_profile_fields_data` 
				WHERE ' . $db->sql_build_array('SELECT', $sql_arrayid);
		$resultid = $db->sql_query($sqlid);
		$rowid = $db->sql_fetchrow($resultid);                       
		$db->sql_freeresult($resultid);
		$foo = htmlspecialchars_decode($rowid['pf_user_banner']);
		return $foo;
}
function getdatatoseecustomusercolor($url) {
global $phpbb_root_path, $phpEx, $user, $db, $config, $cache, $template;
		$userspage = parse_url($url);
		$selecteduser = str_replace('u=', '', $userspage[query]);
		$sql_array = array(
			'username'    => $selecteduser,
		);
		$sql = 'SELECT user_id 
				FROM ' . USERS_TABLE . ' 
				WHERE ' . $db->sql_build_array('SELECT', $sql_array);
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);                       
		$db->sql_freeresult($result);
		$selecteduserid = $row['user_id'];
		$sql_arrayid = array(
			'user_id'    => $selecteduserid,
		);
		$sqlid = 'SELECT pf_page_color 
				FROM `phpbb_profile_fields_data` 
				WHERE ' . $db->sql_build_array('SELECT', $sql_arrayid);
		$resultid = $db->sql_query($sqlid);
		$rowid = $db->sql_fetchrow($resultid);                       
		$db->sql_freeresult($resultid);
		$foo = htmlspecialchars_decode($rowid['pf_page_color']);
		return $foo;
}

function getstreamgodsid () {
global $phpbb_root_path, $phpEx, $user, $db, $config, $cache, $template;
		$whoisstreaming;
		$sql = 'SELECT username
FROM phpbb_users
INNER JOIN phpbb_profile_fields_data
ON phpbb_users.user_id=phpbb_profile_fields_data.user_id
WHERE phpbb_profile_fields_data.pf_streamingnow = 1';
		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			$whoisstreaming[] = $row['username'];
		}
		$db->sql_freeresult($result);
		return $whoisstreaming;
}

function getstreamgodsname () {
global $phpbb_root_path, $phpEx, $user, $db, $config, $cache, $template;
		$whoisstreaming;
		$sql = 'SELECT user_id
			FROM phpbb_profile_fields_data
			WHERE pf_streamingnow = 1';
		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			$whoisstreaming[] = $row['user_id'];
		}
		$db->sql_freeresult($result);
		return $whoisstreaming;
}


function userpanel () {
global $phpbb_root_path, $phpEx, $user, $db, $config, $cache, $template;
$userspage = parse_url($url);

if ( $user->profile_fields['pf_streamingnow'] == 2 ) {
$streamon = "off :(";}
else if ( $user->profile_fields['pf_streamingnow'] == 1 ) {
$streamon = "on!";}
if($user->data['is_registered']){
echo '<li id="aceuserpanel"><a href="forum/ucp.php?i=173">Hey ' . $user->data['username'] . ' your AcePage is ' .$streamon. ' </a></li>';
	 }
else{
		  echo '<li id="aceregisterpanel"><a href="forum/ucp.php?mode=register">or here to register</a></li>';
		  echo '<li id="aceloginpanel"><a href="forum/ucp.php?mode=login">Click here to login</a></li>';

		  }
		  
}

?>
