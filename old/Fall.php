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
							<IMG class="centered_images" src="./Images/Fall.png">
						</th>
						<th>
							<h1>Fall QUARTER</h1>
						</th>
					</tr>
				</table>
				<p/>
				<br />
				<h2>NEWS</h2>

				<p class="date">11
					<span>NOV</span>
				</p>
				<p>
					Hello CAE!
				</p>
				<p>
					It’s already Week 7, and the home stretch of the quarter is in sight.  We hope you enjoyed the three day weekend!
				</p>
				<p>
					This Thursday we’ll hold our regular meeting as scheduled, at 7pm in Engineering Hall.
					We’ll air the next episode of each show in our lineup and have our regular trip to Norms if anyone is interested; just business as usual.
				</p>
				<p>
					Our Little Tokyo trip this coming weekend has proved very popular; our carpool is unfortunately completely full at the moment.
					If you are able to drive for the day, or know someone else who might be willing,
					please add your name to the doc and post in the Facebook event ASAP, so we can accommodate more members.
					If you’re willing to get up early and don’t mind trying out public transportation,
					our Vice President Rob can provide information on how to use the bus and Metrolink system to get to Little Tokyo and meet up with the club.
					Let us know if you’re interested in that option.
				</p>
				<p>
					You may have noticed, but one of our awesome PR Officers, Jackson,
					is organizing a group to see the premiere of the third Madoka Magica movie in theaters.
					If you’re interested in going (and are strong-willed, since most of the dates are the week before finals in December),
					make your interest known on the Google doc Jackson has set up
					<a href="https://docs.google.com/document/d/1D3rBoXfRbOsvTjYlnMG3SteZCnKkXrmeWLfD8xWXUNw/edit" target="_blank">here.</a>), or come talk to him at club.
				</p>
				<p>
					That’s about it for this week CAE!  Enjoy the holiday, and we hope to see you at club later this week!
				</p>
				<p>
					~CAE Officers
				</p>
				<br />
				<hr />


				<p class="date">22
					<span>OCT</span>
				</p>
				<p>
					Hello CAE!
				</p>
				<p>
					We hope that classes and everything are still going well for you; study hard and don’t let those midterms get to you!
				</p>
				<p>
					This week there are a few important event announcements, but first the basics.
					Our Thursday meeting this week (10/24) will happen at the usual time and place, 6:30pm in Engineering Hall with shows at 7pm.
				</p>
				<p>
					Next week Thursday, however, falls on Halloween, and that means a Halloween-themed club meeting!
					It’ll still at 6:30pm in Engineering Hall, but our usual six-show lineup will be replaced with some spookier showings.
					During the intermission break we’ll also be having a cosplay costume contest, so please feel free to come dressed up in your favorite cosplay!
					Winners will be awarded delicious prizes, and of course there will be candy for all.
				</p>
					Following up on our own personal club Halloween, CAE has also formed an interclub alliance with several other fan clubs on campus.
					The ENIGMA group consisting of CAE, the RPG club, Dumbledore’s Anteaters, and the Whovian club, are planning a post-Halloween mixer.
					It will be from 7pm-10pm on Monday, November 4th, in the Student Center’s Crystal Cove Auditorium.
					Each club will be making their own contributions to the mixer;
					CAE is planning to screen some more Halloween anime programming, for example,
					while the RPG club is organizing a scavenger hunt murder-mystery for attendees.
					Come dressed up if you’d like, and of course, there will be snacks and candy!
					If you’re on Facebook you may already have been invited to the event, but
					<a href="https://www.facebook.com/events/602421473149569/?ref_dashboard_filter=upcoming" target="_blank">here’s a link to the event page</a>,
					and to <a href="https://docs.google.com/forms/d/15rS1LLbwyC5bn0eXKUrcDlIScH_t9fMrhh_nLzAGMxA/viewform" target="_blank">the RSVP form</a>
					that the event planners are asking everyone attending to fill out.
					Admission will be $1 at the door to help cover the cost of the event, but if you already own a CAE membership, admission is free.
					We really hope you’ll attend; if you’ve ever wanted to mingle with the members of some other great fandoms, this is the perfect opportunity!
				</p>
				<p>
					The date for our Fall quarter Little Tokyo excursion has also been set!
					We’ll be going on Saturday, November 16th; we usually leave mid-morning so we can have most of the day in L.A.
					Once there, you can hang out with other club members or split up to explore the area;
					Little Tokyo boasts tons of places for Japanese food, anime and manga merchandise, karaoke, an arcade, and more.
					A Google doc to organize carpool rides will be posted soon, as will a Facebook event so you can RSVP to let us know if you’re coming.
					If for some reason you can’t make it this time, don’t worry;
					these club trips happen quarterly, so you’ll have another chance during winter quarter!
				</p>
				<p>
					Lastly, if you haven’t heard, our club forums were recently reopened, and are still under construction.
					You can find them here: http://clubs.uci.edu/cae/phpbb3/.  Registering is easy;
					you just need a valid email (UCI preferred) to make sure we don’t run into spambot problems in the future.
					There are already a few threads up for discussing current anime, manga, gaming, and forum improvements,
					so if you’ve ever wanted to chat with fellow members about that stuff, come sign up.
				</p>
				<p>
					That’s all for this week, CAE, but more events are definitely in the works!
					Keep an eye on our various forms of outreach (email, Facebook, Twitter, and the website) to get the latest on events.
					Always feel free to email us at cal.animage.epsilon@gmail.com with questions or comments.
				</p>
				<p>
					Happy studying, and we hope to see you soon at a meeting or event!
				</p>
				<p>
					~Your CAE Officers
				</p>
				<br />
				<hr />
				<p/>

				<p class="date">7
					<span>OCT</span>
				</p>
				<p>
					Hi CAE!
				</p>
				<p>
					We hope everyone had a good first week at school, and that you’re settling into classes and haven’t gotten too much homework yet!
				</p>
				<p>
					Our first week of club got off to a great start; thanks to everyone who came out for both the New Member Party and our Thursday anime viewing.
					We hope you enjoyed them and got a taste of what it’s like to be a part of the club.
				</p>
				<p>
					Today (Monday 10/7) will be the first Masquerade meeting of the Fall quarter.
					If you attended either of our meetings last week, you probably heard our Masquerade director Justin talk about getting involved and helping us craft a skit to perform at ALA this year.
					Well now’s your chance; this initial meeting will take place in Rowland Hall 192 at 7pm.  Justin will go over some ground rules and explanations for how Masquerade works,
					and we’ll start brainstorming ideas.  All input is welcomed, so even if you just want to see if Masquerade is for you, come by and sit in on this important first meeting!
				</p>
				<p>
					Our regular Thursday meeting will once again be held in Engineering Hall at 6:30pm, with anime screenings beginning at 7pm.
					We will watch the next episode of each of our six shows, so if you were hooked by any of the series last week, you won’t want to miss what happens next!
					We’ll be going out to Norm’s as usual after the meeting as well.
				</p>
				<p>
					If you aren’t busy before club on Thursday, feel free to come to our very first pre-club dinner event.
					It will be at 4:30pm at Koba Tofu Grill, a Korean restaurant in the Albertsons parking lot across from campus.
					If you aren’t sure how to get to the restaurant, a group will walk over from the flagpoles with Justin beforehand.
					Afterward, everyone walks over to the club room together.  If you’re interested, RSVP to the Facebook event or just stop by.
				</p>
				<p>
					That’s it for this week CAE!  Updates for upcoming events (Animixer, Little Tokyo trip, collaborations with other clubs, and more) will arrive soon,
					so stay connected by checking in with the Facebook group, following us on Twitter at @CalAnimageEpsilon, joining the IRC chatroom, or visiting our website.
					You can always send us an email with questions or comments at cal.animage.epsilon@gmail.com.
				</p>
				<p>
					~Your CAE Officers
				</p>
				<br />
				<hr />
				<p/>
				<p class="date">30
					<span>SEPT</span>
				</p>
				<p>
					Hello, and welcome to a brand new school year CAE!
				</p>
				<p>
					First of all, welcome to all of our new and potential members; we’re so excited to have you join us for the year, make some new friends,
					and participate in everything Cal Animage Epsilon has to offer.  And welcome back to everyone who has been a part of CAE in the past;
					we hope you’ll have just as much fun this year as in previous ones.  This email is packed with all the info you’ll need as we get started on
					the quarter!
				</p>
				<p>
					*In case you didn’t catch the news at Involvement Fair, our anime lineup for the first part of this year will be as follows:
				</p>
				<p>
					<li>The Daily Lives of High School Boys</li>
					<li>The Devil is a Part-Timer!</li>
					<li>Tiger and Bunny</li>
					<li>Accel World</li>
					<li>Attack on Titan</li>
				</p>
				<p>
					and one unrevealed series that is being voted on by members! Our choices are Natsume Yuujinchou, Genshiken, Red Data Girl,
					and Birdy the Mighty Decode; if you haven’t had a chance to vote, email our club or take the Facebook poll on our club group.
					Please only vote once!
				</p>
				<p>
					*We’ll be kicking off this year with our CAE New Member Party on October 1st (that’s this Tuesday) at 7pm in Donald Bren Hall 1600.
					Both new members and old are invited; this is a chance to get to know your officers and the other members of the club, and welcome new members.
					There will be some games and activities, and snacks and drinks available for sale to support the club.
				</p>
				<p>
					*Our first weekly club meeting will be this Thursday, October 3rd from 6:30-10pm in Engineering Hall (the building right next to the big
					yellow Engineering Tower).  Announcements and greetings from our officers will start at 6:30pm, and the anime lineup will begin at 7pm,
					where we’ll show the first episode of each series we’re watching.  There will be an intermission after the first three shows.
					After club ends, it’s a longstanding tradition that many members and officers go for a late meal at Norm’s Restaurant in Costa Mesa.
					If you’d like to come along, don’t be shy; it’s a great opportunity to socialize with other members and discuss shows and interests.
					We will try to accommodate everyone with our carpools; if you commute to UCI and are willing to be a driver, extra help is welcome!
				</p>
				<p>
					*You may have heard, but CAE also has an award-winning Masquerade group!  We’ve taken Best in Show, Best Group Performance,
					Best Props, Judge’s Choice, and other awards at ALA and AX in the past; maybe you’ve even seen us on stage as
					‘It’s Not Like We Like You or Anything, Okay?’ Cosplay.   No previous experience or specific skill is needed to join;
					Masquerade welcomes anyone who is interested in making or wearing cosplays, performing on stage, building and designing props,
					voice acting in our skit, or simply joining the creative process to come up with ideas and lend a helping hand.
					If you’re interested in joining the group and helping us craft a skit to perform at this year’s ALA, keep an eye out for more
					information on when Masquerade meetings will begin.
				</p>
				<p>
					*Throughout the school year, you can look forward to plenty of other events with CAE.
					We will be having our quarterly trips to Little Tokyo for food, shopping, and karaoke, and we hope to hold our quarterly Animixer
					stocked with video games as well.  Other planned events include bake sale fundraisers, pre-club meetups for food and socializing,
					carpooling to Anime Los Angeles and Anime Expo conventions, AMV showcases, mixers with other fan clubs on campus, club picnics and potlucks,
					and special holiday screenings and celebrations.  If there are any ideas you have, or things you’d like to see or do in club,
					we’re always open to suggestions and opinions, so talk to an officer.
				</p>
				<p>
					*Finally, if you’d like to stay up-to-date on events or refresh yourself on any club information, you can always visit our club website:
					www.clubs.uci.edu/cae.  We also have a club Twitter, an IRC channel where you can chat with members,
					and Facebook groups for both the main club and Masquerade that are consistently updated.
					Questions or comments can be directed to the club email: cal.animage.epsilon@gmail.com.
				</p>
				<p>
					We’re all looking forward to a great year with everyone!  Hope to see you in just a couple days at our New Member Party or first meeting.
					Until then CAE!
				</p>
				<p>
					~Your CAE Officers
				</p>
				<br />
				<hr />
				<p/>
				<p class="date">23
					<span>SEPT</span>
				</p>
				<p>
					Hello Cal Animage Epsilon! This is your president speaking!
				</p>
				<p>
					As you all may have noticed, we had an explosive first day at the Anteater Involvement Fair!
					It was a blast meeting new potential members and running into old friends.
					With our awesome lineup, our upcoming events and possible collaborations with other clubs,
					I can only say that this year is looking bright, especially with such enthusiastic new members joining!
				</p>
				<p>
					If you didn't get to see us today, or if you have friends who are interested in seeing what we're about,
					we're still going to be on campus til Wednesday at spot 265 in the Humanities area of school from 11AM to 3PM.
					New members or members who haven't voted for our Member's Pick slot in our lineup still get to vote. No voting twice! ;P
				</p>
				<p>
					I can't wait to see what this club can do. Let's make this an awesome year, CAE!
				</p>
				<p>
					-Vincent [aka The President]
				</p>
				<br />
				<hr />
				<p/>
				<p class="date">22
					<span>SEPT</span>
				</p>
				<p>
					Welcome to another school year! We're still finalizing our plans for the upcoming school year, so keep your eye out for upcoming announcements.
					You can get updates from us on Facebook, Twitter, and from our mailing list. We'll also have a booth for tomorrow's Anteater Involvement Fair in
					Booth 111.
					<a href="http://www.studentcenter.uci.edu/files/AIF13-Map-11x17.pdf" target="_blank">See the map here.</a>
				</p>
				<br />
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
