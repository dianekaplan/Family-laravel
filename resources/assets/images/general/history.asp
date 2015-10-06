<%@ LANGUAGE="VBSCRIPT" %>
<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns = "http://www.w3.org/1999/xhtml">

<head>
	<title>Family Tree: history</title>
	
		<link rel="stylesheet" type="text/css"
		href="http://www.newribbon.com/family/styles/styles.css" />
				
		<%
		Dim login, loggedIn, personID, userID
		login =  Request.querystring("login")
		personID = Request.Cookies("personID")
		userID = Request.Cookies("userID")

			login = Request.Cookies("login")
			IF login = "regular" Then
				loggedIn = True
			End If

			If loggedIn Then 
			 
			Else Response.Redirect "landing.asp"
			End If
			%>
		
	<!--<script src="help/rollover.js"></script>	-->
</head>

<body>


<!--#include file ="help/connect.inc"-->
<% 

'This page is huge- after the regular nav stuff it has: birthday and anniversary lists, the immigration notes, and the family branches


'get the user's permission and name & picture
Dim showHusband, showKeem, showKaplan, showKemler, firstname, face
		
showHusband= Request.Cookies("showHusband")
showKeem= Request.Cookies("showKeem")
showKaplan= Request.Cookies("showKaplan")
showKemler= Request.Cookies("showKemler")

firstname= Request.Cookies("firstname")
face= Request.Cookies("face")



%>

	 <% 
	branchSQL = "SELECT familyID, caption, branch, branchseq, familyID, KeemBool, HusbandBool, KemlerBool, KaplanBool, showOnBranchViewBool  from families where branch is not null order by branchseq, caption;"
	set branchRs=Server.CreateObject("ADODB.recordset")
	branchRs.Open branchSQL, conn

	If err.number <> 0 Then 
		Response.Write( "<p>Error Executing query - number=" & err.Number & " desc=" & err.description & "</p>")
	End If
	
	
	'first we'll just assume access to one branch
Dim SQLfilter, numberOfBranches
numberOfBranches= 0

If showHusband="True" Then 
	SQLfilter = "and husbandBool" 
	numberOfBranches = numberOfBranches + 1
	End If
If showKeem="True" Then 
	SQLfilter = "and keemBool" 
	numberOfBranches = numberOfBranches + 1
	
	If numberOfBranches = 2 Then SQLfilter = "and (keemBool Or husbandBool)"
	
	End If
If showKaplan="True" Then 
	SQLfilter = "and kaplanBool" 
	numberOfBranches = numberOfBranches + 1
	End If
If showKemler="True" Then 
	SQLfilter = "and kemlerBool" 
	numberOfBranches = numberOfBranches + 1
	
	If numberOfBranches = 2 Then SQLfilter = "and (kaplanBool Or kemlerBool)"
	
	End If

'if we see all 4, we don't need any filter
If numberOfBranches = 4 Then SQLfilter = ""

'query to get the birthdays for this month for the branches this user can see
	birthdaySQL = "SELECT birthdate, deathdate, first, last, nickname, personID FROM people where Len(birthdate) > 7 "
	birthdaySQL = birthdaySQL & SQLfilter
	birthdaySQL = birthdaySQL & " ORDER BY birthdate;"
	
	set birthdayRs=Server.CreateObject("ADODB.recordset")
	birthdayRs.Open birthdaySQL, conn

	If err.number <> 0 Then 
		Response.Write( "<p>Error Executing query - number=" & err.Number & " desc=" & err.description & "</p>")
	End If
	
'query to get the anniversaries for this month
		'anniversarySQL = "SELECT marriageDate, familyID, caption FROM families where marriagedate is not null ORDER BY marriagedate;"
		
		anniversarySQL = "SELECT marriageDate, familyID, caption FROM families where marriagedate is not null "
		anniversarySQL = anniversarySQL & SQLfilter
		anniversarySQL = anniversarySQL & " ORDER BY marriagedate;"
				
	set anniversaryRs=Server.CreateObject("ADODB.recordset")
	anniversaryRs.Open anniversarySQL, conn

	If err.number <> 0 Then 
		Response.Write( "<p>Error Executing query - number=" & err.Number & " desc=" & err.description & "</p>")
	End If
	
	
%>

<center>
<h1>Family Tree Website</h1>
</center>

<b><a href="account/index.asp">My Account</a></b><br/>
<A HREF="mailto:ok4mee@hotmail.com">Contact Diane</A><br/>
<A HREF="mailto:?cc=ok4mee@hotmail.com&Subject=Family Tree Website&Body=Here's a link to our family tree: http://www.newribbon.com/family.%0A%0AGo to that page to see our relatives and get a login for the site.">Email</A> the link to relatives<br/>
<b><a href="logout.asp">Log out</a></b><br/>

<!--top nav table-->
<table width="85%" cellpadding= "50">

<tr>
<td>
	<table><b>Me:</b>
	<tr>
		<% IF face <>"" Then %><td><a href="person.asp?personid=<%=personID%>">
		<img src="images/<%=face%>" border="0"></a></td>
		<%Else%>
		<a href="person.asp?personid=<%=personID%>">
		<img src="images/noimage.gif" border="0"></a>
		<%End If%>

	<td><a href="person.asp?personid=<%=personID%>">
	My Page
	</a>
	</td>
	</tr>

	</table>
</td>

<td>
<ul><b>My family history</b>: 
<li><a href="history.asp?displaybranch=y" class="bigger" ALT="See main branches only!" TITLE="See main branches only">Families in my branch</a></li>
<li><a href="outlineview.asp" class="bigger" ALT="See outline" TITLE="See outline">Chronolocial outline</a></li>
<li><a href="history.asp?fun=y" class="bigger" ALT="fun!" TITLE="fun!">Fun & general family history</a></li>
</ul>
</td>

<td>
<b>People in my family</b>: <br/>
<a href="index.asp?displayindex=y" class="bigger"  ALT="Index" TITLE="Index">View Person Index</a>
</td>

</tr>
</table>


<hr/>


<%dim monthnumber, monthname
currentmonthnumber = (month(date))
%>


<% If Request.querystring("fun") <>"" Then %>


<table cellspacing="30">
<tr>
<td valign="top">

<%If loggedIn Then %>
<b>*<script type="text/vbscript"> document.write(MonthName(month(date))) </script> Birthdays:</b> <br/>

	 	<% birthdayRS.MoveFirst%>
	 	<ul>
		<% WHILE NOT birthdayRS.EOF %>
		
		<%
		Dim thismonth
		thismonth = DateValue(birthdayRS.Fields("birthdate").Value) 
        thismonth = (Mid(thismonth, 1, 2))  'take the first 2 characters
        thismonth = (Replace(thismonth, "/", "")) 'strip the slash if there is one
		%>
		
	
		<%if  (StrComp(currentmonthnumber,thismonth))=0 then %>
		 <li>
		
		<!--want month: <%=currentmonthnumber%>, have month: <%=thismonth%>, -->
		
		
			<%=birthdayRS.Fields("birthdate").Value %> :
			
			<%if birthdayrs.Fields("nickname") <>"" Then %>	
		<a href="person.asp?personid=<%=birthdayRS.Fields("personid").Value %>"><% =birthdayRS.Fields("nickname").Value %>
		&#160;<% =birthdayRS.Fields("last").Value %>
		</a>
			<%Else%>
		<a href="person.asp?personid=<%=birthdayRS.Fields("personid").Value %>" ><% =birthdayRS.Fields("first").Value %>
		&#160;<% =birthdayRS.Fields("last").Value %>
		</a>
			<%End If%>
			
		 </li>
		<%end if%>

		<% birthdayRS.MoveNext
		WEND
		%>
		</ul>
	<%Else%>
	<br/><a href="loginUser.asp">*Log in </a>to see the full version of the site<br/><br/>		
		
	<%End If%>
</td>
<td valign="top">
	
		<b>*<script type="text/vbscript"> document.write(MonthName(month(date))) </script> Anniversaries:</b><br/>
	 	<% anniversaryRS.MoveFirst%>
	 	<ul>
	 	
	 	
		<% WHILE NOT anniversaryRS.EOF %>
		
		<%
		Dim thisanniversarymonth
		thisanniversarymonth = DateValue(anniversaryRS.Fields("marriagedate").Value) 
        thisanniversarymonth = (Mid(thisanniversarymonth, 1, 2))  'take the first 2 characters
        thisanniversarymonth = (Replace(thisanniversarymonth, "/", "")) 'strip the slash if there is one
		%>
				
		<%if  (StrComp(currentmonthnumber,thisanniversarymonth))=0 then %>
		<li>
			<%=anniversaryRS.Fields("marriagedate").Value %> :		
		<a href="family.asp?familyid=<%=anniversaryRS.Fields("familyid").Value %>" ><% =anniversaryRS.Fields("caption").Value %></a>
		 </li>
		<%end if %>


		
		<% anniversaryRS.MoveNext
		WEND
		%>
		</ul>
		</td>
		
		</tr></table>
		


<b>Who immigrated to the US?</b>
<br/><br/>
<table>
<%If showKeem="True" Then %>

<tr><td><u>Kay Husband's family: </u></td></tr>


<tr><td>The Keem/Reisdorf side:  
<ul>
<li><a href="family.asp?familyid=76">Martin & Catherine Keem</a> (5 generations back) were both born in <b>Alsace (Gunstett and Schaenenburg, respectively)</b>, and 
they were married and came to the US together <b>around 1830</b>. They had a son named <a href="person.asp?personid=51">Nicholas</a>. </li>

<li>Mary Reisdorf (born Mary Glaser) came this this country from <b>Germany</b> with <a href="family.asp?familyid=80">her family</a> in <b>1838</b> at the age of 8.  She married 
<a href="person.asp?personid=250">Peter Reisdorf</a>, who was born in <b>Rheinland, Prussia</b> and came to the states sometime <b>between 1824 and 1845</b>. Mary and Peter Reisdorf (5 generations back)
had a daughter named <a href="person.asp?personid=50">Catherine.</a></li>

<li>Connection: Catherine Reisdorf married Nicholas Keem. Nicholas and Catherine Keem had a son named <a href="person.asp?personid=52">Albert</a>, who was <a href="person.asp?personid=62">Kay</a>'s father. </li>

</ul>

</td></tr>

<tr><td>
The Suttell/Smith side: 

<ul>

<li>The <a href="family.asp?familyid=107">Pochel family</a> (6 generations back) moved to this country from <b>France</b> in <b>1833</b> when Emily Pochel was an infant. </li>
<li><a href="family.asp?familyid=104">Stephen & Anna Maria Schmeid</a> came to this country (6 generations back- Stephen from <b>Luxembourg</b>, Anna Maria unknown).  
They had a son named John Smith. </li>
<li>Connection: <a href="family.asp?familyid=81">John & Emily </a>were married in 1852 (5 generations back).  They had a daughter named Helen Smith. </li>
<li><a href="family.asp?familyid=89">Jacob and Rosa Suttell</a> (5 generations back) came to the US from <b>France</b> sometime <b>between 1824 and 1849</b>.  They had a son named Amos Suttell. </li>
<li>Connection: Helen Smith married Amos Suttell. <a href="family.asp?familyid=9">Helen and Amos Suttell</a> had a daugher named <a href="person.asp?personid=43">Adele</a>, who was <a href="person.asp?personid=62">Kay</a>'s mother. </li>

</ul>
</td></tr>
<%End If%>

<%If showHusband="True" Then %>
<tr><td><u>Bob Husband's family:</u> </td></tr>
<tr><td>
The Husband side: 
<ul><li><a href="family.asp?familyid=172">Thomas and Elanor Husband</a> were born in <b>Scotland</b> and moved to Canada sometime before 1835.  They started their family in Canada before <b>moving to the US in the mid 1830's</b>. 
Their oldest son <a href="family.asp?familyid=86">Andrew married a woman named Mary</a> (born in the US, unknown origin before that), and their son <a href="person.asp?personid=74">Thomas</a> was <a href="person.asp?personid=75">Bob</a>'s father. </li></ul>
</td></tr>

<tr><td>
The Manning side: 
<ul><li>Bob's mother <a href="person.asp?personid=73">Sarah Manning</a> was born in NY around 1885, <a href="family.asp?familyid=175">her parents</a> had been born in NY as well, and her ancestors were believed to have come from <b>Ireland</b> before that. </li></ul>
</td></tr>

<%End If %>

<%If showKemler="True" Then %>
<tr><td><br/><u>Gert Kaplan's family:</u></td></tr>

<tr><td>The Kemler side: 
<ul>
<li>Gert's father <a href="person.asp?personid=18">Louis Kemler</a> (3 generations back) came to the US from <b>Russia</b> with his father <a href="person.asp?personid=17">Solomon </a><b>around 1902</b>- he was 
13 years old.</li>
</ul>
</td></tr>

<tr><td>The Kaplan side: 
<ul><li>*Need to confirm- Bessie's parents <a href="family.asp?familyid=3">Ida & Barnett Kaplan</a> (four generations back) were probably the generation that came (from <b>Lithuania</b>)</li></ul>
</td></tr>

<%End If %>

<%If showKaplan="True" Then %>
<tr><td><u>Larry Kaplan's family:</u></td></tr>

<tr><td>The Kobrin side: 
<ul>
<li>Larry's father <a href="person.asp?personid=29">Kal Kobrin</a> (3 generations back) came to the US from <b>Lithuania</b> in <b>1896</b> at the age of 20. 
(And several of his siblings settled in South Africa around the same time).  When he immigrated, his surname was changed from Kobrin to Kaplan. (Kalman's mother <a href="person.asp?personid=311">Rochel</a> had come to the US in 1894, but may have gone to South Africa afterward- need to confirm). </li>
</ul>
</td></tr>

<tr><td>The Shapiro side: 
<ul><li><a href="family.asp?familyid=119">Toba & Max Shapiro</a> (4 generations back) moved from Russia to Johannesburg, South Africa.  Their daughter Annie was born in <b>Lithuania</b>, moved with them to South Africa, and came to the US <b>sometime between 1876 and 1896</b>.  <a href="person.asp?personid=28">Annie</a> was <a href="person.asp?personid=30">Larry</a>'s mother. </li></ul>
</td></tr>
<%End If%>

</table>


		<%end if%>
		
		
<br/><br/>

		
		


<br/><br/>

	 
	 
	 <% If Request.querystring("displaybranch") <>"" Then %>
	 
	
	<center> 
	
<table  cellpadding = "5" >
	 	<tr>

	 	
	 	 <%If showKeem = "True" Then %>
<td valign="top" width="25%">
	<Table border="0">
	 	 <tr>
	 <td valign="top"><b>Families of Catherine (Kay) Keem:</b></td></tr>
	 <tr><td valign="top" align = "center">
	 		<% WHILE NOT branchRs.EOF %>
		  
		<% If branchRs.Fields("KeemBool").Value = True And branchRs.Fields("showOnBranchViewBool").Value = True Then%>
		<a href="family.asp?familyid=<%=branchRS.Fields("familyid").Value %>" class="g<%=branchRS.Fields("branchseq").Value %>"><% =branchRS.Fields("caption").Value %></a><br/>
		<%end if%>
		 
		<% branchRS.MoveNext
		WEND
		%>	 
	 
	 </td>
	 </tr>
	 
	 </table>
</td>
 <%End If %>

 	 	 <%If showHusband = "True" Then %>
<td valign="top" width="25%">
	<Table border="0">
	 	 <tr>
	 <td valign="top"><b>Families of Bob Husband:</b></td></tr>
	 
	 	 		<% branchRS.MoveFirst%>	
	 		
	 <tr><td valign="top" align = "center">
	 		<% WHILE NOT branchRs.EOF %>
		  
		<% If branchRs.Fields("HusbandBool").Value = True And branchRs.Fields("showOnBranchViewBool").Value = True Then%>
		<a href="family.asp?familyid=<%=branchRS.Fields("familyid").Value %>" class="g<%=branchRS.Fields("branchseq").Value %>"><% =branchRS.Fields("caption").Value %></a><br/>
		<%end if%>
		 
		<% branchRS.MoveNext
		WEND
		%>	 
	 
	 </td>
	 </tr>
	 
	 </table>
</td>
 <%End If %>
	 
 	 	 <%If showKemler = "True" Then %>
<td valign="top" width="25%">
	<Table border="0">
	 	 <tr>
	 <td valign="top"><b>Families of Gertrude Kemler:</b></td></tr>
	 
	 	 		<% branchRS.MoveFirst%>	
	 		
	 <tr><td valign="top" align = "center">
	 		<% WHILE NOT branchRs.EOF %>
		  
		<% If branchRs.Fields("KemlerBool").Value = True And branchRs.Fields("showOnBranchViewBool").Value = True Then%>
		<a href="family.asp?familyid=<%=branchRS.Fields("familyid").Value %>" class="g<%=branchRS.Fields("branchseq").Value %>"><% =branchRS.Fields("caption").Value %></a><br/>
		<%end if%>
		 
		<% branchRS.MoveNext
		WEND
		%>	 
	 
	 </td>
	 </tr>
	 
	 </table>
</td>
 <%End If %>


 	 	 <%If showKaplan = "True" Then %>
<td valign="top" width="25%">
	<Table border="0">
	 	 <tr>
	 <td valign="top"><b>Families of Larry Kaplan:</b></td></tr>
	 
	 	 		<% branchRS.MoveFirst%>	
	 		
	 <tr><td valign="top" align = "center">
	 		<% WHILE NOT branchRs.EOF %>
		  
		<% If branchRs.Fields("KaplanBool").Value = True And branchRs.Fields("showOnBranchViewBool").Value = True Then%>
		<a href="family.asp?familyid=<%=branchRS.Fields("familyid").Value %>" class="g<%=branchRS.Fields("branchseq").Value %>"><% =branchRS.Fields("caption").Value %></a><br/>
		<%end if%>
		 
		<% branchRS.MoveNext
		WEND
		%>	 
	 
	 </td>
	 </tr>
	 
	 </table>
</td>
 <%End If %>
	 
	 </tr>
	 

	 </table>
</center>

<u> Key: </u><br/>
<font color = "#8A5C8A">Purple: six generations back</font><br/>
<font color = "#75A3A3">Teal: five generations back</font><br/>
<font color = "#000000">Black: four generations back</font><br/>
<font color = "#8A5C5C">Red: three generations back</font><br/>
<font color = "#006699">Blue: two generations back</font><br/>
<font color = "#CC9933">Orange: one generation back</font><br/>
<font color = "#5C8A73">Green: newest generation</font><br/>
<!--<font color = "#CC99B3">Pink: next generation</font><br/>-->

<br/><a href="branches.htm" target="_blank">Who gets to be on this page?</a>
<br/>	
<br/>	



	 <%End If%>


	<%  
		branchRs.Close
		birthdayRs.Close
		anniversaryRS.Close
		Set oRs = Nothing
		set branchrS = Nothing
		set birthdayRS = Nothing
		set anniversaryRS = Nothing

	%>



<br/><br/><br/><br/><br/><br/><br/><br/>


<a href="http://t.extreme-dm.com/?login=ok4meedk"
target="_top"><img src="http://t1.extreme-dm.com/i.gif"
name="EXim" border="0" height="38" width="41"
alt="eXTReMe Tracker"></img></a>
<script type="text/javascript" language="javascript1.2"><!--
EXs=screen;EXw=EXs.width;navigator.appName!="Netscape"?
EXb=EXs.colorDepth:EXb=EXs.pixelDepth;//-->
</script><script type="text/javascript"><!--
var EXlogin='ok4meedk' // Login
var EXvsrv='s9' // VServer
navigator.javaEnabled()==1?EXjv="y":EXjv="n";
EXd=document;EXw?"":EXw="na";EXb?"":EXb="na";
EXd.write("<img src=http://e0.extreme-dm.com",
"/"+EXvsrv+".g?login="+EXlogin+"&amp;",
"jv="+EXjv+"&amp;j=y&amp;srw="+EXw+"&amp;srb="+EXb+"&amp;",
"l="+escape(EXd.referrer)+" height=1 width=1>");//-->
</script><noscript><img height="1" width="1" alt=""
src="http://e0.extreme-dm.com/s9.g?login=ok4meedk&amp;j=n&amp;jv=n"/>
</noscript>


<!--Google pixel-->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-6288163-1");
pageTracker._initData();
pageTracker._trackPageview();
</script></body>
</html>
