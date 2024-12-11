<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta charset="utf-8"/>
	<title>Aplikacja bazodanowa</title>
	<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css"
		integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
	<link rel="stylesheet" href="{$conf->app_url}/css/style.css">
</head>



<body style="margin: 20px;">


<body>
	<nav id="nav" >
			<ul class="container">
				<li><a href="{$conf->action_root}userList">Użytkownicy</a></li>
				<li><a href="{$conf->action_root}calc">Obliczenia</a></li>
				<li><a href="">Wyniki</a></li>
				<li>{if count($conf->roles)>0}
					<a href="{$conf->action_root}logout">Wyloguj</a>
				{else}	
					<a href="{$conf->action_root}loginShow">Zaloguj</a>
				{/if}</li>
			</ul>
	</nav>

	<div class="content">
		{block name=content} Domyślna treść zawartości .... {/block}
	</div>

	{block name=messages}

	{if $msgs->isMessage()}
	<div>
		<ul>
		{foreach $msgs->getMessages() as $msg}
		{strip}
			<li class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</li>
		{/strip}
		{/foreach}
		</ul>
	</div>
	{/if}
	
	{/block}


</body>
</html>