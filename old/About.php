<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">

<head>
	<link rel="stylesheet" type="text/css" href="mainstyle.css" media="screen"/>
	<title>Cal Animage Epsilon</title>
	<meta name="description" content="We're Cal Animage Epsilon. UC Irvine's Anime Club, founded in 1990.
	We meet at least once a week to watch various anime series throughout the year.
	We also have other activities such as Masquerades, and trips to Little Tokyo.
	All to help promote the Japanese Anime culture." />

	<!-- For slideshot in the 'Currently Showing' section -->
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

	<!-- Javascript for Google Analytics -->
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-26010976-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

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
			<li><a href="Membership.php" target="_self" >MEMBERSHIP</a>
			</li>
			<li><a href="Events.php" target="_self" >EVENTS</a>
			</li>
			<li><a href="Masquerade.php" target="_self" >MASQUERADE</a>
			</li>
			<li><a href="Photos.php" target="_self" >PHOTOS</a>
			</li>
			<li><a href="About.php" target="_self" >ABOUT US</a>
				<ul>
					<li><a href="About.php" target="_self">About Our Club</a></li>
					<li><a href="Officers.php" target="_self">Club Officers</a></li>
					<li><a href="Current.php" target="_self">Current Shows</a></li>
					<li><a href="Past.php" target="_self">Past Shows</a></li>
				</ul>
			</li>
			<li><a href="http://clubs.uci.edu/cae/phpbb3/" target="_self">FORUMS</a>
			</li>
		</ul>
	</div>


	<div id="right_side_container">
		<div id="main_body_container">
			<div id="main_column">
				<!-- Main Column Code -->
				<IMG class="centered_images" src="./Images/About.jpg">
				<p/>
				<IMG class="centered_images" src="./Images/Avatar/line.gif">
				<p><br/>We're Cal Animage Epsilon, UC Irvine's one and only Anime Club.
				We were founded in 1990, and have been enjoying and celebrating anime and manga culture ever since.
				We meet every Thursday at 7:00pm during the school year to watch an episode of
				<a href="Current.php" target="_self">6-7 anime series</a>, with the next episodes on the following meeting.
				Once we finish all the episodes of a series, we will replace it with another series.</p>
				<br/>
				<p>During our regular Thursday club meetings, we also have a snack bar, where we sell snacks and drinks for our members to help support club.
				After our meeting, we also go to Norm's Restaurant to eat a very late dinner and socialize.
				Rides are usually available for those who need them. The address to Norm's is:</p>
				<p>
				2150 Harbor Blvd
				<br/>Costa Mesa, CA 92627-2530</p>
				<br/>
				<p>Aside from our Thursday meetings, we will also have Friday meetings at 7:00pm that sample from various anime series.
				Unlike Thursday meetings, each Friday meeting will have a single anime series being sampled, and we�ll watch 6-7 episodes of it.
				Friday meetings will often screen either a popular old or overlooked anime series, or an anime series that is currently airing in Japan.
				Friday meetings usually don't start until later in the Fall Quarter.</p>
				<br/>
				<p>Beside watching anime, we also have a <a href="Masquerade.php" target="_self">Masquerade</a> group.
				In the past, our club Masquerade group has entered both Anime Los Angeles and Anime Expo Masquerade competitions, and we�ve won awards for each entry.
				This year, our club intends to enter ALA's 2013 Masquerade competition as well. We also hold several <a href="Events.php" target="_self">events</a>
				throughout the year, including our Animixer, where we reserve a room to play video games, as well as frequent trips to Little Tokyo and karaoke.
				</p>
				<br/>
				<p>All of our showings and events are open to everyone in the public.
				However we do have <a href="Membership.html" target="_self">donation membership</a> for members who pledge a donation to our club.
				We rely on funding from donations in order to keep the club going with special events and maintenance to our equipment.
				As a thank you for member who donate to the club, we offer discounts on our snacks, raffle tickets for a special raffle at the end of each quater,
				and more.
				</p>
				<br/>
				<p>If you're new to the club, please join us in one of our screenings or events.
				And if you have any questions about the club, don't hesitate to contact us at: <a href="mailto:cal.animage.epsilon@gmail.com">cal.animage.epsilon@gmail.com</a>
				</p>
				<br/>
				<H2>More Info</H2>
				<p><b><a href="Officers.php" target="_self">About Our Officers</a></b>
				<br/>
				<b><a href="Current.php" target="_self">About Our Current Shows</a></b>
				<br/>
				<b><a href="Past.php" target="_self">About Our Past Shows</a></b></p>
				<!-- Main Column End -->
			</div>
			<div id="left_side_column">
				<!-- Right Column Code -->
				<h2>CURRENTLY SHOWING</h2>
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

				<h2>UPCOMING EVENTS</h2>

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

				<a class="twitter-timeline" href="https://twitter.com/CalAnimeEpsilon" data-widget-id="381923699437232128">Tweets by @CalAnimeEpsilon</a>
				<script>!function(d,s,id)
				{var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
				if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);
				}}(document,"script","twitter-wjs");</script>

				<p/>
				<table>
					<tr>
						<th>
							<a href="http://chat.mibbit.com/#caeonirc@rizon.mibbit.org" target="_blank"><img src="./Images/irc.png" border="0"></a>
						</th>
						<th>
							<a href="http://chat.mibbit.com/#caeonirc@rizon.mibbit.org" target="_blank">Join our Club Chatroom</a>
						</th>
					</tr>
					<tr>
						<th>
							<a href="https://www.facebook.com/groups/111547118921957/" target="_blank"><img src="./Images/fb.png" border="0"></a>
						</th>
						<th>
							<a href="https://www.facebook.com/groups/111547118921957/" target="_blank">Join our Facebook Group</a>
						</th>
					</tr>
					<tr>
						<th>
							<a href="http://twitter.com/CalAnimeEpsilon" target="_blank"><img src="./Images/tw.png" border="0"></a>
						</th>
						<th>
							<a href="http://twitter.com/CalAnimeEpsilon" target="_blank">Follow us on Twitter</a>
						</th>
					</tr>
					<tr>
						<th>
							<a href="http://mail.clubs.uci.edu/mailman/listinfo/cae-list" target="_blank"><img src="./Images/em.png" border="0"></a>
						</th>
						<th>
							<a href="http://mail.clubs.uci.edu/mailman/listinfo/cae-list" target="_blank">Subscribe our e-mail list</a>
						</th>
					</tr>
				</table>
				<!-- Right Column End -->
			</div>
		</div>
	</div>

	<div id="footer">
		<p>Wanna contact us? E-Mail us at: <a href="mailto:cal.animage.epsilon@gmail.com">cal.animage.epsilon@gmail.com</a></p>
		<p>This site is best viewed using IE 9.0 or higher, Firefox 4.0 or higher, Opera 10.5 or higher, and Safari/Chrome 3.0/1.0 or higher.</p>
		<p>Copyright � 1990-2013 by Cal Animage Epsilon</p>
	</div>
</div>
<p>
</p>