{extends file="Main.tpl"}

{block name=content}

    <div class="bottom-margin">
        {if \core\RoleUtils::inRole("projectManager")}
        {else}
        <a class="pure-button button-success" href="{$conf->action_root}fluidNew">Nowy płyn</a>
        {/if}
    </div>	

    <div class="bottom-margin">
    <form class="pure-form pure-form-stacked" action="{$conf->action_url}fluidList">
        <legend>Wyszukiwanie płynu</legend>
        <fieldset>
            <input type="text" placeholder="wpisz płyn" name="fluidSearch" value="{$searchForm->fluidSearch}" /><br />
            <button type="submit" class="pure-button pure-button-primary">Szukaj</button>
        </fieldset>
    </form>
    </div>	


    <h3>Lista płynów w projekcie</h3>

    <table id="tab_fluids" class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Płyn</th>
            <th>Temperatura operacyjna</th>
            <th>Ciśnienie operacyjne</th>
            <th>Temperatura obliczeniowa</th>
            <th>Ciśnienie obliczeniowe</th>
            <th>Opcje</th>
        </tr>
    </thead>

    {foreach $fluids as $f}
        {strip}
            <tr>
                <td>{$f["fluid"]}</td>
                <td>{$f["tempOperacyjna"]}</td>
                <td>{$f["cisOperacyjne"]}</td>
                <td>{$f["tempObliczeniowa"]}</td>
                <td>{$f["cisObliczeniowe"]}</td>
                <td>
                    {if \core\RoleUtils::inRole("projectManager")}
                        Brak opcji
                    {else}
                        <a class="button-small pure-button button-secondary" href="{$conf->action_url}fluidEdit/{$f['idfluids']}">Edytuj</a>
                        &nbsp;
                        <a class="button-small pure-button button-warning" href="{$conf->action_url}fluidDelete/{$f['idfluids']}">Usuń</a>
                    {/if}
                </td>
            </tr>
        {/strip}
    {/foreach}

{/block}