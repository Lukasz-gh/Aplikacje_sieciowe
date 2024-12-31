{extends file="Main.tpl"}

{block name=content}

    <div class="bottom-margin">
        <a class="pure-button button-success" href="{$conf->action_root}fluidNew">Nowy płyn</a>
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
                    <a class="button-small pure-button button-secondary" href="{$conf->action_url}fluidEdit/{$f['idfluids']}">Edytuj</a>
                    &nbsp;
                    <a class="button-small pure-button button-warning" href="{$conf->action_url}fluidDelete/{$f['idfluids']}">Usuń</a>
                </td>
            </tr>
        {/strip}
    {/foreach}

{/block}