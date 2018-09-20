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
		</ul>
	</div>


	<div id="right_side_container">
		<div id="main_body_container">
			<div id="main_column">
				<!-- Main Column Code -->
				<table>
					<tr>
						<th>
							<IMG class="centered_images" src="./Images/Spring.png">
						</th>
						<th>
							<h1>SPRING QUARTER</h1>
						</th>
					</tr>
				</table>
				<p/>
				<h2>WELCOME</h2>
				<p/>
				<p>
					We are Cal Animage Episilon, UC Irvine's Anime Club. We meet every Thursday at 6:30pm in BS3 1200.
					BS3 1200 can be seen in our campus map below, pointed out by Mami.
				</p>
				<IMG class="centered_images" src="./Images/Map.jpg">
				<p>
					If you need more information about BS3 1200, you can click <a href="http://www.classrooms.uci.edu/GAC/BS3-1200.html" target="_self">here.</a>
				</p>
				<p>
					In the past our club has screened various anime [which you can find more information on in our 'About' tab], as well as various activities such as:
				</p>
				<p>
					<li>A Masquerade group for competition in Anime conventions such as Anime Los Angeles and Anime Expo</li>
					<li>An Animixer where we spend an evening playing various video games</li>
					<li>Trips to Little Tokyo and Karaoke</li>
					<li>And more!</li>
				</p>
				<p>
					This year, we are tentatively screening the following anime for our regular Thursday meetings:
				</p>
				<p/>
				<li>Ookami-san and Her Seven Companions</li>
				<li>Accel World</li>
				<li>Attack on Titan</li>
				<li>Tiger & Bunny</li>
				<li>Genshiken</li>
				<li>Usagi Drop</li>
				<p/>
				<p>
					If your interested in joining, please come to our first meeting.
					You can also join our Facebook group, or follow us on Twitter using the respective icons located on the right of the website.
					Please check back later this week for specifics on our first meeting, or stay updated by signing up to our e-mail list
					<a href="http://mail.clubs.uci.edu/mailman/listinfo/cae-list" target="_blank">here.</a>
				</p>
				<br />
				<h2>NEWS</h2>


				<p class="date">22
					<span>APR</span>
				</p>
				<p>
					Hello CAE!
				</p>
				<p>
					It’s Week 4; we’re not halfway through yet, but at least we’re getting there!
					We just wanted to update you on some of the stuff that’s going on later this quarter.
				</p>
				<p>
					Our meeting this week will be on Thursday as usual; 6:30pm in BS III, with shows starting around 7pm.
					More AMVs will be shown during intermission!
				</p>
				<p>
					Also starting this week is our big Spring Quarter prize drawing!
					This year we’re excited to have two huge prizes to award at the end of the year;
					the official merchandise Figma for Eren and Mikasa from Attack on Titan!
					Starting Week 4 (this week!) all the way through Week 10, we’ll be giving every club member a free ticket during club
					intermissions to be entered into the drawing.  If you want to increase your chances in the drawing further,
					you may purchase tickets (2 for $1) from the club during meetings.  During the last club meeting of the quarter (Thursday Week 10)
					we will be drawing the winners for each figure.  You MUST be present at the drawing in order to be awarded the prize.
				</p>
				<p>
					Remember our April Fools Meeting?  Remember the hilarious fansubs for shows like Genshiken and Accel World created by Vincent and Bryan?
					Well now they’re offering to show you how to contribute to the amazing world of fansubbing.
					Vincent and Bryan will be hosting a fansub workshop Mondays from 7-10pm in IAB 129
					(that’s the Intercollegiate Athletics Building - the concrete building behind Humanities Gateway next to the parking lot).
					They’ll show you how to get anime episodes, write up a hilarious and ridiculous new script, and put the two together.
					If you ever wanted to know what happened to Taku the Talking Desk after that fateful episode, come join in!
					Meetings start next Monday, April 28th.
				</p>
				<p>
					Another popular upcoming event you may want to save the date for is our quarterly Little Tokyo trip!
					It’s planned for Saturday, May 17th; as usual we’ll leave in the morning and come back to campus in the evening.
					We’ll do the all the usual karaoke, bookstore and anime store shopping, and food activities,
					and this will be your last chance to go with us until Fall quarter!  Whether it’s your first time going or you’re a regular,
					everyone always enjoys this club field trip, so keep an eye out for the carpool Google doc to go up so you can sign up as a driver or passenger.
				</p>
				<p>
					That’s all we have for this week CAE; you can always check Facebook and our club website for further updates as the quarter goes on.
					We hope you’re having a good quarter so far and hope to see you at our next meeting!
				</p>
				<p>
					~Your CAE Officers
				</p>
				<br />
				<hr />

				<p class="date">31
					<span>MAR</span>
				</p>
				<p>
					Hello CAE!
				</p>
				<p>
					We hope you had a good spring break, even if it felt way too short, as always.
					But at least when classes are back in session, so is anime club!
				</p>
				<p>
					This Thursday 4/3 will be our first meeting of the spring quarter.
					We were able to secure the same room as last quarter for our Thursday meetings, Biological Sciences III,
					so the time and place will remain exactly the same; 6:30pm with shows starting around 7pm.
					This week will be our annual April Fool’s Meeting!  Our regularly scheduled anime series will not be shown;
					instead we have a lineup of gag episodes, funny AMVs, and other parodies, and we hope you’ll come to see what
					we have in store this year.  Our regular anime lineup will return the following week,
					picking up right where we left off.
				</p>
				<p>
					In case you missed it, we held elections for next year’s CAE Officers;
					our current cabinet will be helping them get comfortable in their new roles during the remainder of this year,
					but you’ll probably be seeing them getting more involved.
					Our co-presidents next year will be Ziyiah and Jackson, with Lisa as our Secretary,
					and Sammy, Bradley, and Aristotle as our PR team.  Kevin and Peter will help maintain
					CAE’s website and social media.  Congratulations, new officers!
				</p>
				<p>
					That’s all for this week, but over the next couple of weeks look out for news about upcoming events,
					including our quarterly trip to Little Tokyo, a spring ENIGMA party, and other fun stuff.
				</p>
				<p>
					Hope to see you at our first meeting of the quarter this Thursday!
				</p>
				<p>
					~CAE Officers
				</p>
				<br />
				<hr />


				</p>
				<br />
				<a href="Winter.php" target="_self">Winter News</a>
				<p/>
				<br />
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
		<p>Copyright © 1990-2013 by Cal Animage Epsilon</p>
	</div>
</div>
<p>
</p>
