<?php

/**
 *    -- Inactive account janitor --
 *
 * This program is free software: you can redistribute it and/or 
 * modify it under the terms of the GNU General Public License as 
 * published by the Free Software Foundation, either version 3 of 
 * the License, or (at your option) any later version.
 * This program is distributed in the hope that it will be useful, 
 * but WITHOUT ANY WARRANTY; without even the implied warranty 
 * of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 * See the GNU General Public License for more details.
 * http://www.gnu.org/licenses/
 *	
 * (c) Copyright 2009 Sayak Banerjee :: sayakb [at] ubuntu [dot] com
 */

// Disallow direct access to this file for security reasons
if(!defined("IN_MYBB")) die("Direct initialization of this file is not allowed.<br /><br />Please make sure IN_MYBB is defined.");

$plugins->add_hook('global_start', 'janitor_run');

function janitor_info()
{
    return array(
        'name'        => 'Inactive Account Janitor',
        'description' => 'Cleans up inactive accounts at defined intervals',
        'website'     => 'http://mods.mybboard.net/',
        'version'     => '1.2',
        'author'      => 'Sayak Banerjee',
        'authorsite'  => 'http://www.sayakbanerjee.com/',
        'guid'        => '6562da1bd4dd9eaf6f570e0e1f9388dc'
        
    );
}

function janitor_activate()
{
	global $db;
	$db->query("CREATE TABLE IF NOT EXISTS ".TABLE_PREFIX."janitor (
		cleanups int ( 10 ) NOT NULL,
		delacc int ( 10 ) NOT NULL,
		timestamp int ( 20 ) NOT NULL
		) TYPE = MYISAM ;"
	);	
	$settings_gid = $db->insert_query('settinggroups', array(
		'name' => 'janitor',
		'title' => 'Account janitor options',
		'description' => 'Various options for account janitor program.',
		'disporder' => 50,
	));
	$db->insert_query('settings', array(
		'name' => 'janitor_enable',
		'optionscode' => 'yesno',
		'value' => 1,
		'title' => 'Enable the account janitor?',
		'description' => '',
		'disporder' => 1,
		'gid' => $settings_gid
	));
	$db->insert_query('settings', array(
		'name' => 'janitor_age',
		'optionscode' => 'text',
		'value' => '',
		'title' => 'Deletion threshold',
		'description' => 'Accounts older than this number of <b>days</b> will be deleted.',
		'disporder' => 2,
		'gid' => $settings_gid
	));
	$db->insert_query('settings', array(
		'name' => 'janitor_dur',
		'optionscode' => 'text',
		'value' => '',
		'title' => 'Cleanup interval',
		'description' => 'Run interval (<b>in days</b>) for the janitor service.',
		'disporder' => 3,
		'gid' => $settings_gid
	));
	rebuild_settings();

}
function janitor_deactivate()
{
        global $db;
	$db->query("DROP TABLE ".TABLE_PREFIX."janitor");
	$gid = $db->fetch_field($db->simple_select('settinggroups', 'gid', 'name="janitor"'), 'gid');
	if($gid)
	{
		$db->delete_query('settings', 'gid='.$gid);
		$db->delete_query('settinggroups', 'gid='.$gid);
	}
	rebuild_settings();
}
function janitor_run()
{
	
	global $mybb, $db;
	if($mybb->settings['janitor_enable'])
	{
		$ts=time();
		$query=$db->query("SELECT * FROM ".TABLE_PREFIX."janitor LIMIT 1");
		$record = $db->fetch_array($query);
		if(empty($record))
		{
			$db->insert_query('janitor', array('cleanups' => 0,  
							'delacc' => 0,
							'timestamp' => $ts));
			$record['cleanups']=0;
			$record['delacc']=0;    
		}
		if(($ts - $record['timestamp'] == $mybb->settings['janitor_dur'] * 24 * 60 * 60) || ($mybb->input['janitor']=='run' && $mybb->usergroup['gid']==4 && $mybb->settings['janitor_enable']))
		{
			$query2 = $db->simple_select("users", "*", "usergroup='5'");
			$accnt = $db->num_rows($query2);
			$adel=0;
			if($accnt)
			while($user = $db->fetch_array($query2))
			{
				if($ts - $user['regdate'] >= $mybb->settings['janitor_age'] * 24 * 60 * 60)
				{
					$db->update_query("posts", array('uid' => 0), "uid='{$user['uid']}'");
					$db->delete_query("userfields", "ufid='{$user['uid']}'");
					$db->delete_query("privatemessages", "uid='{$user['uid']}'");
					$db->delete_query("events", "uid='{$user['uid']}'");
					$db->delete_query("moderators", "uid='{$user['uid']}'");
					$db->delete_query("forumsubscriptions", "uid='{$user['uid']}'");
					$db->delete_query("threadsubscriptions", "uid='{$user['uid']}'");
					$db->delete_query("sessions", "uid='{$user['uid']}'");
					$db->delete_query("banned", "uid='{$user['uid']}'");
					$db->delete_query("threadratings", "uid='{$user['uid']}'");
					$db->delete_query("users", "uid='{$user['uid']}'");
					update_stats(array('numusers' => '-1'));
					$adel=1;
				}
			}
			if($adel)
			{
				$db->update_query('janitor', array('cleanups' => $record['cleanups']+1,  
								   'delacc' => $record['delacc'] + $accnt,
								   'timestamp' => $ts));    
				if($mybb->input['janitor']=='run')
				redirect("index.php?janitor=show", "Inactive accounts deleted!");
			}
			else redirect("index.php?janitor=show", "Nothing to delete within constraints.");
		}
	}
	if($mybb->input['janitor']=='show' && $mybb->usergroup['issupermod'] && $mybb->settings['janitor_enable'])
	{
		$query=$db->query("SELECT * FROM ".TABLE_PREFIX."users WHERE usergroup='5'");
		$query1=$db->query("SELECT * FROM ".TABLE_PREFIX."janitor LIMIT 1");
		$record = $db->fetch_array($query1);
		echo "<h2>Account Janitor stats @ {$mybb->settings['bbname']}</h2><br><br>Existing inactive accounts: <b>";
		echo $db->num_rows($query);
		echo "</b><br>Number of janitor runs: <b>";
		echo $record['cleanups'];
		echo "</b><br>Accounts deleted by janitor: <b>";
		echo $record['delacc'];
		echo "</b><br>Last run: <b>";
		echo my_date($mybb->settings['dateformat'], $record['timestamp']);
		echo "</b><br>Next scheduled run: <b>";
		echo my_date($mybb->settings['dateformat'], $record['timestamp'] + $mybb->settings['janitor_dur'] * 24 * 60 * 60);
		echo "<br><br><a href=\"index.php\">Home</a>";
		if($mybb->usergroup['gid']==4 && $db->num_rows($query)) echo " | <a href=\"index.php?janitor=run\">Cleanup now!</a>";
		exit();
	}

}
?>