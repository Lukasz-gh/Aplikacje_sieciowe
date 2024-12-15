{extends file="Main.tpl"}

{block name=content}

    <div class="bottom-margin">
    <a class="pure-button button-success" href="{$conf->action_root}userNew">Nowy użytkownik</a>
    </div>	

    <h3>Lista userów</h3>

    <table id="tab_people" class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Login</th>
            <th>Hasło</th>
            <th>Rola</th>
            <th>Opcje</th>
        </tr>
    </thead>

    {foreach $people as $p}
        {strip}
            <tr>
                <td>{$p["login"]}</td>
                <td>{$p["password"]}</td>
                <td>{$p["roles"]}</td>
                <td>
                    <a class="button-small pure-button button-secondary" href="{$conf->action_url}userEdit/{$p['idusers']}">Edytuj</a>
                    &nbsp;
                    <a class="button-small pure-button button-warning" href="{$conf->action_url}userDelete/{$p['idusers']}">Usuń</a>
                </td>
            </tr>
        {/strip}
        {/foreach}

{/block}