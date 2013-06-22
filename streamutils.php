<?php
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

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

/* function toggleissreaming ($url) {
global $phpbb_root_path, $phpEx, $user, $db, $config, $cache, $template;
$userspage = parse_url($url);
$sql = 'UPDATE phpbb_profile_fields_data
SET pf_streamingnow=1
WHERE ' . $user->data['user_id'] . ' = ' . $user->profile_fields['user_id'] . '';
$db->sql_query($sql);
header("Location: $userspage"); } */

function userpanel () {
global $phpbb_root_path, $phpEx, $user, $db, $config, $cache, $template;
$userspage = parse_url($url);
$streamon;
if ( $user->profile_fields['pf_streamingnow'] = 1 ) {
$streamon = "No";}
else {
$streamon = "Yes";}
if($user->data['is_registered']){
echo '<li id="userpanel"><a href="http://acestream.com/forum/ucp.php">You are logged in as ' . $user->data['username'] . ' and your streaming status is set to ' .$streamon. ' </a></li>';
     // echo'<p><font size="3"><span style="background: #000000; color: #FFFFFF; padding: 5px 5px 5px 5px;"> You are logged in as ' . $user->data['username'] . '</span><br /></font></p>
	 // <p><font size="3"><span style="background: #000000; color: #FFFFFF; padding: 5px 5px 5px 5px;">
	 // Your streaming status is set to ' .$streamon. ' </span><br /></font>
	 // </p>
	 // <p><font size="3"><span style="background: #000000; color: #FFFFFF; padding: 5px 5px 5px 5px;">
	 // <a title="See You Later" href="' . append_sid("{$phpbb_root_path}ucp.$phpEx", 'mode=logout', true, $user->session_id). '">Log out</a></span><br /></font></p>	 ';
	 }
else{
     // echo'You are not logged in<br /><a title="Log Yourself In" href="forum/ucp.php?mode=login">Log In</a> or
          // <a title="Register" href="forum/ucp.php?mode=register"> Register</a>';
		  echo '<li id="registerpanel"><a href="forum/ucp.php?mode=register">or here to register</a></li>';
		  echo '<li id="loginpanel"><a href="forum/ucp.php?mode=login">Click here to login</a></li>';

		  }
		  
}

?>
