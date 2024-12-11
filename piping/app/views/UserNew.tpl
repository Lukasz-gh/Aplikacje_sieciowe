{extends file="Main.tpl"}

{block name=content}

    <h3>Nowy użytkownik</h3>

    <div class="bottom-margin">
    <form action="{$conf->action_root}userSave" method="post" class="pure-form pure-form-aligned">
        <fieldset>
            <legend>Dane nowego użytkownika</legend>

            <div class="pure-control-group">
                <label for="login">Login</label>
                <input id="login" type="text" placeholder="login" name="login" value="{$form->login}">
            </div>

            <div class="pure-control-group">
                <label for="password">Hasło</label>
                <input id="password" type="text" placeholder="hasło" name="password" value="{$form->password}">
            </div>

            <div class="pure-control-group">
                <label for="role">Rola</label>
                <select id="role" type="text" placeholder="rola" name="role" value="{$form->role}">
                    <option value="2">Administrator</option>
                    <option value="3">Kierownik Projektu</option>
                    <option value="5">Inżynier</option>
                    <option value="4">Ekspert</option>
                </select> 
            </div>

            <div class="pure-controls">
                <input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
                <a class="pure-button button-secondary" href="{$conf->action_root}userList">Powrót</a>
            </div>

        </fieldset>
        <input type="hidden" name="id" value="{$form->id}">
    </form>	
    </div>



{/block}