<?php
/*
	Code Sniper (+) v1.0
	All rights reserved, not intended for distribution.
	(c) Chris Megalos 2012 Jan 27th 2012
	
	* search (DONE)
	* input to file (DONE) 
	* shade mode where only X lines above and below matches are shown. (DONE) Feb 2nd

	* input command system
	
	* mkdir 
	* input to file from web

	* upload file
	* upload multi file 

	
	+meta data
	* word count hit score
	
	* crypto

	$cmap_uu base64_encode(gzcompress(serialize($cmap_client)));
        $cmap_client = unserialize(gzuncompress(base64_decode($cmap_uu),131070));


	TODO: js,css files

*/
//get_image();
if( isset($_REQUEST['bgimage']) ) get_image();

// <img src='data:image/png;base64,".base64_encode($contents)."' />

include_once('geshi.php');
error_reporting(E_ALL ^ E_NOTICE);

$options['host'] = "10.0.0.80";
$options['port'] = 5984;
$options['project'] = 'codesniper';
$codedb = new CodeSniper($options); // See if we can make a connection


if( isset($_REQUEST['cmd']) ) {

	echo $_REQUEST['cmd']."<br/>";
	exit(0);


}



$FONT_WIDTH = "9pt";

$SEARCH = "";
$VIEW = "";
$EDIT = "";
$OUTPUT = "";
$IMPORT_FILE = "";
$DIR = "";

$PROJECT = "codesniper";

if( isset($_REQUEST['edit']) ) 	$EDIT = $_REQUEST['edit'];

if( isset($_REQUEST['view']) ) 	$VIEW = $_REQUEST['view'];
if( $argv[1] == '-v' ) 		$VIEW = $argv[2];

if( isset($_REQUEST['search']) )$SEARCH = $_REQUEST['search'];
if( $argv[1] == '-s' ) 		$SEARCH = $argv[2];

if( isset($_REQUEST['filename']) ) $IMPORT_FILE = $_REQUEST['filename'];
If( $argv[1] == '-i' ) 		$IMPORT_FILE = $argv[2];

if( isset($_REQUEST['dir']) ) $DIR = $_REQUEST['dir'];
if( $argv[1] == '-d' ) 		$DIR = $argv[2];


if( $argv[1] == "init" ) {
	$codedb->send("PUT","/$PROJECT");

	$viewinfo = $codedb->send("GET","/$PROJECT/_design/generic");

	$REVINFO = "";
	if( isset($viewinfo['_rev']) ) $REVINFO =  '"_rev":"'.$viewinfo['_rev'].'",';
	$resp = $codedb->send("PUT","/$PROJECT/_design/generic",$VIEWINSTALL);
	print_r($resp);

	echo "Initialized DB $PROJECT\n";
	exit(0);
}

if( strlen($IMPORT_FILE ) ) { $codedb->import($IMPORT_FILE); }  
if( strlen($SEARCH) ) { $OUTPUT .= $codedb->search( $SEARCH, $DIR); } 
if( strlen($VIEW) ) { $OUTPUT = $codedb->view($VIEW); }

?><html>
<head>
<title>&copy;0d3 5n1p3&reg;</title>
<style type="text/css">
<?php echo $codedb->geshi->get_stylesheet();?>

@font-face {
  font-family: Acid;
  src: url(pc.ttf);
}


body {font-family:pc,monospace;font-size: 9pt;color:#FFFFFF; background: #000000 url(?bgimage=codesniper.png) no-repeat }
textarea { color: black; background-color: transparent; }
input { color: white; background-color: black; border: 1px dashed white;font-family:monospace;font-size: 9pt; }
select { color: white; background-color: black; border: 1px dashed white;font-family:monospace;font-size: 9pt; }
option { color: white; background-color: black; border: 1px dashed white;font-family:monospace;font-size: 9pt; }
.codesniper a { text-decoration: none; }
.codesniper a:link { color: white; }
.codesniper a:visited { color: white; }
.codesniper a:hover { color: blue; }
.codesniper a:active { color: red;  }

#cmd {
	/*background-image: url(images/cursor.gif);
	background-repeat: repeat-y;
	background-color: #000000;
	background-position: 0px 0px;*/
	background: transparent;
	font-family: monospace;
	font-size: 9pt;
	font-weight: normal;
	border: 0px solid gray;
	color: #FFFFFF;
	width: 540px;

}




</style>
<script language="javascript">


var cmdhist = new Array();
var numhist = 0;
var curhist = 0;

function getCookie(c_name) {
if (document.cookie.length>0)
  {
  c_start=document.cookie.indexOf(c_name + "=");
  if (c_start!=-1)
    {
    c_start=c_start + c_name.length+1;
    c_end=document.cookie.indexOf(";",c_start);
    if (c_end==-1) c_end=document.cookie.length;
    return unescape(document.cookie.substring(c_start,c_end));
    }
  }
return "";
}



function initPrompt() {
	document.shPrompt = getCookie("CWD")+"";
	document.getElementById('cmd').value = document.shPrompt;
	document.cursorPosition = (fontWidth * document.getElementById('cmd').value.length);
	document.getElementById('cmd').style.backgroundPosition = (document.cursorPosition+4)+"px 0px";
	document.getElementById('cmd').focus();
}



function sendcmd(commandtosend) {

	commandtosend = commandtosend.substr(document.shPrompt.length);
	
	cmdhist[numhist++] = commandtosend;
	

	if( commandtosend == "clear" ) {
		document.getElementById('shell').innerHTML = "";
		initPrompt();
		return;
	}

	var requestObject = false;
	var self = this;
	
	if( window.XMLHttpRequest ) {
		self.requestObject = new XMLHttpRequest();
	} else if ( window.ActiveXObject ) {
		self.requestObject = new ActiveXObject("Microsoft.XMLHTTP");
	}

	self.requestObject.open('GET', 'code?cmd='+commandtosend, true);
	self.requestObject.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	self.requestObject.onreadystatechange = function () {
		if ( self.requestObject.readyState == 4 ) {
			document.getElementById('shell').innerHTML += self.requestObject.responseText;
			//document.getElementById('cmd').style.width = window.innerWidth;
			window.scrollTo(0,window.scrollMaxY);
			initPrompt();
			
		}
	}

	//self.requestObject.send('cmd='+commandtosend);
	self.requestObject.send('');


	
}


var fontWidth = '<?php echo $FONT_WIDTH;?>'; //needed for both cmdKeyPress and initPrompt
document.shPrompt = "<?php echo $_COOKIE['CWD']; ?> ";

function cmdKeyPress(e){
	//alert(e.keyCode);
	//delete
	if( e.keyCode == 8 ) {
		if( document.getElementById('cmd').value.length > document.shPrompt.length ) {
			document.cursorPosition -= fontWidth;
			//document.getElementById('cmd').style.backgroundPosition = document.cursorPosition+"px 0px";
		} else {
			return(false);
		}
	}

	//alert( e.keyCode );


	//up
	if( e.keyCode == 38 ) {
		if( cmdhist[curhist-1] ) {
			curhist--;
			document.getElementById('cmd').value = cmdhist[curhist];
			//if( curhist > 1 ) curhist--;	
			//alert(curhist);
			//initPrompt();
		}
	}

	//down
	if( e.keyCode == 40 ) {
		if( cmdhist[curhist+1] ) {
			curhist++;	
			document.getElementById('cmd').value = cmdhist[curhist];
			//alert(curhist);
		}	
		//alert(cmdhist.length);
	}

	//enter
	if( e.keyCode == 13 ) {
		sendcmd(document.getElementById('cmd').value);
		initPrompt();
		curhist = numhist;
		return(false);
	} 

	//other non function keys
	if( e.keyCode == 0 ) {
		document.cursorPosition += fontWidth;
		document.getElementById('cmd').style.backgroundPosition = document.cursorPosition+"px 0px";
	}

}

function enterz(){
		sendcmd(document.getElementById('cmd').value);
		initPrompt();
		curhist = numhist;
		return(false);
}

</script>
</head>
<body  onload="initPrompt();" onclick="initPrompt();">

	<div id='shell'></div>
	root@localhost#<input type="text" name="cmd" id="cmd" style="width: 430px; border: 0px solid white; color: white;" onkeypress="return(cmdKeyPress(event));" />	
<input type="button" value="enter" onclick="enterz();"/>
	<div style="float: left; width: 170px;  overflow: hidden; margin-top:165px; text-align: right;">
	<?php


	$r = array();
	if( strlen($DIR) ) {
		$r = $codedb->send("GET","/$PROJECT/_design/generic/_view/get_dir?key=\"{$DIR}\"");
		foreach( $r['rows'] as $row ) {
			$file = pathinfo($row['id']);
			$fname = str_replace("/","%2F",$row['id']);
			//echo "<li>{$row['id']} <a href='?view=$fname&dir={$_REQUEST['dir']}'>view</a></li>";	
			$revision = $row['value']['_attachments'][$row['value']['filename']]['revpos'];
			//if( $row['value']['filename'] == 'code.php' ) print_r($row);
			$activefile = "";	
			if( $row['id'] == $VIEW ) $activefile = "color: red; text-decoration: blink;font-size: 10pt;";
			echo "<div style='float:right;' class='codesniper' ><a style='$activefile' href='?view=$fname&dir={$DIR}' title='Revisions: $revision'>{$row['value']['filename']}</a></div><div style='clear:both'></div>";	

		}

	}




	?>
	</div>

	<div  style="margin: 165px 8px; float: left;width:800px; "> 

	<form method="GET">
	<div style="float: right;clear:both;margin: 1px;">
		search for:<input type="text" name="search" value="<?php echo $SEARCH;?>" style='width: 200px;text-align: center;'/>
		<input type="file" name="fname" />
		<select name="dir" onchange="javscript:this.submit();">
		<?php
		$dirz = $codedb->send("GET","/$PROJECT/_design/generic/_view/show_dirs?group=true");
		foreach( $dirz['rows'] as $key => $val ) {
			//print_r( $val['key'] );
			if( $val['key'] == $DIR ) {
				echo "<option selected='selected'>{$val['key']}</option>";
			} else {
				echo "<option>{$val['key']}</option>";
			}
		}
		?>
		</select>
		<input type="submit" name="submit" value="GO" />
	</div>
	<div style="clear: both"></div>
	<?php if( strlen($EDIT) ) { ?>
		<textarea name="src" style="width: 800px; height: 535px; color: white; background-color: transparent; border: 1px dashed white; font-size: 9pt;"><?php echo $codedb->edit($EDIT); ?></textarea>
	<?php } else { ?>
		<?php echo $OUTPUT; ?>
	<?php } ?>
	</form>
	</div>




</body>
</html>

<?



Class CodeSniper {

	function CodeSniper($options) { 
		foreach($options AS $key => $value) { $this->$key = $value; } 
		$this->geshi =& new GeSHi();


		//$this->geshi->enable_classes();
		//$geshi->set_overall_style('border: 1px dashed black; ', true);
		$this->geshi->set_line_style('background: #101010;','background: #191919');
		$this->geshi->set_overall_style('font-size: 9pt; ', true);
		$this->geshi->enable_line_numbers( GESHI_FANCY_LINE_NUMBERS, 2 );
		$this->geshi->set_header_type(GESHI_HEADER_DIV);



	}

	//function search( $geshi, $SEARCH, $DIR = '' ) {
	function search( $SEARCH, $DIR = '' ) {
	
		$geshi = $this->geshi;
		
		$OUTPUT = "";
		$r = array();
		if( strlen($DIR) ) {
			$r = $this->send("GET","/{$this->project}/_design/generic/_view/get_dir?key=\"{$DIR}\"");
		} else {
			$r = $this->send("GET","/{$this->project}/_design/generic/_view/search_php");
		}

		foreach( $r['rows'] as $row ) {
			
			$file = pathinfo($row['id']);
			$fname = str_replace("/","%2F",$row['id']);

			$source = $this->send("GET","/{$this->project}/$fname/{$row['value']['filename']}");	
			$highlight = explode("\n",$source);
			$highlines = array();
			foreach( $highlight as $key => $line ) {
				if( stristr($line,$SEARCH) ) {
					array_push($highlines,$key+1);
				}
			}


			$pstart = 0;
			$pend = 0;
			foreach($highlines as $keyx => $linenum ) {

				//if lines are already displayed don't show

				//test the end of a file
				$n = 3;	//num lines above and below to display
				$s = 0; //default to start at line 0
				if( $linenum  > $n ) $s = $linenum - $n - 1;
				$l = $n*2+1; //length
				$e = $s + $l ; //display end number

				if( $highlines[$keyx] > $e+$n ) {
					//if the end of teh current chunk overlaps with the next chunk include it.
				}
				/*
				$pstart = $s;
				$pend = $e;
				*/

				$src = implode("\n",array_slice($highlight,$s,$l));	
				$geshi->set_header_content("<div class='codesniper' style='padding-left: 12px; text-align:center;float: left;'><a href='?view={$row['id']}&dir={$DIR}'>".$row['id']."</a></div><div style='float:right;padding-right:10px;'> $s - $e </div><div style='clear:both'></div>");
				$geshi->set_source($src);
				$geshi->set_language($file['extension']);
				//$geshi->highlight_lines_extra($highlines);
				$geshi->start_line_numbers_at($s);
				$OUTPUT .= $geshi->parse_code();	


			}
			/*	
			if( count($highlines) ) {
				$geshi->set_header_content("<div style='text-align:center'>".$row['id']."</div>");
				$geshi->set_source($source);
				$geshi->set_language($file['extension']);
				$geshi->highlight_lines_extra($highlines);

				$geshi->start_line_numbers_at(0);
				//$geshi->enable_ids(true);
				//$geshi->set_overall_id('pandaman');

				$OUTPUT .= $geshi->parse_code();	
			}
			*/


		}
		return($OUTPUT);
	}

	function view( $fname ) {

		$geshi = $this->geshi;

		$file = pathinfo($fname);
		$fname = str_replace("/","%2F",$fname);
		$file_pointer = $this->send("GET","/{$this->project}/$fname");
		$source = $this->send("GET","/{$this->project}/$fname/{$file_pointer['filename']}");	

		//$geshi->enable_ids(true);
		//$geshi->set_overall_id($row['id']);
		//$geshi->set_overall_id('viewsinglefile');
		$geshi->set_source($source);	
		$lang = $geshi->get_language_name_from_extension( $file['extension'] );
		$geshi->set_language($lang);
		$OUTPUT = $geshi->parse_code();
		return($OUTPUT);
	}



	function edit( $fname ) {


		$file = pathinfo($fname);
		$fname = str_replace("/","%2F",$fname);
		$file_pointer = $this->send("GET","/{$this->project}/$fname");
		$source = $this->send("GET","/{$this->project}/$fname/{$file_pointer['filename']}");	

		return($source);
	}








	function import( $IMPORT_FILE ) {

		global $argv, $_REQUEST;

		if( $argv[1] != '-i' ) {
			$src = base64_encode($_REQUEST['src']);
		} else {
			if( is_file($IMPORT_FILE) ) {
				$src = base64_encode(file_get_contents($IMPORT_FILE));
			} else {
				echo "$IMPORT_FILE Not Found\n";
				exit(0);
			}

			if( isset($argv[3]) ) {
				$IMPORT_FILE = $argv[3].$argv[2];
			}	
		}

		$file = pathinfo($IMPORT_FILE);


		$json_packet['_id'] = $IMPORT_FILE;
		$json_packet['type'] = $file['extension'];
		$json_packet['time'] = time();
		$json_packet['directory'] = $file['dirname'];
		$json_packet['filename'] = $file['basename'];

		$IMPORT_FILE = str_replace("/","%2F",$IMPORT_FILE);
		$existing_file = $this->send("GET","/{$this->project}/$IMPORT_FILE");

		if( isset($existing_file['_rev']) ) {
			//echo "Getting Attachments to Merge\n";
			//$existing_file = $codedb->send("GET","/$PROJECT/$fname?attachments=true");
			//$json_packet[$ATTACHMENTS] = $existing_file[$ATTACHMENTS];
			$json_packet['_rev'] = $existing_file['_rev'];
		}


		$ATTACHMENTS = "_attachments";
		$json_packet[$ATTACHMENTS][$file['basename']]['content_type'] = 'text/plain'; 
		$json_packet[$ATTACHMENTS][$file['basename']]['data'] = $src; 

		$r = $this->send("PUT","/{$this->project}/$IMPORT_FILE", json_encode($json_packet) );
		if( $r['error'] ) echo $r['error'].":".$r['reason']."\n";
		if( $r['ok'] ) echo "imported\n";
		if( strlen($argv[1]) ) exit(0);
	}


	function send($method, $url, $post_data = NULL ) {

		$s = fsockopen($this->host, $this->port, $errno, $errstr);
		if(!$s) { echo "$errno: $errstr\n"; return false; }

		$request = "$method $url HTTP/1.0\r\nHost: $this->host\r\n";
		if (isset($this->user)) {
			$request .= "Authorization: Basic ".base64_encode("$this->user:$this->pass")."\r\n";
		}

		if( isset($this->xauth) ) { $request .= "X-Auth-Token: $this->xauth\r\n"; }

		if($post_data) {
			//$request .= "Accept: application/json\r\n";
			$request .= "Accept: application/json\r\n";
			$request .= "Content-Type: application/json\r\n";
			$request .= "Content-Length: ".strlen($post_data)."\r\n\r\n";
			$request .= "$post_data\r\n";
		} else {
			$request .= "\r\n";
		}

		fwrite($s, $request);
		$response = "";

		while(!feof($s)) { $response .= fgets($s); }

		list($this->headers, $this->body) = explode("\r\n\r\n", $response);
		$data = json_decode($this->body,true);

		if( is_array($data) ) {
			return($data);
		}
		return $this->body;
	}
}




$VIEWINSTALL =<<<END
{
        "_id":"_design/generic",
        $REVINFO
        "language": "javascript",
        "views":
        {
	
		"show_dirs": {
                        "map": "function(doc) {
					if( doc.directory  ) {
						emit( doc.directory, null);
					}
                        }",
			"reduce": "function(key, values) {
				return(null);
			}"
			
                },
		"get_dir": {
                        "map": "function(doc) {
					emit( doc.directory, doc);
                        }"
                },
		
		
		"search_php": {
                        "map": "function(doc) {
					if( doc.type == 'php' ) {
						emit( doc._id, doc);
					}
                        }"
                },
		"bytype": {
                        "map": "function(doc) {
                                        emit( doc.type, null );
                        }"
                },
                "file_tree": {
                        "map": "function(doc) {
                                if( doc.type == 'file' ) {
                                        emit( doc._id, { id: doc._id, text: doc.name, iconCls: doc.type, leaf: false } );
                                }
                        }"
                },
                "dir_tree": {
                        "map": "function(doc) {
                                if( doc.type == 'directory' ) {
                                        emit( doc._id, { id: doc._id, text: doc.shortname, iconCls: doc.type, leaf: true } );
                                }
                        }"
                }




        }
}
END;






function get_image() {

header('Content-type: image/gif');
$IMGDATA =<<<END_OF_GRAPHIC_FILE
R0lGODlhgAfHAuf/AAABAAABBAYAAAACAAADBgEEAAIFAQQHAgUIBAcJBQgLBwoMCAsNCgkPEQwP
CxMODA4QDA8RDRASDxETEBIUERMUEhQVExUWFBYYFRcYFhgZFxkbGBocGRscGhwdGx0fHB4fHR8g
HiAhHyUhICIjISMkIiQlIyUnJCYoJScoJigpJyorKS0rLystKiwtKy0vLDAxLzEzMDI0MTU2NDY4
NTc5Njk6ODo7OTw9Oz0/PD5APkBBP0FDQERFQ0VHREZIRUhJR0lLSEpMSkxOS05PTU9RTlBST1JU
UVNUUlRVU1VWVFZYVVdZVlpcWVtdWl1eXF5gXV9hXmBiX2FjYGJkYWNlYmRlY2VnZGdoZmhpZ2hq
Z2lraGpsaWttamxua21vbG5wbW9xbnFzcHJ0cXVzd3N1cnR2c3V3dHZ4dXd5dnh6d3l7eHp8eXt9
enx+e31/fH6AfX+BfoCCf4GDgIKEgYOFgoSGg4WHhIaIhYeJhoiKh4mLiIyKjoqMiYuNioyOi42P
jI6QjY+RjpCSj5aRj5GTkJKUkZOVkpSWk5WXlJaYlZeZlpial5qbmJudmZyem52fnJ6gnZ+hnqCi
n56jpaGjoKeioKKkoaOloqSmo6WnpKaopaeppqiqp6mrqKqsqautqqyuq6+tsa2vrK6wrbCyrrGz
r7K0sbO1srS2s7W3tLa4tbe5trW6vbi6t7m7uLq8ubu9ury+u72/vL7BvcDCvsHDv8LEwcPFwsHG
ycTGw8jFysXHxMbIxcfJxsjKx8nLyMrMyc7M0MvOys3Py8vQ0s7QzM/RztDSz9HT0NLU0dPV0tTW
09XX1NbY1dja1t7Z2Nnb19rc2dvd2t/c4dze293f3N7g3d/h3tzi5ODi3+Hk4OPl4eTm4+Xn5Obo
5efp5ujq5+nr6Ors6evu6vPt7O3v6+7w7e/x7vDy7/Hz8PL08fP18vT38/P4+/b49Pf59vX6/fj6
9//5+Pn7+Pr8+f37//f9//v9+v78///9+//9//n///z/+/7//P///yH+EUNyZWF0ZWQgd2l0aCBH
SU1QACH5BAEKAP8ALAAAAACAB8cCAAj+AAcIHEiwoMGDCBMqXMiwocOHECNKnEixosWLGDNq3Mix
o8ePIEOKHEmypMmTKFOqXMmypcuXMGPKnEmzps2bOHPq3Mmzp8+fQIMKHUq0qNGjSJMqXcq0qdOn
UKNKnUq1qtWrWLNKPHBAq9evYMOKHUu2rNmzaNOqXcu2rdu3JRMkgEu3rt27ePPq3cu3r9+/gAML
tolixeDDiBMrXsy4sePHkCNLntyUBw/KmDNr3sy5s+fPoEOLHh3yyBHSqFOrXs26tevXsGPL5tik
yezbuHPr3s27t+/fwHdOkRK8uPHjyJMrX868eWAsVpxLn069uvXr2LNrv8iFy/bv4MP+ix9Pvrx5
xGPAnF/Pvr379/Djy3dZRsz8+/jz69/Pv7/0Mmb4J+CABBZo4IEIAmZGGgk26OCDEEYo4YQ6ocEg
hRhmqOGGHHZI4RkXeijiiCSWaOKJ01mI4oostujiizBipmKMNNZo44045qiVGmvo6OOPQAYp5JAq
maEGkUgmqeSSTA65Ro9NRinllFRWGSEbbFip5ZZcdumleG1k+eWYZJZp5pmxvfEGmmy26eabcCIW
Bxxx1mnnnXjm6dUcc+jp55+ABiroTXXQMeihiCaq6KITFcroo5BGKqmeddQx6aWYZqpplXbYsemn
oIYqaox3WDrqqaimquqDdpi66qv+sMYqK3uOzmrrrbjmuhwdhurq66/ABstaq8IWa+yxyDpGbLLM
Nuvss27d4Sm01FZr7bVS3XEHttx26+23Ot2RB7jklmvuuSFpi+667LbrLkJ34PHuvPTW2y0e49qr
7778CotvvwAHLPCq/w5s8MEIR5pHvgk37PDDeC4M8cQUV0ymHnpYrPHGHC+pxx4dhyzyyDXu0QfJ
KKessod9+LHyyzDHjOAfgMhs8804yweIIDn37PPP3wXCM9BEF200coEEcvTSTDc9WyA1Oy311FR/
BojSVWet9daMJc3112CHrZcgQ4tt9tlolzXIIGm37fbbVA1SNtx01213UGvfrff+3nzTJAjbfQcu
+OAj5U344YgnPlEhhSju+OOQE2SIIZFXbvnghRxy+eac141IIp2HLrrZiSwy+umoV91II6m37rrR
i7D++uy027x67bjnjvLtuvfue8WNPPL78MQjHHzxyCe/7/HKN+/8uo8I//z01Hf7CCTVZ689jlxx
BZZcC0AACSQOLJBAV1gdMEEGHpCgQgokdIABBFkl0MEJL9CQQw4ytFACBp1JAAdM4AL93aB/JtgA
+qRzAA6UoAUzwIENYqACElygfh1AwQtqsIMczMB/AMRKAj6gghjYoAc7oMELTpABDGqQgx4E4fZy
dgAP/OAKbXCDDuMQhzfA4Yf+cWjDFX7QgQUyJQEVqMEU6rC66EUiEpKYxCQqUQlI2OEKO6iAEZVS
ARyIwRCn8MUvfgGMMgbjjMMYhi9CAQgtvMABThHBEvoQCmJw4xt4zCMewQGObfACE3HggQUeIwIl
9AEUdsQjNxbJSEYOYxSAWIIJjhOCJOjBE8HYRiM3yY1r2GISbsgBBZxCgib8gRTG+AYfV8lKcHCj
F5qYgw8G2ZQSNAEQplCGOMbBy17yUhzi+IYvNkGHWZLSlKNIZStb6cdMxKEHFZghyg4QAy2ggUdh
yiYbfPhDbsqhUHKYQx24QIMtDmUCRdjD6tYZPUg8MRJSnOIlMJGJTGhiE5z+8IMRRmmUBNSgDq7w
hUDFSEYzojGNxEioMRZqDFS0QQVHWYARHrEMPVp0mRj9BSBuYE6/LIAIj2CGRUdKUj1WwxNOuOBQ
XiCFSXIEDY+IwgKEsoAiNGIZnMypTl/5hxp09CcLWIIknoHRovIxHEhFKjACgYOf+sQBSahENHxJ
1apadRiCyIFTe7IAJQzVqGBdpUY5Ks2NycAMT3qSGniEzTCpqQ1qioMc4jAHOlRKW6VCwwq2ihMI
GAER6wxsOyEhiShSsRLztOc9OcFYTnSiEUSIgFBOYIdbDFSgYywjMM4YjDQOQ6EMDW0ykoGLNZAg
KAfIASSwUdKwsjKpSI3+hh9i8JcD7CAS2yipbneLx1RAYaY+aQIw8IgKjuSAkc8gTk9su9qdOveO
JGVGHl6AWh9MghtGha12t5tUcUTjD7QFygF8cAlwkOO86E2vetd7Xqp+N7w/Ge91t+tasD5jDzAo
K8QOcIU1rNW/a0iDGgSsBja0YQ0G/mE35SAHOrRKWtqya6ugwNeZVMAOgc1w8MYHRUkgFhMgVuwm
8OnYTnjixJ6gg0p3Mt4wXpagBeVsGoWRUGKElqGjTYYydrwMT8BXJwmQQipJWl/uIhWYwJTFZfSS
ACgkI6y8jXI04NBCnaQgFhY9bUYSMAyLuoIDQBZylMes21f4oCcJuIL+MsBh5DYfGclwjrM4ZHFm
niTACs1gr573zGda/ADNV1iGmwfdZlbGYsn6NdgBtKDWNDzJ0WxYK4/WEKZtwkGucuWVXetqV2nV
oVV1yEMX5pKTC/RBw01s5/WeWNhKgJiemmgsY02MYhR/AhAbyMkBjMCKXrx4jDE+aI1vjOPR7lgZ
y0h2slWBaJskYAsivahrjSxnOI/jF0W4y7OJWt9ug5UbfpAATrwAXT1mLCNrIGk0cnCTBHQh2mSO
N0l5kW2cJOALzxh0tfdtbav+wgg5uXc1zEHwghv84AhPeMHZCwyA2xsM0eD3vgndZl/UO9EAg0Ia
0MBx/6Zh4yBHw5P+3IClHMaBDnP4ZqEcbNc6QLhT2sJXHppQYZU4QA6oTvUjNszhKVoC1ovthNCF
fuJPfMITRgeF0uMAx5qUYBS/zqxBO/tZ0BI7xzxWdrKZwfVmbMIDNrlBMKQNVu7y26q8ZAUK6JID
Ynj77WGNhhVqfpIIfKKo1iC1RUJQ7pHahyY4GLu8x+zaVLiUJjwwxpslXm20O76X5HDF2mvCA2Uo
/PKYz7zBX5ECmyS+qowPvehXcQKM74sDYzDDGdAAogJzPA2r55GBc8gGBYez5Z9uVafsEC/ei0sP
edjDHvTw45cc4AgZ3rnOx+fOJ0rxw/W8Jz5pXWujf0LpoAjFKEb+AYoh0J0kDsjDiwmqWRkj1MbE
NgbWka31ZXCdGc2I/zOYoQa9vyQDldBjWM3eeMerVxx4AFxroQGXQGhwB3e4UAIyQQLDAFZQgBGj
EFaH8H0ikQHldYAYiFHfUAcC+BIakAmh93iPx2foJQ550IEusQGccA4s2IIu+IIwGIMyeA4KNw4n
KBMbsAkiuIO+JHpxBg53gIKmxy5R8AViYAZmgAZIuHFnIGlqgAYGxiM7RAdzwmB19WC+h1d4gAfi
InzC5wd9MAYUCBIOAAiCFT07h4bN53xRdAmJZU8kRn1Fl3TYFwraNwqkQAqIQD8vYQKwEHXBRnVV
l37qZ2xZp2z+7xd/zfAMjMiIsAACMJED0bBHZadd/WdVJHhexABRarED1gBnFBeKSdVt2/AEMLED
1xBWtXARB5AJrhUK9rcSkpiBtJhRk+cSPvCJwMSDVZWJe3ZwmwgTPbANM1iMxniMMEgMhvESPnAN
vsiL0FhVwdB5Q8guB+AFRph6Z3AGZTAGANJ6TjgGRZADKeABIVACImACKqACL7ADRmAFc9B7ebCF
eIUxLbMHfpCPeRCLKfECycd8HPZEhNVqjbAGRFACG3AB95QBIuADY9AItXZidWiHeJiHpFAKpgAK
IuASWQCIU3d+wAALoDBPomVsowALwKB1iSh/jciI0RANy3D+cSsBB6qUXZa4DbMACo0ACH/Qkz0J
CICQCJ5QC9/wiwkHDg+IFnLgg3FWDanQB2DQBDxQAzywBF2gB6WQb6IIW5PAjyfxBGzmZnxUfBMB
B671Cny4EnEAd9ywDLrgCq9QVLdgDKmIUW7GDbbREnXAg+kFDs/gC7EgC3rWCzhFDpp3cEjZEgdg
B+jQmI75mJDpmN9wC6UQCWRzmYIgNIsQCrgQDpGJDsUYDkm5EotJcL6IXtxQC6PwCEDZmq0plERJ
DtH4DaNZjeWCAlvQBWAwBt6oekhYBmegemiQBSAwhgcQZHegB1wYc3rgB/joB4CQj3/wZyvBBRrG
YYVVWKz+NghGgAH8OGIFcQAYwASKQId3uH15WAoYaQqngApXsBIJ0AiXBWwfqUaAsANgNhAHsFDr
pwykRgEvAAavAH8s2ZIveaDRAAhjmBERgAo2CVvRcAhBAIkOcQArcAWwoHku+AgLChUSwAoiGGfK
MAhAsGIKEQE7QAe1IHHc9QqSVSSi6AkZIQVh2Wa4EE0pEQGqUGTcoAlLoAILdABGBlwbkANxMAxb
uQgdehES4AqQx2fg0AlP0AJBapgIB1wc0AN0YAwJN4ONsKQWMQGw8Jlkeg2LMAQbWaEtoAWzQKZk
yqEqIQGvcJgEVw2JMAQh8BAWiqGneV5fapvksgO56QX+vNmNvrmNaWAGLZARJQAH2pIHetAHLdMy
NMOTgJCXJ3EAbfCP76SdkaAIPtB0CIFPCQEBS5AJ53mR6omR7YkKqJAKcACmE+EAnTBQ9LlZB4UK
PuCVB9CfycaPHzAHymCgCFqsmeCVIYEBvGCX2gUOlUADF8EBdcANBHeMpyCEWqEBv9BeIngNfbCo
FNEBX9ALTOkL+XkSe8CUwMSJF/ED3zBov2CiJJEBvkBxxPBbByGk3CWEKTAI3OCDpICsIKGtvmgM
VCCqBHEACieEK3AI4ICM53CtKLEBw5AOFnuxGHux57AJNnARHYAH3+CmkIkK2BoSGxAML1gOCTcO
mVD+A9FaB9twmqZQsoAKLUGQBVywBWAQBkiYhMEZnDRLERtQBx9jMmCYj64JCFhwEgmAYcGThs0X
RZMQCX0QQgvBWAwRAo+QnqbQtezpqqmQCqqgCoIgsB1BAaaAWVJnfq4wAwrRq8emdcgKAWbADAcK
DcUaDdWwt6eQliMBAsbQSpYoDuDwBxqwEQvABg8Lg5FpC/z0FSKwDAWbBGYLETQQCrzIDHlqEoag
rsBUCRphA9vAeMBgtSMRAsYQesvgcAhxAPtWshVQB+Cwb1Q1CxNgEpGbXgrXDEvwtjJYshZwB+PA
giKLDo5rEiTQDBm7vOlwDoJwrhjhAG4gDsy7vLf+gKMkQQLMcIzkEAi5phELsAbgcJi08Lg1Wy1I
kAVZoAVd8AUAwnqJigYyEBLp1Acm0zJ+8JOtWQZxAQho+LTu5E5SFAime7Wd4BAukAleewqtKraq
sAqrwAqQULkZgQGvoLb1GQxbULkHcIhbZ7YbEAl5u7fVQA3WcMK0IG4jUQLcVqOLJw6foGUd8QGe
ULyNaQyH6xUnMHAHt17MQHMesQKqwIPNQKEj8QjR2EviIMMXEQPXwHjDIK8fgQIRJ3HgYAdBOwCu
22/jELQkgLk7OAwF/BEqwMOXNw4BuBAH8LsKUQKlYMPoYAxS7BEqcA3qcMd4nMd3XAql5xEg8An+
1ZuxOEwSKXANZOqCpHB4HEHDh0kMtHS+NnsFW4CzXuAFYvC+Z9AFstoQCVAHkmq/+Zu0f/B3IXEA
fTA+1wMJq9ZhkgAEEeFYD5EAYNCeDTy2EcwKruAKirDJC2EBFyx1uOpZrpCmatx+70fBRrAML0nC
J3zC1/DMrpDFF6EBy+DC4RBn29C7IgEF4ACZzGsMj3wVGvAMmUcOgCDNFkEEeUaCzPABIwEJIugK
VcALViU7GdEC1SCCuoDOFVECU/V4y0CW+Yp20iwF3zAOJBjFImECZlytL/gM0MoQB0Cm0kwF4RDI
F9sL/Byu0aDHHg0OTjASUQAOHu3R4CwSHRD+DcVLmyMBBd9wjLyw0ZCcKzZwBViAs+0rBt4oBmdA
nSRxAFyQj0ervz8ZBiIxB2u4htnZBwjrEEIXESoYtg4cwbn8Clb9ByFBAaxwqwf1WYbAzweAiF3X
DBQ8AB3wCnvbzM+81s8MCryMEBFQr7AVZ+MwC2CXvcCA0RYbDNhbFQ7gCzNIcMowvyQRAZuQicsA
vR0BCHwWDlsgED/AXuLgzhpxAtHArVaVCmU9ESHwDCIYCios0XqGziTgC5kIDH3NESQQDcZYCrfb
EBP9mehsAsGg1+mgCm99EBNgDCWdx7iwuSscDL2dx8OQ2hux24HcmLdgxCJBAr9wjK6w2TP+fSsi
kAVYwL7YCAZgcMll0AEpwQT5SzPiDZQ/6R0fMQYAyWrqzQUdamISsQCCMNWsgMtWbdWwQCce0aBr
K2zEcCR6unUEuoibnQCX4Mxs/czYkODY4xEJ8ArdxcVdeRILUAoZW9K/4LdScQCqYIypENolcQXh
kHnGMMYZEQeY9w09QBDDwF6NsxEk8AwkCLoewQGSy2ctXqGj7RALQAqa5wsvyhEe8Awx+JgTqKfo
wLz87ACnMNx4fAkfkQC2wOTqoAnSjRELYApSrg4XzuC1oNdULuGkYMOcMN3IcgA3rQVeEAbYGAY6
XQZVvhE4kLRJ+zdR4BFAEJDvFAnuJAn+HUsRJ0YRXPDA8w2X9Q0Lhj4EHbEAoVBQwVx19xoRBzDW
i8iIVX4HB34NCY4N27DpXuARg3DNXMxLa5ISB2AIWQ4Lb04Ud1C8f5DbEJED35B5wODhM3riOFAQ
UZBw4ZDDGhECy3B558W/HFEBxECCaADpC6unhZB55zALMs0QFmAMxQslelq9G30Ah5Dl5s0RiyDl
vYISB4AIWR4Lqb4QisDk6fDtmVoINhwgZF4s1q0FXOAFO0vvvOnqEhEDcg41QrM2MokREqDU2amd
tzgRf04RUDDohP4Khh4LsQALvI4RCZAJgXh+xqDNEHEAitiSz/DmbrDWmb7pIo8N1LX+EUUQ6rxE
Du6+En6Q5aGA7zeBA8WL3ysBA9dgjLTw7ArRAuEwg+KwAwaRAKzdggV3MkBueWcs0BSxALiQeUaN
7An37HtwjKhQ7gfhAL3gphYr7BlvsR797C3P5OYArhqxBOtw9mif9utA7SrxB1k+Cq6+BFLO9imx
B3p9Di777sDyBF2Qm1+ws2DwBWEABjAvETAANUDJ70JTCINwCBEt8YfwCKwWRYU1CZIA3H4uoxXR
BAvP8LAQmLIgC59g9eG5CPU5iCG9FZPeiC+Z6mwQ8iIv8txgDLReESAwurvkS+gVIiyhB1kOOlER
AdGA0W3wEihgDcZ4Cm8NAcsQ2En+gBBnEIPgYNwX4QHNUIzNUPsTcQCskHnHvhVsHBF4IIOPmQlb
9gp67d+Q3ts67/tMbgw6jxAkEA5qr/aj3hJ7UP/1rwgaQQIkPdwA8WbAQIIFDR5EmFDhwDzpHD6E
mC6ahYUVLV7EmFHjRo4dPX4EGVLkSJIlTZ5EmVLlSpYtXb6EGVPmTJoqWXDxwqVLlzBfvuxMUPNg
DECAAhUVlLTQUkMLRpZ5FEnSJKpUp9IQ+QlUyCqvvMKCFSuWLFmzZsEZKQcYsGDBhr0lRsyYMSwe
DzzD+yza3mhBOdbZFlgwN8KEJZGUNU6xYnKNG9sRahCQOsqV1a3DjLlLZJeTIkb+zMOZYIpr6Eyf
Ro1u0UhPqVOHUSjhW+pz5+agJBGt9m7e5zKNhNRbOB27wms75ejHtWs8Iil9jgi54wHLlpFvFEQ5
83bMhUjyysxO/Hh2fUQPBMRd/TovI3VVr27+fCD41T2dx59f/37+/f3/BzBAAQcksEADB8LiCzC4
2GInMBSsQD8eigokqUEuNKQQQ/o4IKQKIIFEKkmmoqqSKkYCJRSR4HgFLLHIMosWWkIICYq13IJL
rrkEsisvvvbyi6NGBiussG9sEAmKxRxzzBxN9Htkve3U2eHAjGaor7JO9FsBm+VQKyMkIr40DZGK
lHPtGwhQWmE2MnMI6Q3jeGv+5KMDvrxuo0aWi4gKkOZwKEt16rQryzw16kRKzNRpQaQryIOUnU+g
hFQ9KkO6gjv79ONEUMp8sDJUUUcltVRTT0U1VVVXpemILHLSyQufwqiBPyKMEoQQDJc6BJEvQDpg
kEhCHLGqSm4bKRQVQzoAkRfLipGWWjjp0KMW2MIxLh2NEQRYvX4E0q5SijTym2+ACbIjCawZh0ly
zIG3lnTP80RRzLbRgNUBaBEUl3lFa2Eb6B5CB06PFohm4HRYqVahD85xKLU1UvLhHDKNaZijIMg0
jZSMN7pzuUMRVdghcmTwqAhP1QnlY42oq29kjBKYRT3yXgmJgm8iHa+Xfzn+84Rn8vD9SGdFeflZ
qARk8ZSZpPWFOmqpp6a6aquvxpq/A67IoosvwgDjQTCc8A8KQQYpBO1CDjHEkEQQweCjICKhWypj
IXl6o1FGGckBVGCcRUZpa7FlCY8ouKWtHOea6xKXXwZ3r2ryrmgCY4o0N/NvwvxoECbhBf0aDvhL
4BWhx8N5VSIE5caD/lwQWOFqJPDID4UnuugS6LaRWSQxShbDoxLc/JKX3jE6YODjLUoAFugsiybC
jUYAx1NbKK/oACmXr+iCa05npwiQFmmnfPPN/+YD0k0HP/WOFFH0G9f3u6AaT9vIOn/99+e/f///
B2CArrAFLXghbA/qAhj+ANQFphiiVw5MRCIA4ZEEPGJExarEJCqBiXyRhBR8GwkJyiK4WhDOFrd4
BfYQEom3DCMujJvLKbhnkQOAqxo3VKFCWoANbmguc+CwhgM8AgJxNAZ08KoND/zjgF+Ajx1QWNUy
BPWD/7yAG54aREdIgI4snWMGGHnBwGCTElMojBszPMgBdFGyZ2SAWcoDCQSAsbJNcKQWnkoGBZgl
JSF+hAbpOB0zPkKCdZzPkEFYIjAMab7xQJEjJFDH6RDZnxmgY1HwAUcEArhJTnbSk58EZSijdgAt
aGELXACDGHryhRwKpQ2GGIQDEXGICCpCES7oSBBIpMFKXOISlWhPSUj+QYqSgEFGJTThLW6BCyRw
5AU52tZcaiE9YPHlhtWwhjVamRAq+PAb4AAnOMbIkUAc0Ry8meB/MhCN8SyyHdvYZoB+ICV1BCJA
MPiGoL7RkUUIig0acUV9tJkSC1xDHWLkSBpKBo5GMctQIeGA/TxFxYwcwVPbEIFIEhAe8vTxI19w
p/nE15FEhLQd3vmPBqJh0nfGcwCIOB1K/eMFe01MlDfFaU51ulOe9jQjVoCVF8IANjA0M0AHwEPb
eoWIRNhyEfgDWSM0yMtf/tKlCylFKUqSgFOU0BYnXCYucLGKxy1kDi6M5lyCkVGR1DAa18zmNa5q
EFL8MJzgfIZLLQD+DtD15hlojIwKwMHSKKRKFVKKBmAjg8/6JOMFHOkAF+uTi7ImpAdZyoJKgiCo
yWmkAtUT1CQdGjORvCAcngqGRiqhKHNgRaNC8+hHYmHSW3QkA+l4R251m1trKLYmgiXsRjKAjkWK
pxq+pckrFMWNufrUuc+FbnSlO139eCEnXuiCAXtCoATEEhHfreUiFMGRGlC1qpjAhGhJUgpTmMQF
XwWrWHWhC170YCMSCAQMYRgDkhwArta4RoCbSxANWOOudw1HYTcCh3P2xjRKFBAP1GFSSKDKBJXK
DEUFFAPQVqYRyB0IfeqTjoZqJBj1iUZlQ2IKQTkSI1TwFFpGAjP++IAYIUZYGQky4gFSSMlwI0kA
bEUCAnKE9B2u1Ygddrtk9f6HB+tY8m4rnGSTNrk/HxDH6TJLXS532ctfBnOYPRIEBmWXqF8oQYEg
YAimNtWWjbCpRgLhy0ugl86PUHFHTNFekzQivriYLy94cRiOrEAVMEzGFUri32wCOMByHQkXDgyO
cFR6Fhx5Bm9Qg4oCcSHKug3NqfwgtFUYSAag/YYRKHja+hiiI07IkoJRIoJzZIkWGgmCObLE6f4+
dCR0UFT0NvKDZmBmPM0hSQJCGtuPoOHTua3jRrDxbPcJqAvPfkeoM3KNkLqCQGY4nS/EPG5yl9vc
5xYlAU1pQFX+KtBAQWCqIsQ7iCDk+SAOqEQv6+xL9FbpJKc4xUlEENb50pcXvejFBKYThWAkIxmP
MMkB4vpoAc94GOGsdDjEsXEQaKQGu0lNOmBgoExE+RtdsDeBvscz/hqIBuCgxfw6ggQpgUOPHPHv
epaxkkMISn0ZAcEk4LONuPWatIhRzzW0cNUEuOEc4oGFSZTtTmZTMBrPRodvcwAPrne9618sUMmX
/A0vpJwgOcA2ygaUgGecLs3ohnvc5T53uoeKlFroQqzCIIbRHagOikhEFaqOESPoG72YyAQmLjHg
hAAcJZAAdKAR3gtfNKFohQiGwhdN8QBjAxuMJ0gQMq7xjW/+/AwaKYRrHLIVAyFMt+nAw5pQFYOQ
EtNKOgbJKKQknY6IQUpKUMkHLLme4G3kBazYDvAXvb2ShIAc6xDPN87A+BCQwhwyB/KySaKET3Nd
+RhphNe9zucCIazr6siD7DWyiGeTf0BIMKkb6j5/+tff/vdPyRN80oUGKaj4B1oAEDC7hEgEfkM8
xMsEK0iJU+A1kziBQBM0yvMFX7gPkHCjiKM4z8MGeCqJYCC9jVuMX8iIA9iG04gIfzMQHoCHd5iE
n0sVOQgpCMOaCQCkSDkHivAIBwiH9SCGlZAEKRHBjuABYFgHWziJjVqPwfuIN2AHcZAD9ROJFDjC
Z1PCjnj+BvHrOta7iAMIByzkOlA5EBV8h0pwwZcBh2fTMAJphpBKBvxzwzeEwzjEP6LaCQUZgyPQ
nwXoJfTKhD7sQxw8CVRIhZRghQiUwAn8BRtbiQPoPM/LhsBQRIR4gtJbDMa4AIyAAdP4jJ0LlT9o
uVUxhndYpGfQnyMQmksICT0QmiFQCRtQlJt7NSI4QiEriQzwA0D8jwSgwpK4Ai+EB3UALBrgOnkg
xmKMBlHxxI+YAV88xgOxgk8rnw6Sw2mkxmq0xuj6ApwwIC8QgzEYQFXhAF/yQ03QhEwgNJQQxJSw
goM7RF/4hV/AJf1gRA0UDN7ZKm6oRCaxsoTogoiojDj+cEMNeDZkyZpBEBoZ9AgOqEFI6YWVWAah
AYL9CDKeqUKp0cVPq8iNWAB08EVWvIgxKMaQlIc60J8x8EWSBMBzeDZVu8aWdMmXhEn+OYCd4IK9
S6X/y5or4MNMIMdN0ARFS4lUUIWUyACEm0BE/AVgcLf8OADPq0dI7DPG+Jw9wAhPeIjqALv7A4Jn
q5X8MQZ3AoeRiISQsq+UsAOh0Tb8mMhIyUioSQBfbEuNyASRLEb5sAhSoEti7MqsIQVf3EsDwYRn
65aYJMzCNMzDFBUlwC6e2LswOBH9SYSd3ITJ3IQTUAlVKLWUWIWjfMe1AIZoY8qn3AbCiESEyAF3
AR3+XcCIbaiPfXLDOOA6d9gtcdAfCgipLRGJFgipW0sJGwgpXJBI7cuft/TCuMyIIMhLeRC3iwiH
vCSH/QGHvBwHUQkCL3yHYUDM7NTO7eTOmpAVMwODMRiDeMyaA0DAntwETtiE0lyIVWAFlUgDpLyR
YGhIeXzKwmBPg1iAInqXvgpLi8iALKk2+0sFL7y0/MmBkOICkkiFkMKBlDiAIlskcwhOqtMf4sRC
48QICHiHvGyHGeIAehDRERXRWtCfDUhO3rQSCGgHL1SH7oTRGJXRGeUInvgC7RoDM/jGVHEAnuRJ
yuwEVFQJVnjPlFgBd0xKbHkLKBQNEgwMcslPg6D+hSPiDWlUCBrIknTCP3DwwsHMmip4NhQMiR14
tsxECVsIqQtUS0PSLQ1VlQRITje9iF8oRhKlB4RMCByw0xGVKazBgeTs0wPxBV/sABo11ENFVBhN
pZ7oRjMogx1FFQvgSfRMT95DCVfwtpSYgM5UUhdiK/wgQXLpoSgtCEBAIpBDByRTiCaAD8wIpvu7
AHnwwnHCmjx4tkIliV94tk80iUB4NlUVjYuMMjlFFTjNS2KtiETYUxHFyYSAgmWlhzHQnygQUbqU
VlFBBF80mETl1m711moUgzIYgzAoA0c9Pf3BAXLUBMrkhE7YspRwhQE1iVqYzxzZ1vM4AFE1F1L+
JQgu0LTTsLyKeAPL2A4Xs78YSM4p0B9PeDZ+XYJnA6GTOINnC1i13MXhjNOTMANoXY2KoANo9ZP8
qQNofcxQAcm8lIJvVdmVZVm6O4AcNVczQAM02B8loNT07ISyTAmvWIlFaItskYvvw1fMyRx+HQgg
qI2Qu9aFUITLUA9EgIIokNqppVqplYKrvdop0Nqt5dqu7VpIzR8iSM5F8NopyFqtxdq0VVspKNu2
5Vq2RVu31VoqKFu6LVvyVAhesM6IiwZfLLGSmNhPO1eL3a2uQ1ZTMVaRpIcuoAIqqIIqaNzIldzG
fdzKtdzHtYIqsIJGgFYVVQhIgNZGuNzRJd3+0tVcK0Dd1FVdsFWJRwhd04Vd0qVcx33cyY3d2yXd
RkjONGjZ3vXd3+2yAyiDMzgDMyBeNFCD/ZGCdfVJnO2Et9tZeS0JNFActJqLkh3aHvIhox0AHgg5
h5CxhcAE7uAZI3s2X+y6Y8WpLkjO9nXf95VV9JXf+aVfr6PZikgGL2SHk/ACX3wSifVFgjwPDBW/
wy2VBIDWBFbgBU5g11wIT2DgCJZgaGVSoJngC8ZgBYbfDS5GSwXeDwbhEP6kBSjXNDBhNEiD5NWf
LNAE9eSEF+4ET+i7nY06lWiCFnqhYjCGX2FK7dUccODeHjBBiKDKitA9Y4sUd8K2+XVfA77+mj6w
Uw6W4imm4vrFwvtdCGvQ35NYgC7EwncwAQD2Qi0dYLi80AxG4wWmnYVIhTR24z2t4Mho4zem4zq+
YHsS4TzW4z3Onw84AxROA+RVgzjLmjJIT+eNYSs9iRZZCRtYHMb5J6b0JnAKYnTwR3Uwk4pQriRW
4u5D3w2mBye2mki4YCo25VOeYixWiOiky3ZAiTogRiycsun1xY5VSzMeTjum479FCFrQZTeOY6Hw
5V8m5mKmB0Lh42RW5mWeiQM4gAXogBeIgRvIASAgAiNAAiZ4giiYAivYgi3IglIKZy640fA0AzH4
YzVQ5zUY5DVogzdwAzeAg3mGgziIgzn+kAM5mIM6qIN95mc6sAM7uAM8uIM6COg7uAM9yIM+8IOi
QIqzUZu1OYSJ7pWl+q42c6pFaISNboRH6GgQEZFd4qU9vIRJZd52bVdPUGmVBoWWVpZQGCZSKAWZ
zqpTMAWAQwVBFErMZAVM9YoWCYtniRav+rNA2wWj5Mwkrd4X0i9jcDhlUIZlkGqpZgZmaIZmyAu8
iJy3uqGJy8ANvE9ymeRJy7jSE4claZK++ldNhIiVsRlI6WRP9kJQNua6tuu7nmBU1uu95uu+9uu/
BuzAFuy+xuvCNmwSrYfEVuzFZuzGduzHhmzHPuzJpuzKnux4GGy+tuLNtk5s82zPZqn+0HYnJyLt
SLGX00btS1qZ1Wbt1nbt14bt6igZ6OAY05iT2jAn0HGXxqjExTDrjRu9Spu0u/ImzRHVwhBNwdBA
bOC8R2s0a7imrf6RrM6Lq77qqmaGqdZuqIZqh0uGpoYhbSGGFhqGtvBMYHjHXzjK9e4FQRO0ghMr
sVImZYIvZJIRszALspAFsYgFsACLn/5pTHUFIl2FAl8FVUDwVEiFnAa4PTOFrPqgvRmFl27pCv+E
T1hpT+iEDX9hyiTHxKMzX8qgC6obj+boE99ojbalt/mupVqbtBmEsxGEoviDP/CDG++DPsgDPVDo
PeiDPeDxPBDygK4DgOZnO+jnObD+53umgzlwcn1WcjmIgzd4AzUA5Jkt3uLtxjFQJexaEC/Qgiy4
gjG3Arit3ShwgiZQAiU4giIwgiHwgRyogRh4gQ/AgAlIAGcGW2eeABSIgRjAgR3wgSA4AiVggiVw
Aiq4AiwI8yxgdC7ACa8xgxxFgz82YTVgA3Zmg3eGgzeAA32Ogya3Z3xu8lIfaIHOAzw4aITecR//
A4euEIjWEKWyaKZChBWXt0XQ9RN/hEcA6WLhJfPaIMRb13V94XaNYZW+cJcOhb2J6axir5vGaZ1G
8ALv6Z92kRfB72MinPmWL/qavPXm1KVOK6d+6qjW7qq+aure6v/iPHoM63LxIbL+LmsQRGsjUuuk
HeKr9BTy5WQ2leu5dt8LngfLNviDd+PMVviFZ/iGd/iGR/iIz+DIpviKt/iLx3iLl/iN5/iOp4eH
f1/OFvkV/OySXzLRRvnzKe2VJ4/UdvmXV+3YlvmZp/mVmW2IqO3bzm142W1y6O1x+G1xCO7hJu7i
Npfj5obkDozlbu4Ae+7olu69oG68sO5mwG7tnmruVgbv/m7wngttaaGfPe/0Xu8JRDj35oX5iu/4
nu+vsu/7xm/93u/+/m8AfwUBJ1JWMHAEVwUFZ3Cb3jMI35uXVpYUAYULR/wM33B29ck+tLN8y6BJ
IPFhMXEUbwRdFy/As/W3mej+DLkQQSgEQTgKQLBxHO8Dhc4DPuBxPQByPNCDOwjo2DdoO6CDfF5y
J5+D2oeD3MfnOIhnK690mZ3ZcjUDRxWD8FQlMfCCbx7zMZeCKJACKsjcKoCCJjh0IyiCIQiCH5Dz
GGiBENAAClgAPc+PDECDEk4Dd47k/PkCZE92T/gE7DsJsViJNmhqh1tKfP2mSeNeH8gSuwSIAQIH
DjzFrh3ChO3eMWzIEB7EiBHlUaxoUR69jBo30oNA8CPIkCJHkixp8iRKka84smzp8iXMmDJncrRi
cttFiu9S8kwBL6c8dRp4lkQDVN4gokp5JjjqYCnUqFJFJqBp9WW9rFq32iT+yWor2LBix5Id63Eq
2oGsrrJt6/Zqp7Ry59Kta/cu3rx69/Lt6/cv4MCCBxMubPgw4gRm0JxBg2ZNGzeIB1vh1MkTZk+f
QL3IG0tWXkzGRo9OZrrKZIEHwLFuHS7cgro+1NGuTRuOSU4KFzpsKPH30Yo0z6YuTlDX2+TKlzsx
+azlzrulXPqZm+YonuJNMXJ8arxv1eUZy5Kvl6YkqPLq15st/mnsPfHy52eM+/0+/vz69/Pv7/8/
gAEKOKBgB5gxBhpppLEGG28QiFYTl2WmGSg85CXLLHn5QpoxpimjzBLFrebaa7DVFYRtta1ThkmP
JNQbJ2/IKCMcNdp4Ixz+cei4I489+hhHAg/+xQMSRRqJxBFJKrkkk006+eSSRj55JJJNVqkkEi8Z
YZIx0OGFg0voUCBXGi6xoZ1LxAmpVHgsRaHEEkw08QQUUUhBRRVXXJGFFlt04QUYYYxRxmILRvaG
HHG8oYYZYHBxBRVQNOFCSZWM9ckcmWq6KaedevpppkGmZqlYnswhB6qpqprqqZuu+uqrK8EUC6y1
2poqEmvquiuvvfr6K7DBCjusiIQmCJmMxJLkw4SfOAsKFhdmeNcGHHr44Q0ikhiOOOLERpcbKa4z
bhMm5cFbb1squ+5+L+VgkqwcRXdXLy7RIRccLl2BZktqsitQm/TYo5X+v4b5MVYS/350sFgJ8+VA
NDB9M6bCFVt8McYZa7wxxxuXccYZCjaIG8YbZObsZqDskdcs09rlA2nXLrNMCdqWyG23385liorj
jluDSVX09g5E6nZ8tF0OvPSBSYu0BE9eRrhETsFL7eGShakFvFHV6ybQXmpY4DM22WM7bHEWCPtF
AzxlbYI03HHLPTfdddsttxkhMwgZyRdLcPKzoHCSFy204FVHacl8OPMyEYhYYrfdjqOzXN+o4/O4
7LAzVEk7OCSREneLbpIJLs1LEhouiXpXxC2diVYjLonAL0tdK/u1WLYL1kPZZTOBcQ9jleuXGuSF
PjryySu/PPPNO6/+lBmLqeEGg26sXnECmAUuSiihUE4XLbXgFUuHiivDuDHGHfBa5OO4//1UMmCe
OTvmnATCQ79l8TzyObj0zEmO4BIP5AULLgEH/JQSr42cLjFpwhjuwqK7wJCgd2TrAsZEgA+xYPAv
sShLODDAvxGSsIQmPCEKhaSFQq2BQW2IQcYwgbLu0RAEeAnfXUBQvsUxzhPqi5w43DcOciQwKnLA
nOY01wuUnOM3EJlDCuUGBZeY4iQtcEkQ8pIAcLhEDGhpHUeSYZytaWSCwoogWMwImHVYEB92yBgb
LfjGv3AgHGUhRRTzqMc98rGPfjyJBQglPTYQMmNoeBYNQzGKfd3+pRa2uMsVZMa4ZYzhh0EUIjmI
SJdh0C+J7KjOSVwBHHmw4o8ao4NL0IASc7TkXnnJV0u2cT2lTMAliRjjAy+Gxq2o0YNtfEXGYvHL
wBCBPE8wJTKTqcxlMrNjZfhYyNighjccAGM0SJkiR6HNSuDFkXcxhfkmuQxmwOCHmMykJuUCg3V4
UnMIyeJJ2jCRipijms1clyfGggOUpEIsytCLBdThkmhFBQguCRHtONLLX32tjQvtCxzaqA57Wiyi
FpxoYAxBNrGYgwP3/ChIQyrSkRrnmcZSgxrY8Du/baZ72hwFKUiRgbvY4pF1AYH5zsc4ZjCjiIQ5
wDnJYQ5z+FT+KYZop0IsgJIc/CQn8CSpr7ghlnbMciTFE0tn8nKIsViDokq5Wks8qh2wWSwBbcTH
Q/myg7MWAWNrbWNbAZOAZJx1bKqAKl7zqte98pUkXDiDGMiQoJRKBmOaAEU2YUqKUnyBprewixs+
pNOZ8bSK6nMfOodKVLk4ABxJ3A0xUpIAdOSEHnjs64NwMBaXmYQGY2mEXkhAj7FAISrREAszoJKA
I4BipnTZJcHqUlStnTWte0kAO/yh3OX64xQQjGPvLAuYFrCjrvhADWqzq93tcjeKCTjDGPKWhpSy
4ZgXm0I2Y7pYU4yiqmi5xWN/CwweUpYZzagtVA5ghKzN5QD+6BTqUM8x3JSg4bO7UWVKMGERjcAj
Bd39DyfGsgWeXEMs7xArXt4jlmZAJQZjaQNRDgCESqQjK3qoC3CzYlySiCAdxsBDDryq2ysgdC5m
deh3OMHc5dZjBRjjRBvp4ePAZMG66LDhg5Os5CUzmWPSG28a2NAGOLhXWRZ46WJLYQpTnGIIdrkF
LupyBPqO077NUCqboBCMbRDDO3LxL4ADLOC0LIAbB9kNQ0LAkx9QhCWf6KsRUCCgF8w2LPK4AE/y
MBZJ6MW1YzkeUSAxltktVRF23Ao8ZvBbsqIlAcHYCjo+MQUM82QBZeAGPr5Rgd8W9ztB2PFyR4Gx
IJxV1oL+GYV1YdHkXfO6175ekxSg3AY2uMENcADxxSahWC1z+RSgqHJUcBFmG99ismVuRjPsU+ou
KAMb2/h2J2QsFf9q1hznOPeAT7KG3aArvilZjUvepdcw1EMZKy4MLcYCTJ68YCz0AFpebDGW9BHF
AuwQy7RPUgGyWEOEcklxPe4dkk2c9RpEoYAcyFE2WYg7Kje2oMTxAlRYK3cHFxs5yU0emAlsw7pc
+DXMYy7zmf8UDShtwxvaMGU5GE1hRohpKbR8ilOgAhWQlgsudEEXJVibp9h+Rg+IMoRnYMPb3/62
Ifqr2XOfGx3pLokHzIHnhlBBKYBwSTS+nkxBkA0Xaj/+zBXq2hyiAOOsyYA2WoJAFi/zBBBjMS9K
hkEWX+CdKZyWSh7qGg2eTEEdbXzbw1v9nUGQ3B/VeDuvKE/yywvGf3VVBwloLvrRk770SxmDoXAO
hzfEYQ6Ow14omM3loqPiFBKgS9LnsgBeTJKnZtZFx0kCiKpf/dvc4EYf3iznrnsdLZ1QSG9kqRQQ
tMMliIBqAnBdNly4WT8pcHwbsRF8khyhroHQCzPO6gue4M+C9Vg8T4pJFlaMnymSn4oXrLuyBNcV
tmn5eD4wV8jhRQjQQ+UpwsUU4AEOhh1Yl7uZHgRGoATSXAKoQfW4AY3IQR0UHrBQAbMNHSqkggge
Al3+6ILSycUc9J7TNcMz1FhKxIDVXd3xHd+JocUBmBvzoUPzSYURvMjQsMhSRMJLAB5IWYAvtFEw
UEx+zFVdNdZSNMNZ1cNT2QUV1FXUoQQpnNUUKMUpWFco1B9KfFzvDOAAPEE91NU6dABPAIF1+d9U
JEDlkeFdVELl+UMUXAwdVt4dCkYv1KE/VNIEBqIgDmKSkZeUGVsc0AEdxIF/DAGiocUCCB3tiaAq
qMIUToUu8IJcnEDTmdkzBAMHhgQmFN8MHt83nN9UHADX6aAOpgPmfcQGgANCDA08mMhSpMBLrAMM
8UcCNMIVgOGD9OGOkQ0zEFB+eEJdiUMohgQU1BX+OqiAyH3DWRnOSTDBWXWVUliANNbVKABjSYhh
2Qyg1FiXGSiQdU1Cp8UhfqwAPlTeO2gaL/qiN5YEO7ojPAJGCKBDHbaDgxGiP/4jQIpUAhTblBmb
HMyBIiJYfhwAG2BCJgyCnk3FFcxe0aVCJa7CKhgjWmTi/72CCj7dM8xdNjKD8ZXiN5xkI8yjSKji
ObAiOqSDK0bFAcQCuvgGRJyBVFSCS9TDN5jAfnRAMCgXN4jBK/LHMPjhNrQAftCBdQEiVASD4ilh
XahBXe1TSYCAOJzVJabEDsiDdZ3CMlLF/S1FEMCDdS2RUnwAOvTOjnmCSoYEHJKcHN4FJtQhOJz+
wE8GpT8MZVESRF1W3l0KBhP44foFpGEeJmLyURfoXLGx3kHKAR2EQX4sgCBcgkNmgiYoQjl5HCcQ
XQhapCpgZCncHlrwgiaiRSF8JAs+A/1FhQ1sQylyw0nOZieEJUiookvCZExChSHUZP7AwzK8JUhg
ADlwxFZcgxrixw6Aw46Nwxu8Hq84gR/6wznIW3GITV0Fp1TIAD3U1S/0ZUlIAPhZ0Cp8I1S20eBE
BRdYFz7IAniCI9lI3A+0g3WNA5IpBRG0Yx2+gm1+RFzC2lzaRQboY+Vhg0Z+x3I253NGxYDWoYEK
hiT44eskJoVWqIUqD0MyJhwcJB0gJB683Hf+ZIAkVMIlYCZmbgInSMIPCOdAqMAkWiRGsgIrZEL3
QQUvoKVULIFqPgOPDllUiIFJzuY3sIYq3NsBsKJupoM69OUV0KJEqJxUcIFGbFhyGscZGCDJqYMe
ONyurMJ0wsPwTIYAWReURgUiWJcs9CdKBEJd7aJIVMJZjcMjRoUisKcvrNpSwOfY3JsP0Gdd1QMQ
SAUdTKcvSCVTqGN+eIEfRsOBpsaVVp6WcilRKGodPkOj8sUCREMdykNWXainfiqockwPHGLr0UEd
mKod3AGIpoYTVAKJOqQmxOomdMJl0EBU/EFFXuQqyKgrcMIA9gKOQgUNdCJI/kFaHIIpCmn+a4AD
L/hWiLWibtJGUR4BO/TGb2iCXHwaWVxDzaRGBJTCdPoDTvLKBWxDuCLbYQyBPPghtqKFA1SDH6IC
i5oECHRnG9laSMhBXfVcVHShdT1DRBKFnqLVUvTpdIIBWmzCdD7DfR6qXO6HMfghNvikt5pCuI7r
UhCDH14Dxf5FDKxr5RnDvIYqyZasyfqHF2DghiYiquJBHqyqYSQAHkwCiVomZmoCilrGSkHFAnwC
aMYoK7iCK7yCJ5AmVACrVLSAMezoM9ACeBLEAYSCkA7psoKDMnTsu71ktEqrUvyAOnzOb1SD0U4F
CpQYWXxDpxpGDFhDuLohr7yAOoRrJIz+rFyU5caOrVTEQDv4YSnQ7UhoQuXhg1KCxBTUVR083BFa
1zdspsMCaNe+w3Tekg3awnQuLpsgan6kwDr4ITgwrtpeQ9tKxfdxrpv6RRn4IRSdrOquLusGiLGx
XuvVgR3gwR3kAR6Ugd+ixQU0wiRYwiX8rkNuAorSalxJhQdcpIwG7dC+wiucAtMcbbASxQsQA9Mu
Q+jJxQLEgrIu62tcg3WixAEkqW1gHhCkA9hKBDvcY1owwViQjTrwXWFwATyEa1IAyw/M73TWwpwG
RhLgb+X9G11IwXR2Y13EQB22K0EMAZbCmnPNxQQsw3SqAxEILOaiRBH4b+WFwlxEQMT++qE6FG8Y
VjB+SKcfrgMIDwYXgKwf1q9UkHAdrsMRBIYr1CE9lG7r3jAO5zBhDCQcnApk3gEe0K7tvoGaygUT
0Owk/K7N4iwnWEa2pAUV7CqvCi3zvgIswAL8EkUvFGbXJgPTPkOu0IUE9MJJVi3kgANBge/W1sbb
NcE6nO9EIGxdNAJYWBA9AKFgOMAnhKs/FFawCFC4boOtBgYY6Gcd4vFcGMJ0gkLuggQs/G+3CkQP
QC7JDUONooUGwKsf1kM5ipYIl8QULHDlcRxdYICmbnInh/DD8kcjTCc+pHJgOAAo8LEfT0UrT2ff
9AUGMGflaacO/zIwB/NdzECNoMr+HKSqy+aBHizz0y7FAszsJEgCzVomrApvJkgqWvRB8lIx815x
LMTCHaipL3AxT4QBma0gj+5fXWAAMZgx+0jOI3xd+CppiqidGcDxRFzCXSSALmhFXXXCJe9FDWiy
H9LDHg5LE4hy5cGDZPpFAiBCuEKeXeRhHX5CIxOED9ShG/5AclUy3spFCJjrdHpCQMPlJ48EG4Qr
MDRzSICASPshSauy4/KiMMJ0SedFDbDtdBq0jdX0fnJOX7xaHdagMBe1UR91ShQBosyB7AbxHujB
U+9BH9jAX8AAJEizNL8qrOJsIwSoaiCC8laxFX+zLMgCKQQsSowzUVQAJ5yzJz7+g9vWBQcYw7a0
j/sMg4+SRPimCNeaRAJUAj43lSpcdEhIgDKwJz5Egw3nxQHQQT2E6znwF7EsgUJXni1cr16oQAf7
4SsQdkh4wnRaNF1s9o7JA9NQgQrv2DB89FyYADeEazTIwEn8546pUQLo2HQaA2unRQm89nTG9myf
9H1IAARPZzXIdl8cQB089nRGdl0Qd7iSQxj3BSAs1zzsWD0AHFJvN3dzNxQc5OzmQR7sAXlLtR/4
wRd4NlWcgSS09yS896ve7Cb0QRH79SRwsxXDwmeUdcvMgdqpdUoEgS+4NUh6Qn2jhAcoAzhAjuRg
FjmEgxqA4QHw9eUM2AkAQ2D+UwQvsDRJcMA1ILY82IF6h8QNkHYdRkM/sssRpPYLEzFeDGRH++F3
6sUBzLIffuFcPEEdzgIr1KEuQCdeoMA3hCs9iPg3CjdBrICJk5wyGGpdnMCQ77SRkwRtC+B/cAA2
EPkdjDhIlDgfo/hdYDkfp0Ik0/iSK1c0CFp3rzmbB/MVMLV4j3cf9IEe9MEfnHcfoNld7AAkREJ7
t3fN/u7NjgGXD8QCaEIVe/N+t0zhvEIShCKAm0QJgIIk1dfTmQKHX2UyvPMlDVEmDZUvDPJK8vW4
DNcVnINNjpIxOLlduDZ7KlczSDZdgECE8jEtTIDFcDQf7+UUjHgSgG64KgP+nu5FJExn377ZS++6
P4TCgfOECvj2dMY6lSO5QHTB3k6nMuwvXjw7rN0DrD2DrPsntX8HlPMxuOMFCEzCrt96XpR7uMpD
nvNFCsT4ctUCrrc5vud76z4BMuNBVJe3nQPCH6xBpg+ECRyCn7v3NGMCNWPmVtrFAjxCfus3f89C
4YRPLbCCExRepI/ECkzCDhErC2ZCs/OEBvgCzgTV1p2DJ6j5bYrLuNx0DPBChlNELXg1SYTAM5wV
rK1C2qIFCSRCZVdeSmLMDRAoH2/DGZBhAmTBKYfrj/9FdcdryQ/EGCi7cpHgX4TA00+nz1MFkteA
Xk5n1PcF1+86K/z8QFT++XLh/F6cPR+nPV2QgCIMPckVvV7Afbi2wyFQWl5UwY5BQqHrO+EXPs0V
QR3gwTJDtVT/QR/4wR9EPiCUAUsnwA0kQp9HQjRL88JjgkNWgrMelyEoesUXTi04Uk3Nwhv4PUj4
wi+MBAUwgSnEjOKooH09gyEMvkhEACw0eGatfEuGwveqhm1gTkDLwCfUpBNVRHsBhgXUXdn4oSv8
wBsewQzvOj3A7MW0ALDvejt0ghGo6QEEwSScg7KDZWCowXTyJ50hvSsjsl9YwNiHqysEqriv8kfY
gCkYsh+i/19YAEAM8zeQYEGDr4AMULgwgUGCEBZGlDiRYkWLFzEqtCD+0GFHfwgzYkyAxJXHjvS4
hFSJ0QIxkx1nSVmwkqZCTwPxnam5k2dPnz+BBhU6lGhRo0eRJlW6lGlTp0+hRpU6lWpVqxVv5NGq
p0/XP37A+vkDCNCgPDtm1lzQ4s0jSG4jRZI0d9KkSpcwYcpkqEHUA3RiBZY1izAtWrVq2bJ16xYu
XKrStIAY0dcviQlSYNlkjDPnZMmUKVs2ehkzZs2araGagNM41+Rgm5N9jjY62+me+ckRQeEBdb/X
BV/HzkFEFWJ+tXu3fDk858/lRT9EdYEqfPheFuR26AeFlQlkfBnVLrtBcTuupldY4VZ5h+xgvenh
weIBEkDkwFr3Mp/+w0VVoaDnJV4kEEoP99Ypoqrq3CNou+4UaqijyRRyIQ1jGvTnv6kWWCVDf75B
BMIBJHSIQvVW6vDDEEcMCTwwxvvwvKhU/JAeXer44QMBioIAm3WIQFHIIYks0sgjkUxSySWZbNLJ
J6G87I48uOrKD0DAIisQQQYZRBAu26jCCCCGGMKII4xI04gloOACj0bggiSSR+Ciq5K78sLkiwOo
GuIVWQabxbDDFGPMMV0Q5YWXVxDpAokdfvnFhybESOSVYYghpjPPPhONNNOaGYaGq7oIBzZyZDOH
tnNsQyedV9P5rRlZSAFOOHbYAYUTVHgRp51fmWvuOeeiM2eJq9T+EPBDf7DpRZVRoI0W2lJg8YWb
ZQmiRYMokzqgEWwLgucZX2IxhZVbhsEGO3DXceKqH9Qx6J6CIBFqA3my2yaG9NZQ9sNmS+oIlVEu
jTfDdq9aox5st/HlFY9OhJKNhZdteBVSMM4YY2qtBdcfbalqg2Js32nGF1iSEKqGF7ht2eWXYY5Z
5plprtnmm40UQ489+vjDZ7G07LJLLgUppBBDDkkakUQUabqRp+F0C5Kpp5ZLkrrwxKSSFa7CwJPB
DEMsscUawyVRXnrpxZe1K/sFmGCCGQZTTTc1plNPRzNtlAzUi4EZVGer7TZYfyvc1ltxZefXxYN9
Z1hi5SHmBPX+crjW48s9qicOnIEyIhzMQS9ImRTUe2Ebk4wYKpIBMUCx8tBDH53yb2B/6OUcaK8d
dM2vwh30NjgPXvjhiS/e+OORT155mjrg+SugAQlkS6G/HMRoQwxBZOmmF1kEajiprjquua6+K5Mz
ElAvAS5kCXtsQ81ONG21144UmLfjnrvuu0krzRgq+ISiBwgCVatqlateZbjCCSc4iVPc4pQTrMdF
Rx1xSB+KKPCIdekOW7yAwfJCYoFQcBBb8qjDBdWTAV90xBwBDEoLTLIIF6ongyT8kAlRmB4KQEJ3
EYtSBXhow2XxYl86XN3lgAdCJS6RiU104hOhGEXjHQAKftj+A/SiNz1BBMJ6R0vaIRChCKYpwnvf
k5r4rCaJuwiiAkS6QCPEVqiynS1tbGsb/uSWqbrZDTR4WwYiLGCkF9jCgIOLlQIPN5zEQTCCzJmg
PFBBAiPVAENCLA84oiBFigRBGZbMjitMUKQDPMIhiCiKKt4DhSNR0pMmAeUkKwk6H3LLBrFsZUcw
SaQbJMNjSdTkL4EZTGEOk5jFFGYCvJAlsgBii0KzniEKAcbsMa0RZTQj1cZ3tUlcwg+tW2Um5NgY
ROlCUfSrn9vwqL/9hYY0m3CBkppgjFYRDpHqYKADGdm4CfIiIUmyQjRuaZBtgCGHw5yC5QLqD2AE
CUlTYEf+QUZFlB0YZBgoUJIVqpFQhTIUSRiVJc2ukFGN+mOgBUXRAbBgDWz50pgtdelLYRpTmc50
Kgm4wjKlV7RCPNOLYDxE08j4vafRqWrkm4Qa2rikEkACfnQ05x3hlke6bYp/jZhck4rAC1gdUoH3
XCQE9TksV+TASU3g5S2BAUCYHoAJvbilLHrAJBTwYiDPOEowBvKONswwSU3opCfhWta/gmuWL/Nr
QNPKVyMdNkMspeljIRtZyU6WssBMQAzqMD3sQTOaSNNeGK1pRqLKSRJ4kIFJlbQBLazCbOV8qv3S
qUeqgsYVVdhWlGYQiG3U06u4yqcEnRONOnAtSjlohDn+bHgNPFj0sTE4BEJrhw09vPNJTyAGGo6i
BHhIQgTFbcQ5OChd6kLJuOBdVmFhtoPvJhcPpHtSDhQxDvc4trL1te998Ztf/SIpATQogxexp7RE
LK2MoQUfJA7xBAug9kkk4AIn0PZadEZVtpvKRBa6C7MD8GAQxlgg4nwL1mCxgxd5qEHMDlCERgAU
c+pIBRhUUFkB0EAPxPAXtuoRDEDgQJMMblKKV3y5HO84ABpWMYvdwxvOARnJHnMxGIjbsgMEwRDG
2KBD6LtfLW+Zy1328pcvsgASDEEMgFhaIphm4DyIgQkpgICPXZaAEzRBDpWgRaTcFtW5yQISbkDC
CRT+K7MKBCEOmfBFOBz4QGBxoxaRUANacIaBJOQhFMnYj0nw8Y1gjKIOSDBBkfWbgBuMQRK1uMaN
HTIOX2QCDj9IC5ifImk9VPrSHlE1q10daSXM2tImUfLwMrBrWr8k05uuQxKuWrMIBCENjYjFNd5B
kCzDmtrVtva1sR3MAySA290+QKCJl4AIWIADcNuABSAA7uFJ4AMoiAEObPACE3Dg1cijgAhaUAMe
8KAGMUgBB7IdgA2cAAY24MEOZKCCD9Q721K5d74PnvCFL68CJHBBDXqwAxq4QJIUtzjGeWCDGKig
A+oeXgIowPCGr5zlLXf5y2G+krjFnOY1t/nNcZ7+c53vnOc99zlNZv5zoQ+d6EU3+tGRnnSlLz09
cmP606EedalPnepVt/rVYep0rG+d6133+tfBHnaxjz0jWif72dGedrWvne1td/tMMfV2uc+d7nW3
+93xnnenxF3vfff73wEfeMEP/umZIvzhEZ94xS+e8Y2PqeEdH3nJT57ylbf85VEEecxvnvOd9/zn
Qd94TYWe9KU3/elRn3qqj171rXf962Efe9lrmTOzt/3tcZ973e++eLXn/e+BH3zhD5/4S/F98ZGf
fOUvn/m5P37zoR996U+f+op/fvWxn33tb5/7Xb9+98EffvGPn/ww/3750Z9+9a+f/TI9f/vhH3/+
+c+f/jh7f/3xn3/975//Url//wEwAAVwAAkwIv6vABEwARVwAcPvABnwASEwAiXw9xxwAi3wAjEw
AzuvAjWwAz3wA0Gw7zgwBEmwBE3wBL3PGFBwBVmwBV0Q6kbwBWVwBmmwBsEsBm0wB3VwB3nwpeym
B4EwCIVwCIHpB4nwCJEwCZXwZoxwCZ3wCaEwCoekCaWwCq3wCrFQKKgwC7mwC73QC7fwC8VwDMnw
CD+jDNEwDdXQBs9wDd3wDeHwA9swDumwDu0QAefwDvVwD/kw/vKwDwExEAVR+0BjEA3xEBFR+Qox
ERmxER1x9hbxESVxEinR8yKxEjExEzUx8S7+cRM98RNBke46MRRJsRRN8etC4xRVcRVZUepSsRVh
MRZlsedecRZt8RZxseFqMRd5sRd9Mb928ReFcRiJ8aWCsRiRMRmVsYlEYxmd8RmhsXiaMRqpsRqt
sWWm8Rq1cRu5UUiysRvBMRzFUSm+cRzN8RzRkSbKMR3ZsR3bcR3dMR7lsRtHYx7t8R61sR7xcR/5
URn1sR8BMiB58R8FsiANkhUJ8iAVciE9MSEZ8iEh0hEdMiIpsiIBcSItMiM1Eg4xciM98iPFsCNB
ciRJUgpFsiRRMiWJ8CRVsiVd0gZZ8iVlciZRMCZp8iZxUgNtMid5sicZcCd9MiiFEgCBcij+jfIo
5a8okXIpmZL8lLIpoTIqse8ppbIqrVL5SuMqtXIrp5IZuPIrwXL5sjIsybIsf28szTIt1TL20HIt
3fItS68t4XIu6fLy5LIu8TIvF+8u9bIv/fLv+PIvBXMw5y4wCfMwEfPsTCMxGbMxyW4xHTMyJRPr
IHMyLfMyma4yMXMzOVPoNLMzQTM0be4zRbM0TbPhSPM0VXM1vew0WPM1YXPLXDM2abM2KWs2bTM3
dROmcHM3ffM3gak3gXM4iXOJhLM4kTM5iec4lbM5nXNmUOM5pXM6YSY6qfM6sZNJrDM7ubM7hWQ7
vTM8xTMqwHM8zfM8j6I80XM92bMn1LP+PeEzPi/iPeWzPu2TPu0zP9uzGexKP/1TPvnzPwV0P/tz
QA10PAP0QBXUOxN0QR30Ohv0QSXUOZ+hQCf0QpGzQjF0Q4tTQzn0Q33TQ0F0RGtTREn0RFnTRFF0
RUtTRVn0RTnTRWF0RidTRmn0RhnTRnF0RwdTR3n0R/XSR4F0SOdSSIn0SNXSSJF0ScNSSZn0SbXS
SaF0SqNSSqn0SpHSSrF0S4NSS7n0S3HyGaIBTMm0KcW0TNH0KM80TdnUJ9e0TeH0Jt80TunUJee0
TvG0JKNhTPO0T0lyT/00UD8SUAW1UC2SUA01UR8SURW1UQ2SUR01UvsRUiW1Uu2RUi3+NVPbEVM1
tVPNkVM9NVS7EVRFtVStkVRNNVWfEVVVtVWRkVVdNVZ/EVZltVZxkVZtNVdjEVd1tVdVkVd9NVhD
EViFtVg1kViNNVknEVmVtVkZkVmdNVoHEVqltVr5kFqtNVvrEFu1tVvdkFu9NVzLEFzFtVy9MBqq
wVzVtQ/RdV3d9Q7b9V3lFQ7jdV7tNQ3r9V71VQyrIV339V+9sF8BdmCzUGAJ9mCl0GARdmGXsBqs
gWEhNgkdNmIpdggntmIxlgcvNmM5tgY3tmNB1gWt4WFDtmRZcGRNNmVPEGVVtmVBkGVdNmYzEGZl
tmYl0BquwWZ1NgJxdmd9dgF79mf+hZYAg3Zojbb/ivZolRb/riFnl/Zp6a9poXZq409qqfZq1c9q
sXZrx09rufZruc9rwXZsq09syfZsoc9s0XZtk09t2fZthc9t4XZud09u6fZubc9u8XZvX09v+fZv
Uc9vAXdwQ09wCfdwOe8asAFxGff0FLdxIbdwFzdyKTdxJ7dyMbfysOFyM7dzHW9zPTd0Gw90Rbd0
EY90TTd1Aw91Vbd19Q4btsF1ZTfvYHd2bbfuavd2ddftcnd3fTftevd3hVfstiF2h/d4wa54kXd5
u055mfd5rc55oXd6o056qfd6lc56sXd7i057ufd7fc57wXd8c058yfd8ac580Xf+fVtOfdn3fbHN
feF3fmFNfun3frnMfvF3f/NLf/n3fyvLfwF4gCFLgAn4gGPKgBF4gY1pG7iBgSFYshw4gimYpia4
gjH4pS44gzmYmDa4g0H4lz44hEn4iUa4hFFYibjhgVO4hVWYhV04hpFnhWW4ho2Hhm04h4MHh3W4
h2uGh304iGEGiIW4iKOEiI04iZkEiZW4iY+EiZ04ioUEiqW4iq2Ciq04i6MCi7W4i5mCi704jI8C
jMW4jIWCjM04jXsCjdW4jVeCjd04ji8CjuW4jiWCju04j/E4j+t4j/k4jv34j9s4kAU5jQm5kMv4
kBE5jBV5kbu4kR05iyE5kqv+eJIpOYot+ZKbOJM1OYk5uZOL+JNBOYhFeZR7uJRNOYdROZVreJVZ
OYZd+ZVbOJZlGYVpuZZJ+JZxGYR1eZc5uJd9GYOBOZgpeJiJGYKN+ZgXOJmV+YCZuZkH+Jmh+X+l
eZr3t5qt+X6xOZvnd5u5+X29+ZvXN5zF+XzJuZzH95zR+XvVeZ23t53d+XrhOZ6nd57p+Xnt+Z6X
N5/1+Xj5uZ+F958B2ncFeqB1t6AN2nZPOKFbeKEZGoUd+qFJOKIlGoQpuqI5+KIxGoMVeKMRuKM9
moBBOqQBeKRJmn9N+qTxN6VVmn5ZuqXh96Vhmn1leqbRt6ZtmnxxOqfBd6f+eZp7ffqnsTeohZp6
g7eoD/iokXqAlXqp/5d1nRqAoTqq+XeqqRp/rfqq6fdxtfp/ubqr9/erwfp+DXesv7eszXp70Tqt
r3et2Xp63fqtnzeu5Xp56bquj/eu8Vp4k3avx7ev/fp7ATuwt5dmCZt7DfuwsfdjFXuxSbaxt5ex
IXt6FXayqbeyLRt68zWzn3ezOXt5yfWzOze0RRtzSbu0Kfe0URtyVXu1Gbe1XftwYTu2B3e2aftv
bfu29/ZOddt2ebu3ZddLgbtyhXu4I7e4jbtxkTu5ETdCmVt1nfu5TRc/pbtzmbO6Pfe6sTtzU3O7
M9cwvZtyqTK893a8yfv+bs37vOc2vdX7beGxvRv3veEbcY9xvhl3FO0bcf8wvxE3DPmbcHHwv9k2
wAUcbQm8wMn2wBEcbBV8wbm2wR0ca1kvwv9W8yh8b/nuwjF8GDScb4Ouw+8WbkAcb99mxO/2fkyc
bt0mxed2xVn8bSvjxWHcF2Scbdemxtf2xnH8bNVmx3m8F3ycbNEmyMdWUYgcbBHlyL/WbJScax2j
ybe2MaAcaxdjyq9WMaycahMjy6f2MLgcag3jy59WUMR8aQmjzJUWUND8aANjzY0WFmLBzYf2FWBB
zoX2FV7Bzn8Wz/XcZ1shz/tcZ13BFQJdZ1mB0Au9ZleBFRK9ZlVhFRr+XWYfPdJjNhVUgdJdFhVS
AdNbFhVQgdNV9hROAdRT1hRMgdRN1tRRvWRLoRRWPWRJwdVfvWNHgRRmvWNDYRRunWNzfdczNhRC
wdcxFhRAQdgr9hM+wdgp1hM8QdkjthOa3dkZlhM6QdoZdhM4wdoXdhM2QdsRVhM0wdsPNhMyQdwJ
ltzNfWD1It0BNi/Y/V/x4t339S7kXV/vpN7v9d7xfV6vZt/5XRL8XV4lIRIC/l3jouDdNRLqBeHV
lU4YvuEf4eHN9WkkvlwpvuLD9eIxvluraeO9tXs8vlvFKOS1Fc1IPlvB6OStFWlUvloPwRBaXloP
oRBiPlq9pOadNRD+AAHnm5UseF5Zff7njTXohV5YfaboixUQ/gDphVXpmT5Yj/7pe7UrpL5X90AP
ql5X8SAPsj5X9YDru75W9QDrw15WtaLsZXXs0T5Wz37tWzUP9sDtW3Vn5F5V8YDs675U1T7v9R7s
+T5Ut/7vRRUP8EDwAd/vDT9T7eAOEr9T7cAOGl9T6QDyI99SH7/yLfUO6gDzK7UO5oDzJXUOPh/0
HVUONof0GzUO4AD1GxUO3oD1FfUN3AD2E3UN2ID2DRUNsAv3BdUMzID3BTUMwAD4A/ULhp/4+zQL
tgD5+/QKsID581QKqgD68bQJmoD667QIOAr72xQH0IP74ZQEkg0R/NOU28j//NE//dV//VkuIAAA
Ow==
END_OF_GRAPHIC_FILE;
echo base64_decode($IMGDATA);
exit(0);


}



?>
