{extends file="Main.tpl"}

{block name=content}

<article id="contact" class="wrapper style3">
	<div class="container medium">
		<header>
			<h2>Wprowadź swoje dane</h2>
		</header>
		<div class="row">
			<div class="col-12">
				<form action="{$conf->action_url}login" method="post">
					<legend>Logowanie</legend>
						<label for="id_login">Login</label>
						<input id="id_login" type="text" placeholder="Login" name="login" />

						<label for="id_pass">Hasło</label>
						<input id="id_pass" type="password" placeholder="Hasło" name="pass" />

						<button type="submit">Zaloguj</button>
				</form>
			</div>
		</div>
	</div>

</article>

{/block}