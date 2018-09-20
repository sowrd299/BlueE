<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">

<head>
	<link rel="stylesheet" type="text/css" href="mainstyle.css" media="screen"/>
	<title>Cal Animage Epsilon</title>
	<meta name="description" content=We're Cal Animage Epsilon. UC Irvine's Anime Club, founded in 1990.
	We meet at least once a week to watch various anime series throughout the year.
	We also have other activities such as Masquerades, and trips to Little Tokyo.
	All to help promote the Japanese Anime culture." />

	<?php
		include 'include.php';
		pic_Load();
	?>

	<!-- Javascript to show the next few events in Google Calendar -->
	<script type="text/javascript">
		<!--
		/**
		 * Converts an xs:date or xs:dateTime formatted string into the local timezone
		 * and outputs a human-readable form of this date or date/time.
		 *
		 * @param {string} gCalTime is the xs:date or xs:dateTime formatted string
		 * @return {string} is the human-readable date or date/time string
		 */
		function formatGCalTime(gCalTime) {
		  // text for regex matches
		  var remtxt = gCalTime;

		  function consume(retxt) {
			var match = remtxt.match(new RegExp('^' + retxt));
			if (match) {
			  remtxt = remtxt.substring(match[0].length);
			  return match[0];
			}
			return '';
		  }

		  // minutes of correction between gCalTime and GMT
		  var totalCorrMins = 0;

		  var year = consume('\\d{4}');
		  consume('-?');
		  var month = consume('\\d{2}');
		  consume('-?');
		  var dateMonth = consume('\\d{2}');
		  var timeOrNot = consume('T');

		  // if a DATE-TIME was matched in the regex
		  if (timeOrNot == 'T') {
			var hours = consume('\\d{2}');
			consume(':?');
			var mins = consume('\\d{2}');
			consume('(:\\d{2})?(\\.\\d{3})?');
			var zuluOrNot = consume('Z');

			// if time from server is not already in GMT, calculate offset
			if (zuluOrNot != 'Z') {
			  var corrPlusMinus = consume('[\\+\\-]');
			  if (corrPlusMinus != '') {
				var corrHours = consume('\\d{2}');
				consume(':?');
				var corrMins = consume('\\d{2}');
				totalCorrMins = (corrPlusMinus=='-' ? 1 : -1) *
					(Number(corrHours) * 60 +
				(corrMins=='' ? 0 : Number(corrMins)));
			  }
			}

			// get time since epoch and apply correction, if necessary
			// relies upon Date object to convert the GMT time to the local
			// timezone
			var originalDateEpoch = Date.UTC(year, month - 1, dateMonth, hours, mins);
			var gmtDateEpoch = originalDateEpoch + totalCorrMins * 1000 * 60;
			var ld = new Date(gmtDateEpoch);

			// date is originally in YYYY-MM-DD format
			// time is originally in a 24-hour format
			// this converts it to MM/DD hh:mm (AM|PM)
			dateString = (ld.getMonth() + 1) + '/' + ld.getDate() + ' ' +
				((ld.getHours()>12)?(ld.getHours()-12):(ld.getHours()===0?12:
			ld.getHours())) + ':' + ((ld.getMinutes()<10)?('0' +
			ld.getMinutes()):(ld.getMinutes())) + ' ' +
			((ld.getHours()>=12)?'PM':'AM');
		  } else {
			// if only a DATE was matched
			dateString =  parseInt(month, 10) + '/' + parseInt(dateMonth, 10);
		  }
		  return dateString;
		}

		/**
		 * Creates an unordered list of events in a human-readable form
		 *
		 * @param {json} root is the root JSON-formatted content from GData
		 * @param {string} divId is the div in which the events are added
		 */
		function listEvents(root, divId) {
		  var feed = root.feed;
		  var events = document.getElementById(divId);

		  if (events.childNodes.length > 0) {
			events.removeChild(events.childNodes[0]);
		  }

		  // create a new unordered list
		  var ul = document.createElement('ul');

		  // loop through each event in the feed
		  for (var i = 0; i < feed.entry.length; i++) {
			var entry = feed.entry[i];
			var title = entry.title.$t;
			var start = entry['gd$when'][0].startTime;

			// get the URL to link to the event
			for (var linki = 0; linki < entry['link'].length; linki++) {
			  if (entry['link'][linki]['type'] == 'text/html' &&
				  entry['link'][linki]['rel'] == 'alternate') {
				var entryLinkHref = entry['link'][linki]['href'];
			  }
			}

			var dateString = formatGCalTime(start);
			var li = document.createElement('li');

			// if we have a link to the event, create an 'a' element
			if (typeof entryLinkHref != 'undefined') {
			  entryLink = document.createElement('a');
			  entryLink.setAttribute('href', entryLinkHref);
			  entryLink.appendChild(document.createTextNode(title));
			  li.appendChild(entryLink);
			  li.appendChild(document.createTextNode(' - ' + dateString));
			} else {
			  li.appendChild(document.createTextNode(title + ' - ' + dateString));
			}

			// append the list item onto the unordered list
			ul.appendChild(li);
		  }
		  events.appendChild(ul);
		}

		/**
		 * Callback function for the GData json-in-script call
		 * Inserts the supplied list of events into a div of a pre-defined name
		 *
		 * @param {json} root is the JSON-formatted content from GData
		 */
		function insertAgenda(root) {
		  listEvents(root, 'agenda');
		}
		//-->
	</script>

</head>

<p>
</p>
<div id="main_container">
	<div id="header">
		<IMG class="centered_images" src="./Images/Banner.jpg">
	</div>
	<div class="menu">
		<ul>
			<li><a href="Index.php" target="_self" >HOME</a>
			</li>
			<li><a href="" target="_self" >MEMBERS</a>
				<ul>
					<li><a href="Membership.html" target="_self">Membership</a></li>
					<li><a href="Library.html" target="_self">Club Library</a></li>
				</ul>
			</li>
			<li><a href="" target="_self" >EVENTS</a>
				<ul>
					<li><a href="Events.html" target="_self">Quarter Events</a></li>
					<li><a href="Calendar.html" target="_self">Event Calendar</a></li>
				</ul>
			</li>
			<li><a href="Masquerade.html" target="_self" >MASQUERADE</a>
			</li>
			<li><a href="Photos.html" target="_self" >PHOTOS</a>
			</li>
			<li><a href="" target="_self" >ABOUT US</a>
				<ul>
					<li><a href="About.html" target="_self">About Our Club</a></li>
					<li><a href="Officers.html" target="_self">Club Officers</a></li>
					<li><a href="Current.html" target="_self">Current Shows</a></li>
					<li><a href="Past.html" target="_self">Past Shows</a></li>
				</ul>
			</li>
			<li><a href="http://www.clubs.uci.edu/cae/forums/" target="_self" >FORUMS</a>
			</li>
		</ul>
	</div>


	<div id="right_side_container">
		<div id="main_body_container">
			<div id="main_column">
				<!-- Main Column Code -->
				<IMG class="centered_images" src="./Images/underconstruction.gif">
				<h3>This page may contain errors. If you happen to notice one, please let us know on facebook, email, or by telling a CAE Officer directly, and we'll get it fixed ASAP</h3>
				<?php
					//Basic Setup
					//include 'include.php';
					//connect to the proper database
					mysql_select_db("cae", $con);
					show_all_Anime();
				?> 
				<input type="button" value="Add/Remove Shows (Administrative)" onclick="parent.location='AddShow.php'" />				
				
				<!-- Main Column End -->
			</div>
			<div id="left_side_column">
				<!-- Right Column Code -->
				<img src="./Images/currentlyshowing.gif"/>
				<p/>
				<img src="./Images/showing1.jpg" name="slide" width="250" height="150" />
				<script>
					<!--
					//variable that will increment through the images
					var step=1
					function slideit(){
					//if browser does not support the image object, exit.
					if (!document.images)
					return
					document.images.slide.src=eval("image"+step+".src")
					//the number in the 'if' statement is based on how many images defined in the script in the head.
					if (step<6)
					step++
					else
					step=1
					//call function "slideit()" every 5 seconds
					setTimeout("slideit()",5000)
					}
					slideit()
					//-->
				</script>

				<?php
					now_Showing();
				?>
				
				<img src="./Images/upcomingevents.gif"/>

				<div id="agenda"><p>Loading...</p></div>
				<!--
				The following code lists the next 5 events from the club's Google Calendar.

				The following information is from Google API example for their JSON format:
				This retrieves the full projection of the public feed for the cal.animage.epsilon@gmail.com calendar in JSON format (alt=json-in-script)
				with a callback function called insertAgenda. A maximum of 5 events is returned (max-results=5),
				recurring events are represented as individual events (singleevents=true)
				and all events in the future (futureevents=true) are returned in ascending order (sortorder=ascending).
				-->
				<script type="text/javascript" src="http://www.google.com/calendar/feeds/cal.animage.epsilon@gmail.com/public/full?alt=json-in-script&callback=insertAgenda&orderby=starttime&max-results=5&singleevents=true&sortorder=ascending&futureevents=true">
				</script>

				<p></p>

				<script src="http://widgets.twimg.com/j/2/widget.js"></script>
				<script>
					new TWTR.Widget({
					  version: 2,
					  type: 'profile',
					  rpp: 3,
					  interval: 2000,
					  width: 'auto',
					  height: 300,
					  theme: {
						shell: {
						  background: '#1281fd',
						  color: '#ffffff'
						},
						tweets: {
						  background: '#dcf1f5',
						  color: '#000000',
						  links: '#072deb'
						}
					  },
					  features: {
						scrollbar: false,
						loop: false,
						live: false,
						hashtags: true,
						timestamp: true,
						avatars: true,
						behavior: 'all'
					  }
					}).render().setUser('CalAnimeEpsilon').start();
				</script>
				<p/>
				<a href="http://chat.mibbit.com/#caeonirc@rizon.mibbit.org" target="_blank"><img src="./Images/IRC.gif" /></a>
				<p/>
				<a href="https://www.facebook.com/groups/111547118921957/" target="_blank"><img src="./Images/Facebook.gif" /></a>
				<p/>
				<!-- Right Column End -->
			</div>
		</div>
	</div>

	<div id="footer">
		<p>Wanna contact us? E-Mail us at: <a href="mailto:cal.animage.epsilon@gmail.com">cal.animage.epsilon@gmail.com</a></p>
		<p>This site is best viewed using IE 9.0 or higher, Firefox 4.0 or higher, Opera 10.5 or higher, and Safari/Chrome 3.0/1.0 or higher.</p>
		<p>Copyright © 1990-2011 by Cal Animage Epsilon</p>
	</div>
</div>
<p>
</p>