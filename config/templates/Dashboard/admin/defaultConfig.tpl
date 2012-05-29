{ajaxheader modname=Dashboard filename=Dashboard_admindefaultConfig.js noscriptaculous=true effects=true}
{include file="admin\header.tpl"}

<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname="Dashboard" src="Dashboard.png" __alt="Dashboard"}</div>
    <h3>{gt text="Default Configuration"}</h3>    
	<div id="box_list">
                {foreach from=$boxes item=box}
                        {$box.boxcode}
                {/foreach}
	</div>
    {if $plugins|@count gt 0}
	<hr>
	<h3>{gt text="Add new content"}</h3>	
            <div id="box_add_new" class="box_big">
                    <div class="box_content">
                        <p class="box_important">
                            {gt text="Select content"}
                            <form method="POST" action="{modurl modname="Dashboard" type="admin" func="addBox}">
                                    <select name="box">
                                    {foreach from=$plugins item="plugin"}
                                            <option value="{$plugin.name}">{$plugin.title}</option>
                                    {/foreach}
                                    </select>
                                    <input type="hidden" name="dbposition" value="0" />
                                    <input type="hidden" name="block" value="0" />
                                    <input type="submit" value="{gt text="add"}" />
                            </form>
                        </p>
                    </div>
            </div>
    {else}
        <h3>{gt text="No Plugin active or all active plugins allready assigned"}</h3>
    {/if}        
</div>
<input type="hidden" name="csrftoken" value="{insert name='csrftoken'}" />