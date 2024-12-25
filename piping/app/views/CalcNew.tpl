{extends file="Main.tpl"}

{block name=content}

    <h3>Wprowadź dane do obliczeń</h3>

    <div class="bottom-margin">
    <form action="{$conf->action_root}calcSave" method="post" class="pure-form pure-form-aligned">
        <fieldset>
            <legend>Nowe obliczenia</legend>

            <div class="pure-control-group">
                <label for="cisObliczeniowe">Ciśnienie obliczeniowe</label>
                <input id="cisObliczeniowe" type="text" placeholder="cisObliczeniowe" name="cisObliczeniowe" value="{$form->cisObliczeniowe}">
            </div>

            <div class="pure-control-group">
                <label for="tempObliczeniowa">Temperatura obliczeniowa</label>
                <input id="tempObliczeniowa" type="text" placeholder="tempObliczeniowa" name="tempObliczeniowa" value="{$form->tempObliczeniowa}">
            </div>

            <div class="pure-control-group">
                <label for="idSteel">Gatunek stali</label>
                <select id="idSteel" type="text" placeholder="idSteel" name="idSteel" value="{$form->idSteel}">
                    <option value="200">P195TR1</option>
                    <option value="201">P235TR1</option>
                    <option value="202">P265TR1</option>
                </select> 
            </div>

            <div class="pure-control-group">
                <label for="idDiameer">Średnica</label>
                <select id="idDiameter" type="text" placeholder="idDiameter" name="idDiameter" value="{$form->idDiameter}">
                    <option value="300">26,9</option>
                    <option value="301">33,7</option>
                    <option value="302">42,4</option>
                </select> 
            </div>

            <div class="pure-control-group">
                <label for="idWallThickness">Grubość ścianki</label>
                <select id="idWallThickness" type="text" placeholder="idWallThickness" name="idWallThickness" value="{$form->idWallThickness}">
                    <option value="400">3,6</option>
                    <option value="401">4</option>
                    <option value="402">4,5</option>
                </select> 
            </div>

            <div class="pure-control-group">
                <label for="korozja">Naddatek na korozje</label>
                <input id="korozja" type="text" placeholder="korozja" name="korozja" value="{$form->korozja}">
            </div>

            <div class="pure-control-group">
                <label for="pocienienie">Pocienienie ścianki</label>
                <input id="pocienienie" type="text" placeholder="pocienienie" name="pocienienie" value="{$form->pocienienie}">
            </div>

            <div class="pure-control-group">
                <label for="wytrzymaloscZlacza">Wytrzymałość złącza</label>
                <input id="wytrzymaloscZlacza" type="text" placeholder="wytrzymaloscZlacza" name="wytrzymaloscZlacza" value="{$form->wytrzymaloscZlacza}">
            </div>




            <div class="pure-controls">
                <input type="submit" class="pure-button pure-button-primary" value="Oblicz"/>
                <a class="pure-button button-secondary" href="{$conf->action_root}calcList">Powrót</a>
            </div>

        </fieldset>
        <input type="hidden" name="id" value="{$form->id}">
    </form>	
    </div>





    {if $msgs->isInfo()}
        <ul>
        {foreach $msgs->getMessages() as $msg}
            <li>{$msg->text}</li>
        {/foreach}
        </ul>
    {/if}

{/block}
