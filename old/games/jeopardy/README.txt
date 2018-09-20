Jeopardy Maker 1.0
by pftq

Apr. 2008
www.pftq.com - questions, comments, feature requests welcome.

INTRO =============================

     Jeopardy Maker is a fully-featured and customizable Flash application.  The program is written entirely in ActionScript 3.0 and designed to run on any Windows computer with Adobe Flash support (which virtually every modern computer has).  Categories, rows, columns, daily doubles... are all generated and calculated by the program on the fly.  All you have to do is enter the questions and answers.  The program supports any number of rows and columns (the max. being until your computer explodes) as well as many other optional settings (# Daily Doubles, Final Jeopardy, point values, etc).  No hassle with Powerpoint slides!
     
     Features:
     - Supports any numbers of rows and columns, calculated by the number of questions and answers you give it.
     - Everything is automatic; just enter your desired questions, answers, and categories in the appropriate txt files.
     - Daily Doubles generated randomly each time.  Option to set number of daily doubles or disable.
     - Final Jeopardy question at the end; optional.
     - Countless settings for more advanced users: seperate Q/A folders for loading seperate games, changeable table and fontsizes, and other quirks.
     
     
     *Designed and tested '.exe' for PC.  If you have a MAC, run the '.app' instead.
     *For web, use the '.swf' instead of '.exe'.  Simply embed the file on your webpage after uploading all files to the webserver.  It is assumed you have some understanding of embedding flash files, but here is an example:
     <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" type="application/x-shockwave-flash" width="640" height="480"><param name="autostart" value="true" /><param name="src" value="Jeopardy.swf" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><embed width="640" height="480" src="Jeopardy.swf" autostart="true" type="application/x-shockwave-flash"  allowfullscreen=\"true\" allowscriptaccess=\"always\"></embed></object>
     
SETUP =============================

	The program is literally set to go.  You can even run it now if you wish by running the Jeopardy.exe file.
	
	Most users will want to customize their questions and answers however...
	
	By default, there are 5 columns and 6 rows set up, but you can easily add more rows and columns simply by adding more lines (rows) or categories and files (columns).
	
	ESSENTIALS-----------------
		All "required" settings are located in the 'questions' folder.  Open these in Notepad or some other text editor.
		
		categories.txt
		  List the category names, one per line.  The number of categories here determines the number of columns in the Jeopardy table.  The category names are assigned in the order you list them: Line 1 = Column 1, Line 2 = Column 2...
		
		column#-questions.txt
		  Questions in the column .  Enter one question per line.  Each line corresponds with each row in the column.  The first column file is created for you (column1-questions.txt).  Simply create more txt files for any additional columns (column2-questions.txt, column3-questions.txt etc).
		  
		  To create a new txt file in Windows, open Notepad or another text editor (like the one you use to read this) and edit as needed.  Then save it with the correct name (column#-questions.txt - replacing # with an actual number) in the same folder as the rest of the questions.
		
		column#-answers.txt
		  Same concept as the questions.  One answer per line.  Be sure to list the answers in the same order as the corresponding questions, so they match.  Again, create more txt files as necessary.
		  
		finalj.txt
		  Enter the question in the first line; the answer goes in the 2nd line.
		  
	OPTIONAL SETTINGS -------------
	
		Many other settings are available as well in the 'settings.ini' file.  Read the comments after the '//' for details.  Feel free to change the settings and just try them out.
		
		Most useful maybe the 'dir' setting.  This determines the folder it will look at for the questions and answers.  This allows you to save multiple folders of questions/answers (say.. for different Jeopardy games).  Then just change this one setting to choose which folder to load, rather than copying the Jeopardy program over several times.
		
AUTHOR'S COMMENTS ==========================

	This was created originally for a class project at my school.  The teacher originally expected a Powerpoint presentation, but it was my 4th time going through and recreating the same Jeopardy table.  I figured why not write up a program that I could simply feed the questions/answers into (the Powerpoint version was static and required you to also relink pages or add more rows/columns).  I ended up going a little further than that and adding more features as I found useful (and many more just for fun).  The key advantage with not using Powerpoint is being able to literally add anything I need or want.
	
	The program was originally written in ActionScript 3.0 and compiled into the exe projector using Flash CS3.  The program itself I wrote solely myself, but the sounds, music, and logo are undoubtedly of Jeopardy's.  There may be traces as well from a few computer games.  There is absolutely no intention of profiting from this program, but if the owners do not wish for the distribution of the media, just let me know.  Note however that all media used in this application has been obtained through public online sources.
	
	This program is free, being merely a few days' work, but hopefully someone else out there finds it useful.

ETC ======================================	

** Last Updated April 9 2008
Jeopardy Maker application/coding copyright to pftq

Visit www.pftq.com for questions/comments and updates.