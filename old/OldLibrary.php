<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">

<head>
	<link rel="stylesheet" type="text/css" href="mainstyle.css" media="screen"/>
	<title>Cal Animage Epsilon</title>
	<meta name="description" content="Cal Animage Epsilon has a club library with the following titles that are available to members." />

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
			<li><a href="Membership.php" target="_self" >MEMBERS</a>
				<ul>
					<li><a href="Membership.php" target="_self">Membership</a></li>
					<li><a href="Library.php" target="_self">Club Library</a></li>
				</ul>
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
		</ul>
	</div>


	<div id="right_side_container">
		<div id="main_body_container">
			<div id="main_column">
				<!-- Main Column Code -->
				<p>
					The Club Library is available as thanks to members who make a donation to our club.
					To find out more information about how to donate and rules on accessing the Club Library, click
					<a href="Membership.php#Library" target="_self"> here.</a>
				</p>
				<h2>CLUB LIBRARY TITLES</h2>
				<p>
                <a href="#Number">#</a>
                <a href="#A">A</a>
                <a href="#B">B</a>
                <a href="#C">C</a>
                <a href="#D">D</a>
                <a href="#E">E</a>
                <a href="#F">F</a>
                <a href="#G">G</a>
                <a href="#H">H</a>
                <a href="#I">I</a>
                <a href="#J">J</a>
                <a href="#K">K</a>
                <a href="#L">L</a>
                <a href="#M">M</a>
                <a href="#N">N</a>
                <a href="#O">O</a>
                <a href="#P">P</a>
                <a href="#Q">Q</a>
                <a href="#R">R</a>
                <a href="#S">S</a>
                <a href="#T">T</a>
                <a href="#U">U</a>
                <a href="#V">V</a>
                <a href="#W">W</a>
                <a href="#X">X</a>
                <a href="#Y">Y</a>
                <a href="#Z">Z</a>
                <a href="#Incomplete">Incomplete</a>
				
				<p>
				<h2><a name=Recent>Recently Added</a></h2>
				</p>
				<p>Appleseed XIII 1080p
				<br />Blood-C
				<br />Carnival Phantasm 1080p
				<br />Cencoroll
				<br />Dennou Coil 1080p
				<br />Higurashi no Naku Koro ni Kira
				<br />Kyoukai Senjou no Horizon
				<br />Kara no Kyoukai 720p and 1080p
				<br />Katanagatari 720p and 1080p
				<br />Kobato
				<br />MajiKoi (Maji de Watshi ni Koi Shinasai)
				<br />Macross Plus Movie
				<br />MM
				<br />Mouryou no Hako
				<br />Mushishi 720p and 1080p (Dual Audio)
				<br />Nabari no Ou
				<br />No. 6
				<br />Rideback 1080p				
				</p>

				<p>
				<h2><a name=Number>#</a></h2>
				</p>
                <p>5 Centimeters Per Second [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=6696">More Info</a> ]
				<br />11 Eyes [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10935">More Info</a> ]
				<br />30-sai no Hoken Taiiku [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11962">More Info</a> ]
				</p>

                <p>
				<h2><a name=A>A</a></h2>
				</p>
                <p>Ah! My Goddess (Original OVAs, TV Series, Movie and New OVAs) [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=3639">More Info</a> ]
				<br />Air [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=2480">More Info</a> ]
				<br />Angel Beats [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10885">More Info</a> ]
				<br />Angelic Layer [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=400">More Info</a> ]
				<br />Aoi Bungaku [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11096">More Info</a> ]
				<br />Arigatou Magical Shopping Arcade Abenobashi [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=820">More Info</a> ]
				<br />Armed Librarians [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10951">More Info</a> ]
				<br />Azumanga Daioh [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=799">More Info</a< ]
                </p>

				<p>
				<h2><a name=B>B</a></h2>
				</p>
				<p> Baccano [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=7492">More Info</a> ]
				<br />Bakemonogatari [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10196">More Info</a> ]
				<br />Beyond the Clouds, The Promised Place / The Place Promised in Our Early Days [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=2324">More Info</a> ]
				<br />Big O [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=231">More Info</a> ]
				<br />Black Lagoon [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=6159">More Info</a> ]
				<br />Black Lagoon Season 2 [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=6832">More Info</a> ]
				</p>

				<p>
                <h2><a name=C>C</a></h2>
				</p>
				<p>C The Money of Soul and Possibility [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=12400">More Info</a> ]
				<br />Card Captor Sakura [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=126">More Info</a> ]
				<br />Chobits [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=357">More Info</a> ]
				<br />Chu-Bra!! [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11135">More Info</a> ]
				<br />Clannad Season 1 [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=7809">More Info</a> ]
				<br />Clannad, the Motion Picture [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=6436">More Info</a> ]
				</p>

				<p>
                <h2><a name=D>D</a></h2>
				</p>
				<p>Dance in the Vampire Bund [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10948">More Info</a> ]
				<br />Dantalian no Shoka [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11860">More Info</a> ]
				<br />Darker than Black [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=7382">More Info</a> ]
				<br />Darker than Black Gemini of the Meteor [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10984">More Info</a> ]
				<br />Dennou Coil [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=6278">More Info</a> ]
				<br />Detective Conan (Selected Episodes) [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=454">More Info</a> ]
				<br />Devilman Lady [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=579">More Info</a> ]
				<br />Durarara [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10947">More Info</a> ]
				</p>

				<p>
                <h2><a name=E>E</a></h2>
				</p>
				<p>Eden of the East [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10474">More Info</a> ]
				<br />Ef &ndash; A Tale of Melodies [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10128">More Info</a> ]
				<br />Ef &ndash; A Tale of Memories [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=8192">More Info</a> ]
				<br />Elfen Lied [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=4148">More Info</a> ]
				<br />Ergo Proxy [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=5115">More Info</a> ]
				<br />Evangelion 1.11 You Are (Not) Alone [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=8420">More Info</a> ]
				<br />Eve no Jikan [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=7998">More Info</a> ]
				<br />Eve no Jikan Gekijouban [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11350">More Info</a> ]
				</p>

				<p>
                <h2><a name=F>F</a></h2>
				</p>
				<p>Fate/Stay Night [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=5394">More Info</a> ]
				<br />Fate/Stay Night &ndash; Unlimited Blade Works [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10981">More Info</a> ]
				<br />Final Approach [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=4542">More Info</a> ]
				<br />FLCL [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=277">More Info</a> ]
				<br />Fortune Arterial [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11425">More Info</a> ]
				<br />Full Metal Alchemist Brotherhood [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10216">More Info</a> ]
				<br />Full Metal Panic &ndash; The Second Raid [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=4449">More Info</a> ]
				</p>

				<p>
                <h2><a name=G>G</a></h2>
				</p>
				<p>Genshiken [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=4168">More Info</a> ]
				<br />Ghost Hound [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=7817">More Info</a> ]
				<br />Ghost in the Shell Movies [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=465">More Info</a> ]
				<br />Ghost in the Shell Stand Alone Complex [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=910">More Info</a> ]
				<br />Ghost in the Shell Stand Alone Complex Second Gig [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=8495">More Info</a> ]
				<br />Golgo 13 &ndash; The Professional [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=640">More Info</a> ]
				<br />Gosick [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11759">More Info</a> ]
				<br />Gundam 00 [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=8190">More Info</a> ]
				<br />Gunslinger Girl [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=2947">More Info</a> ]
				</p>

				<p>
                <h2><a name=H>H</a></h2>
				</p>
				<p>.Hack//Quantum [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11809">More Info</a> ]
				<br />Haibane Renmei [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=1871">More Info</a> ]
				<br />Hatsukoi Unlimited [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10286">More Info</a> ]
				<br />Hayate no Gotoko [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=7490">More Info</a> ]
				<br />Hayate no Gotoko Second Season [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10662">More Info</a> ]
				<br />Henzemi [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=12333">More Info</a> ]
				<br />Heroman [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11266">More Info</a> ]
				<br />High School of the Dead [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11271">More Info</a> ]
				<br />Higurashi no Naku Koro ni [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=6134">More Info</a> ]
				<br />Higurashi no Naku Koro ni Kai [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=7454">More Info</a> ]
				<br />Higurashi no Naku Koro ni Rei [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=9199">More Info</a> ]
				<br />Hinako [<a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10843">More Info</a> ]
				<br />Honey and Clover [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=4975">More Info</a> ]
				<br />Honey and Clover 2 [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=6440">More Info</a> ]
				<br />House of Five Leaves [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11176">More Info</a> ]
				<br />Hyakka Ryouran Samurai Girls [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11312">More Info</a> ]
				</p>

				<p>
                <h2><a name=I>I</a></h2>
				</p>
				<p>Ichiban Ushiro no Daimaou [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11179">More Info</a> ]
				<br />Idolmaster Xenoglossia [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=7442">More Info</a> ]
				<br />Ikouku Meiro no Croisee [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=12222">More Info</a> ]
				<br />Iriya no Sora no Natsu [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=4732">More Info</a> ]
				</p>

				<p>
                <h2><a name=J>J</a></h2>
				</p>
				<p>Jigoku Shoujo / Hell Girl [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=5577">More Info</a> ]
				<br />Jigoku Shoujo Futakomori [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=6827">More Info</a> ]
				<br />Jigoku Shoujo Mitsuganae [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=9678">More Info</a> ]
				</p>

				<p>
                <h2><a name=K>K</a></h2>
				</p>
				<p>Kamichu! [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=5356">More Info</a> ]
				<br />Kami-sama no Memo-chou [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=12865">More Info</a> ]
				<br />Kanon [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=6431">More Info</a> ]
				<br />King of Fighters: Another Day [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=5924">More Info</a> ]
				<br />K-On [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10562">More Info</a> ]
				<br />Kore wa Zombie Desu ka  [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11752">More Info</a> ]
				<br />Kuragehime [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11282">More Info</a> ]
				</p>

				<p>
                <h2><a name=L>L</a></h2>
				</p>
				<p>Level E [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=12157">More Info</a> ]
				<br />Love Hina [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=168">More Info</a> ]
				<br />Lupin III: Part I-III [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=886">More Info</a> ]
				<br />Lupin III vs Detective Conan [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10605">More Info</a> ]
				</p>

				<p>
                <h2><a name=M>M</a></h2>
				</p>
				<p>Macross [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=355">More Info</a> ]
				<br />Macross Frontier [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=8586">More Info</a> ]
				<br />Majin Tentei Nougami Neuro [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=8371">More Info</a> ]
				<br />Maria Holic [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10200">More Info</a> ]
				<br />Miyazaki Movies (Multiple. We'll edit this area to reflect all the movies in the future)
				<br />Mobile Suit Gundam 0080 [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=22">More Info</a> ]
				<br />Mobile Suit Gundam 0083 Stardust Memory [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=23">More Info</a> ]
				<br />Mobile Suit Gundam F91 [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=1402">More Info</a> ]
				<br />Moshidora [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=12059">More Info</a> ]
				<br />Mouryou no Hako [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10153">More Info ]
				</p>

				<p>
                <h2><a name=N>N</a></h2>
				</p>
				<p>Natsume Yuujinchou [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=9419">More Info</a> ]
				<br />Natsume Yuujinchou San
				<br />Nichijou (My Ordinry Life) [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=12142">More Info</a> ]
				<br />Norageki [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=12148">More Info</a> ]
				<br />Nyan Koi [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10686">More Info</a> ]
				</p>

				<p>
                <h2><a name=O>O</a></h2>
				</p>
				<p>Occult Academy [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11390">More Info</a> ]
				<br />Ore no Imouto [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11512">More Info</a> ]
				<br />Ore no Imouto Extras/True End
				</p>

				<p>
                <h2><a name=P>P</a></h2>
				</p>
				<p>Panty and Stocking with Garterbelt [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11605">More Info</a> ]
				<br />Paprika [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=6142">More Info</a> ]
				<br />Perfect Blue [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=192">More Info</a> ]
				<br />Photon [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=656">More Info</a> ]
				<br />Puella Magi Magica Madoka [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=12120">More Info</a> ]
				</p>

				<p>
                <h2><a name=Q>Q</a></h2>
				</p>

				<p>
                <h2><a name=R>R</a></h2>
				</p>
				<p />Read or Die [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=819">More Info</a> ]
				<br />Read or Die TV [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=1989">More Info</a> ]
				<br />Real Drive &ndash; Sennou Chousashitsu [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=8941">More Info</a> ]
				<br />Redline [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=6456">More Info</a> ]
				<br />Rideback [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=8049">More Info</a> ]
				<br />Ronin Warriors [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=340">More Info</a> ]
				</p>

				<p>
                <h2><a name=S>S</a></h2>
				</p>
				<p>Sailor Moon [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=363">More Info</a> ]
				<!--<br />Sailor Moon R [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=213">More Info</a> ]
				<br />Sailor Moon R Movie [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=811">More Info</a> ]
				<br />Sailor moon S tv [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=80">More Info</a> ]
				<br />Sailor moon s movie [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=812">More Info</a> ]
				<br />Sailor moon sailor stars [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=795">More Info</a> ]
				<br />Sailor moon super s tv [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=280">More Info</a> ]
				<br />Sailor moon supers special [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=3490">More Info</a> ]
				<br />Sailor moon supers movie [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=813">More Info</a> ]
				<br />Sailor moon supers plus special (ami’s first love) [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=3561">More Info</a> ]
				-->
				<br />Samurai Champloo [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=2636">More Info</a> ]
				<br />Sayonara Zetsubou Sensei [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=7767">More Info</a> ]
				<br />Shakugan no Shana (Movie) [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=6428">More Info</a> ]
				<br />Shangri-La [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10246">More Info</a> ]
				<br />Shiki [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11302">More Info</a> ]
				<br />Shinryaku Ika Musume [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11421">More Info</a> ]
				<br />Shuffle [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=5375">More Info</a> ]
				<br />Solty Rei [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=5051">More Info</a> ]
				<br />Soredemo Machi wa Mawatteiru [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11511">More Info</a> ]
				<br />Soul Eater [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=9070">More Info</a> ]
				<br />Star Driver [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11607">More Info</a> ]
				<br />Steins;Gate [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11770">More Info</a> ]
				<br />Strike Witches [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=9139">More Info</a> ]
				<br />Strike Witches 2 [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11313">More Info</a> ]
				<br />Summer Wars [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10544">More Info</a> ]
				<br />Suzumiya Haruhi no Shoushitsu (The Disappearance of Haruhi  Suzumiya) [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11120">More Info</a> ]
				<br />Sword of the Stranger [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=2340">More Info</a> ]
				</p>

				<p>
                <h2><a name=T>T</a></h2>
				</p>
				<p>Tengen Toppa Gurren Lagann &ndash; The Movie [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=9601">More Info</a> ]
				<br />Tetsuwan Birdy Decode [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=9287">More Info</a> ]
				<br />Tetsuwan Birdy Decode S2 [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10207">More Info</a> ]
				<br />Tetsuwan Birdy Decode The Cipher [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=13266">More Info</a> ]
				<br />To Aru Kagaku no Railgun [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10706">More Info</a> ]
				<br />To Aru Kagaku no Railgun OVA [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11657">More Info</a> ]
				<br />To Aru Majutsu no Index [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10044">More Info</a> ]
				<br />To Aru Majutsu no Index II [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11602">More Info</a> ]
				<br />Toki wo Kakeru Shoujo [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=6733">More Info</a> ]
				<br />Toshokan Sensou (Library Wars) [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=8951">More Info</a> ]
				<br />Tsubasa Shunraiki [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10584">More Info</a> ]
				<br />Turn A Gundam [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=917">More Info</a> ]
				</p>

				<p>
                <h2><a name=U>U</a></h2>
				</p>
				<p>Ultraviolet Code 044 [<a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=9705">More Info</a> ]
				<br />Usagi Drop [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=12398">More Info</a> ]
				</p>

				<p>
                <h2><a name=V>V</a></h2>
				</p>
				<p>V Gundam / Victory Gundam [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=1403">More Info</a> ]
				<br />Venus Versus Virus [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=6830">More Info</a> ]
				</p>

				<p>
                <h2><a name=W>W</a></h2>
				</p>
				<p>Witch Blade [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=4284">More Info</a> ]
				</p>

				<p>
                <h2><a name=X>X</a></h2>
				</p>
				<p>X - TV Series [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=464">More Info</a> ]
				<br />Xam&rsquo;d Lost Memories [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=9747">More Info</a> ]
				<br />Xenosaga the Animation [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=4569">More Info</a> ]
				<br />xxxHolic [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=6052">More Info</a> ]
				<br />xxxHolic &ndash; A Midsummer Night&rsquo;s Dream [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=4212">More Info</a> ]
				<br />xxxHolic Shunmuki [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10583">More Info</a> ]
				</p>

				<p>
                <h2><a name=Y>Y</a></h2>
				</p>
				<p>Yondemasu Yo, Azezel-san [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=12345">More Info</a> ]
				<br />You&rsquo;re Under Arrest [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=620">More Info</a> ]
				<br />Yu Yu Hakusho [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=311">More Info</a> ]
				<br />Yumekui Merry [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11765">More Info</a> ]
				</p>

				<p>
                <h2><a name=Z>Z</a></h2>
				</p>
				<p>Zoku Natsume Yuujinchou [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10254">More Info</a> ]
				</p>


                <h2><a name=Incomplete>Incomplete</a></h2>
                <p>Ano Hana (Ano Hi Mita Hana no Namae wo Bokutachi wa Mada Shiranai) (INCOMPLETE)
				<br />Another (INCOMPLETE)
				<br /> Ao no Exorcist 1080p (INCOMPELTE)
				<br />Beelzebub (INCOMPLETE)
				<br />Dantalion no Shoka (INCOMPLETE)
				<br />Fate Zero (INCOMPLETE) (First half only)
				<br />Gosick 1080p (INCOMPLETE)
				<br />Guilty Crown 720p and 1080p (INCOMPLETE)
				<br />Hontou ni Atta! Reibai Sensei (INCOMPLETE)
				<br />Kamisama Dolls (INCOMPLETE)
				<br />Last Exile: Fam of the Silver Wing (INCOMPLETE)
				<br />Mawaru Penguindrum (missing ep 23) 1080p (INCOMPLETE)
				<br />Mirai Nikki 720p and 1080p (INCOMPLETE)
				<br />Natsume Yuujinchou San 720p and 1080p (INCOMPLETE)
				<br />Natsume Yuujinchou Shi (INCOMPLETE)
				<br />Nisemonogatari (INCOMPLETE)
				<br />Persona 4 - The Animation 720p and 1080p (INCOMPLETE)
				<br />Poyopoyo (INCOMPLETE)
				<br />Rinne no Lagrange (INCOMPLETE)
				<br />Sailor Moon (assorted)
				<br />Sengoku Basara (Unknown Status)
				<br />Steins;Gate 1080p (INCOMPLETE)
				</p>
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
				<a href="http://chat.mibbit.com/#caeonirc@rizon.mibbit.org" target="_blank"><img src="./Images/IRC.gif" border="0"></a>
				<p/>
				<a href="https://www.facebook.com/groups/111547118921957/" target="_blank"><img src="./Images/Facebook.gif" border="0"></a>
				<p/>
				<a href="http://mail.clubs.uci.edu/mailman/listinfo/cae-list" target="_blank"><img src="./Images/Mail.gif" border="0"></a>
				<p/>
				<!-- Right Column End -->
			</div>
		</div>
	</div>

	<div id="footer">
		<p>Wanna contact us? E-Mail us at: <a href="mailto:cal.animage.epsilon@gmail.com">cal.animage.epsilon@gmail.com</a></p>
		<p>This site is best viewed using IE 9.0 or higher, Firefox 4.0 or higher, Opera 10.5 or higher, and Safari/Chrome 3.0/1.0 or higher.</p>
		<p>Copyright © 1990-2012 by Cal Animage Epsilon</p>
	</div>
</div>
<p>
</p>