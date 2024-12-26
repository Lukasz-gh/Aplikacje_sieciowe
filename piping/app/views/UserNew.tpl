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
                <label for="role">Rola DB</label>
                <select id="role" type="text" placeholder="rola" name="role" value="{$form->role}">
                    <option value=""></option>
                    {foreach $roles as $role}
                        {if $role['roles'] != 'guest'}
                            {* {if $roles['roles'] == {$form->role}} *}
                                {* {$selected = 'selected="selected"'} *}
                            {strip}
                                <option value="{$role['idroles']}" >{$role['roles']}</option>
                            {/strip}
                            {* {/if} *}
                        {/if}

                        {if $roles['roles'] == {$form->role}}
                            
                            {$selected = 'selected'}
                        {/if}
                    {/foreach}
{* 
                        {if $roles['roles'] == {$form->role}}
                            
                            {$selected = 'selected'}
                        {/if} *}

                        {* selected={$form->selected} *}

                        {* $selected = 'selected="selected"'; *}



                    {* <option value="" selected="selected">123</option> *}
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