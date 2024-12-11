{extends file="Main.tpl"}

{block name=content}

<head>
	<meta charset="utf-8"/>
	<title>Hello World | Amelia framework</title>
</head>



<body>

    My value: {$value}

    {if $msgs->isInfo()}
        <ul>
        {foreach $msgs->getMessages() as $msg}
            <li>{$msg->text}</li>
        {/foreach}
        </ul>
    {/if}



</body>

{/block}
