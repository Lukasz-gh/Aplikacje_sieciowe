{extends file="Main.tpl"}

{block name=content}

    <h3>Gatunki stali</h3>

    <table id="tab_steel" class="pure-table pure-table-bordered">
    <thead>
        <tr>
            <th>Gatunek</th>
            <th>Granica Plastyczności</th>
            <th>Granica Wytrzymałości</th>
        </tr>
    </thead>

    {foreach $steel as $p}
        {strip}
            <tr>
                <td>{$p["gatunek"]}</td>
                <td>{$p["granicaPlastycznosci"]}</td>
                <td>{$p["granicaWytrzymalosci"]}</td>
            </tr>
        {/strip}
    {/foreach}

{/block}