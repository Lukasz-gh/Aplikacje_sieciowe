{extends file="Main.tpl"}

{block name=content}

<div class="bottom-margin">
    {if \core\RoleUtils::inRole("projectManager")}
    {else}
        <a class="pure-button button-success" href="{$conf->action_root}calcNew">Nowe obliczenia</a>
    {/if}
</div>


<h4>Witaj {$user->login}</h4>
<h4>Twoje uprawnienia w systemie to {$user->role}</h4>

<h3>Lista wyników obliczeń</h3>

<table id="calc" class="pure-table pure-table-bordered">
<thead>
    <tr>
        <th>Autor</th>
        <th>Płyn</th>
        {* <th>Ciśnienie obliczeniowe</th>
        <th>Temperatura obliczeniowa</th> *}
        <th>Gatunek stali</th>
        <th>Średnica</th>
        <th>Grubość ścianki</th>
        <th>Wytrzymałość złącza</th>
        <th>Naddatek na korozje</th>
        <th>Pocienienie ścianki</th>
        <th>Tolerancja ścianki</th>
        <th>Naprężęnia projektowe</th>
        <th>Najmniejsza grubość</th>
        <th>Opcje</th>
    </tr>
</thead>

{foreach $calculation as $c}
    {strip}
        <tr>
            <td>{$c["login"]}</td>
            <td>{$c["fluid"]} ({$c["cisObliczeniowe"]} bar, {$c["tempObliczeniowa"]} °C)</td>
            {* <td>{$c["cisnienieObliczeniowe"]}</td>
            <td>{$c["tempObliczeniowa"]}</td> *}
            <td>{$c["gatunek"]}</td>
            <td>{$c["real"]}</td>
            <td>{$c["wallThickness"]}</td>
            <td>{$c["wytrzymaloscZlacza"]}</td>
            <td>{$c["korozja"]}</td>
            <td>{$c["pocienienie"]}</td>
            <td>{$c["tolerancjaScianki"]}</td>
            <td>{$c["naprezeniaProjektowe"]}</td>
            <td>{$c["najmniejszaGrubosc"]}</td>
            <td>
                {if \core\RoleUtils::inRole("projectManager")}
                    Brak opcji
                {else}
                    <a class="button-small pure-button button-secondary" href="{$conf->action_url}calcEdit/{$c['idcalulations']}">Edytuj</a>
                    &nbsp;
                    <a class="button-small pure-button button-warning" href="{$conf->action_url}calcDelete/{$c['idcalulations']}">Usuń</a>
                {/if}
            </td>
        </tr>
    {/strip}
    {/foreach}

{/block}
