<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">

<head>
	<link rel="stylesheet" type="text/css" href="mainstyle.css" media="screen"/>
	<title>Cal Animage Epsilon</title>
	<meta name="description" content="Cal Animage Epsilon has screened many major anime series in the past.
	Here is a list of all the anime CAE has screened in during the regular club season since 1998." />

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
							<IMG class="centered_images" src="./Images/Old1.png">
						</th>
						<th>
							<IMG class="centered_images" src="./Images/Old2.png">
						</th>
						<th>
							<IMG class="centered_images" src="./Images/Old3.png">
						</th>

						<th>
							<h1>PAST SHOWS</h1>
						</th>
						<th>
							<IMG class="centered_images" src="./Images/Old4.png">
						</th>
						<th>
							<IMG class="centered_images" src="./Images/Old5.png">
						</th>
						<th>
							<IMG class="centered_images" src="./Images/Old6.png">
						</th>
					</tr>
				</table>
				<p/>
				<p>We've seen many major anime in the past. Here is a list of all the anime we have watched in our regular club season since 1998.
				<br /><br /></p>
				<p/>
				<H3>1998 - 1999</H3>
				<p/>
				<p>Saber Marionette J [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=77" target="_blank">More Info</a> ]
				<br />Fushigi Yuugi [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=178" target="_blank">More Info</a> ]
				<br />Magic Knight Rayearth [ <a href=" http://www.animenewsnetwork.com/encyclopedia/anime.php?id=38" target="_blank">More Info</a> ]
				<br />Rurouni Kenshin [ <a href=" http://www.animenewsnetwork.com/encyclopedia/anime.php?id=73" target="_blank">More Info</a> ]
				<br />Martian Successor Nadesico [ <a href=" http://www.animenewsnetwork.com/encyclopedia/anime.php?id=42" target="_blank">More Info</a> ]
				<br />Lost Universe [ <a href=" http://www.animenewsnetwork.com/encyclopedia/anime.php?id=167" target="_blank">More Info</a> ]
				<br />Kimagure Orange Road [ <a href=" http://www.animenewsnetwork.com/encyclopedia/anime.php?id=327" target="_blank">More Info</a> ]</p>
				<p><br/><br/><p/>

				<H3>1999 - 2000</H3>
				<p/>
				<p>Outlaw Star [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=423" target="_blank">More Info</a> ]
				<br />Vampire Princess Miyu [ <a href=" http://www.animenewsnetwork.com/encyclopedia/anime.php?id=336" target="_blank">More Info</a> ]
				<br />Card Captor Sakura [ <a href=" http://www.animenewsnetwork.com/encyclopedia/anime.php?id=126" target="_blank">More Info</a> ]
				<br />Mamotte Shugo Getten [ <a href=" http://www.animenewsnetwork.com/encyclopedia/anime.php?id=502" target="_blank">More Info</a> ]
				<br />Cowboy Bebop [ <a href=" http://www.animenewsnetwork.com/encyclopedia/anime.php?id=13" target="_blank">More Info</a> ]
				<br />Saber Marionette J Again [ <a href=" http://www.animenewsnetwork.com/encyclopedia/anime.php?id=211" target="_blank">More Info</a> ]</p>
				<p><br/><br/><p/>

				<H3>2000 - 2001</H3>
				<p/>
				<p>Kareshi Kanojo no Jijou [ <a href=" http://www.animenewsnetwork.com/encyclopedia/anime.php?id=392" target="_blank">More Info</a> ]
				<br />Trigun [ <a href=" http://www.animenewsnetwork.com/encyclopedia/anime.php?id=88" target="_blank">More Info</a> ]
				<br />Crest of the Stars [ <a href=" http://www.animenewsnetwork.com/encyclopedia/anime.php?id=14" target="_blank">More Info</a> ]
				<br />Love Hina [ <a href=" http://www.animenewsnetwork.com/encyclopedia/anime.php?id=168" target="_blank">More Info</a> ]
				<p><br/><br/><p/>

				<H3>2001 - 2002</H3>
				<p/>
				<p>Initial D [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=395" target="_blank">More Info</a> ]
				<br />Ayashi no Ceres [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=12" target="_blank">More Info</a> ]
				<br />Noir [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=407" target="_blank">More Info</a> ]
				<br />Mahou Tsukai Tai! [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=345" target="_blank">More Info</a> ]
				<br />Tenshi no Shippou Chu! [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=1970" target="_blank">More Info</a> ]
				<br />Love Hina Spring Special [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=866" target="_blank">More Info</a> ]
				<br />X the TV series [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=464" target="_blank">More Info</a> ]</p>
				<p><br/><br/><p/>

				<H3>2002 - 2003</H3>
				<p/>
				<p>Patlabor Movie 3: WXIII [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=660" target="_blank">More Info</a> ]
				<br />Witch Hunter Robin [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=913" target="_blank">More Info</a> ]
				<br />Abenobashi Mahou Shoutengai [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=820" target="_blank">More Info</a> ]
				<br />Azumanga Daioh [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=799" target="_blank">More Info</a> ]
				<br />Animation Runner Kuromi [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=1146" target="_blank">More Info</a> ]
				<br />Great Teacher Onizuka [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=153" target="_blank">More Info</a> ]
				<br />Full Metal Panic! [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=844" target="_blank">More Info</a> ]
				<br />Princess Tutu [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=1267" target="_blank">More Info</a> ]
				<br />SaiKano/Saishuu Heiki Kanojo [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=914" target="_blank">More Info</a> ]</p>
				<p><br/><br/><p/>

				<H3>2003 - 2004</H3>
				<p/>
				<p>Infinite Ryvius [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=411" target="_blank">More Info</a> ]
				<br />Jungle wa itsumo Hale nochi Guu [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=1140" target="_blank">More Info</a> ]
				<br />Stellvia of the Universe [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=74" target="_blank">More Info</a> ]
				<br />Scrapped Princess [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=2083" target="_blank">More Info</a> ]
				<br />Shingetsutan Tsukihime [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=2938" target="_blank">More Info</a> ]
				<br />Rockman OAV: Wishing on a Star [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=4000" target="_blank">More Info</a> ]
				<br />Animation Runner Kuromi-chan 2 [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=2860" target="_blank">More Info</a> ]</p>
				<p><br/><br/><p/>

				<H3>2004 - 2005</H3>
				<p/>
				<p> Melody of Oblivion [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=3523" target="_blank">More Info</a> ]
				<br />Samurai 7 [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=3127" target="_blank">More Info</a> ]
				<br />Jungla Wa Itsumo Hale Nochi Guu Deluxe [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=2024" target="_blank">More Info</a> ]
				<br />Sensei no Ojikan [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=3761" target="_blank">More Info</a> ]
				<br />Boogiepop Phantom [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=247" target="_blank">More Info</a> ]
				<br />Soukyu no Fafner [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=3870" target="_blank">More Info</a> ]
				<br />Rozen Maiden [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=4463" target="_blank">More Info</a> ]
				<br />Rune Soldier Louie [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=895" target="_blank">More Info</a> ]
				<br />Kiddy Grade [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=891" target="_blank">More Info</a> ]
				<br />Gankutsuou: The Count of Monte Cristo [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=4194" target="_blank">More Info</a> ]
				<br />Tsukuyomi Moon Phase [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=4311" target="_blank">More Info</a> ]
				<br />Honey & Clover [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=4975" target="_blank">More Info</a> ]</p>
				<p><br/><br/><p/>

				<H3>2005 - 2006</H3>
				<p/>
				<p>Noein - to your other self [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=5887" target="_blank">More Info</a> ]
				<br />Rozen Maiden: Träumend [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=5087" target="_blank">More Info</a> ]
				<br />Victorian Romance Emma [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=4506" target="_blank">More Info</a> ]
				<br />Mushi-Shi [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=5923" target="_blank">More Info</a> ]
				<br />Fate/Stay Night [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=5394" target="_blank">More Info</a> ]
				<br />Higurashi no Naku Koro Ni [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=6134" target="_blank">More Info</a> ]
				<br />Ouran High School Host Club [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=6122" target="_blank">More Info</a> ]
				<br />The Melancholy of Suzumiya Haruhi [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=6430" target="_blank">More Info</a> ]</p>
				<p><br/><br/><p/>

				<H3>2006-2007</H3>
				<p/>
				<p>Kamichu! [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=5356" target="_blank">More Info</a> ]
				<br />Black Lagoon [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=6159" target="_blank">More Info</a> ]
				<br />Seirei no Moribito [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=6634" target="_blank">More Info</a> ]
				<br />Claymore [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=7028" target="_blank">More Info</a> ]
				<br />Seto no Hanayome [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=9694" target="_blank">More Info</a> ]
				<br />Tengen Toppa Gurren Lagann [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=6698" target="_blank">More Info</a> ]
				<br />Code Geass [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=6704" target="_blank">More Info</a> ]
				<br />Ergo Proxy [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=5115" target="_blank">More Info</a> ]
				<br />Axis Powers Hetalia [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10179" target="_blank">More Info</a> ]
				<br />Sword of the Stranger [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=2340" target="_blank">More Info</a> ]</p>
				<p><br/><br/><p/>

				<H3>2008-2009</H3>
				<p/>
				<p>Last Exile [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=2294" target="_blank">More Info</a> ]
				<br />Heroic Age [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=7627" target="_blank">More Info</a> ]
				<br />Macross Frontier [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=8586" target="_blank">More Info</a> ]
				<br />Amatsuki [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=9029" target="_blank">More Info</a> ]
				<br />Code Geass R2 [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=9173" target="_blank">More Info</a> ]
				<br />Black Butler [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10160" target="_blank">More Info</a> ]
				<br />Library War [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=8951" target="_blank">More Info</a> ]
				<br />Rideback [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=8049" target="_blank">More Info</a> ]</p>
				<p><br/><br/><p/>

				<H3>2009-2010</H3>
				<p/>
				<p>K-ON! (Light Music Club) [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10562" target="_blank">More Info</a> ]
				<br />Lovely Complex [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=7468" target="_blank">More Info</a> ]
				<br />Umineko no Naku Koro Ni (When Seagulls Cry) [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10168" target="_blank">More Info</a> ]
				<br />07-Ghost [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10468" target="_blank">More Info</a> ]
				<br />CANAAN [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10270" target="_blank">More Info</a> ]
				<br />Bakemonogatari  [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10196" target="_blank">More Info</a> ]
				<br />Nyan Koi! [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10686" target="_blank">More Info</a> ]
				<br />Gai-Rei: Zero [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10052" target="_blank">More Info</a> ]
				<br />Mononoke [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=7890" target="_blank">More Info</a> ]
				<br />Summer Wars [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10544" target="_blank">More Info</a> ]
				<br />Porco Rosso [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=855" target="_blank">More Info</a> ]
				<br />Whisper of the Heart [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=847" target="_blank">More Info</a> ]</p>
				<p><br/><br/><p/>

				<H3>2010-2011</H3>
				<p/>
				<p>Angel Beats! [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10885" target="_blank">More Info</a> ]
				<br />Kino’s Journey [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=1965" target="_blank">More Info</a> ]
				<br />Baka to Test to Shoukanjuu [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10816" target="_blank">More Info</a> ]
				<br />Dennou Coil [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=6278" target="_blank">More Info</a> ]
				<br />Durarara!! [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10947" target="_blank">More Info</a> ]
				<br />Neon Genesis Evangelion [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=49" target="_blank">More Info</a> ]
				<br />Mahou Shoujo Madoka Magica [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=12120" target="_blank">More Info</a> ]
				<br />The World God Only Knows [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11571" target="_blank">More Info</a> ]
				<br />Full Metal Panic? Fumoffu [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=155" target="_blank">More Info</a> ]
				<br />Perfect Blue [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=192" target="_blank">More Info</a> ]
				<br />Kara no Kyoukai [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=7472" target="_blank">More Info</a> ]</p>
				<p><br/><br/><p/>

				<H3>2011-2012</H3>
				<p>Kuragehime [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11282" target="_blank">More Info</a> ]
				<br />30-sai no Hoken Taiiku [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11962" target="_blank">More Info</a> ]
				<br />Yondemasuyo, Azazel-san [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=12345" target="_blank">More Info</a> ]
				<br />Level-E [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=12157" target="_blank">More Info</a> ]
				<br />Baccano! [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=7492" target="_blank">More Info</a> ]
				<br />Arakawa Under the Bridge [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11188" target="_blank">More Info</a> ]
				<br />Paranoia Agent [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=3169" target="_blank">More Info</a> ]
				<br />Darker Than Black [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=7382" target="_blank">More Info</a> ]
				<br />Shangri-La [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=10246" target="_blank">More Info</a> ]
				<br />Real Drive [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=8941" target="_blank">More Info</a> ]
				</p>
				<p><br/><br/><p/>

				<H3>2012-2013</H3>
				<p>Kore wa Zombie Desu ka? [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11752" target="_blank">More Info</a> ]
				<br />Anohana [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=12368" target="_blank">More Info</a> ]
				<br />Kaiba [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=9178" target="_blank">More Info</a> ]
				<br />Shiki [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11302" target="_blank">More Info</a> ]
				<br />Kore wa Zombie Desu ka? [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=11752" target="_blank">More Info</a> ]
				<br />Nichijou [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=12142" target="_blank">More Info</a> ]
				<br />Kokoro Connect [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=14113" target="_blank">More Info</a> ]
				<br />Joshiraku [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=14207" target="_blank">More Info</a> ]
				<br />Magical Girl Lyrical Nanoha [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=4576" target="_blank">More Info</a> ]
				<br />Fate/Zero [ <a href="http://www.animenewsnetwork.com/encyclopedia/anime.php?id=12376" target="_blank">More Info</a> ]
				</p>

				</p>
				<p><br/><br/><p/>

				<p/>
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