<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xml:lang="en-us" xmlns="http://www.w3.org/1999/xhtml">  
<head>  
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
	<title><?= $title ?></title>
	<style>
body {
   	background-color: #FFFFFF;
    background-image: -moz-linear-gradient(rgba(0, 0, 0, 0.22), rgba(255, 255, 255, 0) 80px);
    color: #555555;
    font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
    font-size: 13px;
    margin: 0;
    text-align: center;
}
#container {
    height: auto;
    margin: 0 auto;
    width: 800px;
}
#contents {
    border-left: 1px solid #CCCCCC;
    height: auto;
    margin-left: 199px;
    padding-bottom: 10px;
}
.hentry {
    clear: both;
    height: auto;
    position: relative;
}
.hentry:after {
    clear: both;
    content: ".";
    display: block;
    height: 0;
    visibility: hidden;
}
.hentry .main {
    border-bottom-color: #DDDDDD;
    border-bottom-style: dashed;
    border-bottom-width: 1px;
    float: left;
    line-height: 175%;
    padding-bottom: 15px;
    padding-left: 15px;
    padding-right: 5px;
    padding-top: 29px;
    text-align: left;
    width: 580px;
}
.hentry .entry-meta {
    float: left;
    font-family: 'Oswald',Helvetica,Arial,sans-serif;
    font-size: 25px;
    margin-bottom: 0;
    margin-left: -199px;
    margin-right: 0;
    margin-top: 35px;
    padding-bottom: 0;
    padding-left: 0;
    padding-right: 0;
    padding-top: 0;
    text-align: right;
    text-transform: uppercase;
    width: 190px;
}
.hentry .entry-meta a {
    -moz-text-blink: none;
    -moz-text-decoration-color: -moz-use-text-color;
    -moz-text-decoration-line: none;
    -moz-text-decoration-style: solid;
}
.hentry .entry-meta div {
    margin-bottom: 10px;
    margin-left: 10px;
    margin-right: 10px;
    margin-top: 10px;
}
.hentry .entry-meta .date {
    color: #000000;
    font-weight: bold;
   	margin: 0;    
}
.entry-title {
    color: #666666;
    font-family: 'Oswald',Helvetica,Arial,sans-serif;
    font-size: 25px;
    line-height: 38px;
    margin: 5px 0 15px 0;
    text-align: left;
    text-transform: uppercase;
}
	</style>
</head>
<body>

<div id="container">
	<div id="contents">	
		<div id="post" class="hentry">
			<div class="entry-meta">
				<div class="date"> <?= $news['DATE'] ?></div>
			</div>
			<div class="main">
				<h2 class="entry-title"><?= $news['TITLE'] ?></h2>
				<div class="entry-content"><p><?= $news['CONTENT'] ?></p></div>
			</div>
		
		</div>
		
		
	</div>	
</div>
</body>

</html>