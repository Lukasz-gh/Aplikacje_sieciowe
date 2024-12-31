{extends file="Main.tpl"}

{block name=content}

    <h3>Nowy płyn</h3>

    <div class="bottom-margin">
    <form action="{$conf->action_root}fluidSave" method="post" class="pure-form pure-form-aligned">
        <fieldset>
            <legend>Dane nowego płynu</legend>

            <div class="pure-control-group">
                <label for="fluid">Nazwa płynu</label>
                <input id="fluid" type="text" placeholder="Nazwa płynu" name="fluid" value="{$form->fluid}">
            </div>

            <div class="pure-control-group">
                <label for="cisOperacyjne">Ciśnienie operacyjne</label>
                <input id="cisOperacyjne" type="text" placeholder="Ciśnienie operacyjne" name="cisOperacyjne" value="{$form->cisOperacyjne}">
            </div>

            <div class="pure-control-group">
                <label for="cisObliczeniowe">Ciśnienie obliczeniowe</label>
                <input id="cisObliczeniowe" type="text" placeholder="Ciśnienie obliczeniowe" name="cisObliczeniowe" value="{$form->cisObliczeniowe}">
            </div>

            <div class="pure-control-group">
                <label for="tempOperacyjna">Temperatura operacyjna</label>
                <input id="tempOperacyjna" type="text" placeholder="Temperatura operacyjna" name="tempOperacyjna" value="{$form->tempOperacyjna}">
            </div>

            <div class="pure-control-group">
                <label for="tempObliczeniowa">Temperatura obliczeniowa</label>
                <input id="tempObliczeniowa" type="text" placeholder="Temperatura obliczeniowa" name="tempObliczeniowa" value="{$form->tempObliczeniowa}">
            </div>

            <div class="pure-controls">
                <input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
                <a class="pure-button button-secondary" href="{$conf->action_root}fluidList">Powrót</a>
            </div>

        </fieldset>
        <input type="hidden" name="idfluids" value="{$form->idfluids}">
    </form>	
    </div>

{/block}