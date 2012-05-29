{include file="user\header.tpl"}

{ajaxheader modname='Dashboard' noscriptaculous=0 lightbox=0}

{*
<h3>{gt text="_BOXES_WELCOME_USER"}, {$boxes_uname|userprofilelink}</h3>
<div id="boxes_helplink" class="boxes_small">
<a onclick="javascript:$('boxes_helplink').hide();$('boxes_helptext').removeClassName('box_hidden');return false;" class="boxes_link">{gt text="_BOXES_CUSTOMIZE_LINK"}</a>
</div>
*}
<div class="pn-informationmsg box_hidden" id="boxes_helptext">
<p>{gt text="_BOXES_HELP_TEXT"}</p>
<p>{gt text="_BOXES_HELP_SORT_HINT"}</p>
<p>{gt text="_BOXES_HELP_MODIFY_HINT"}</p>
<p>{gt text="_BOXES_HELP_RESET_HINT"}</p>
<ul>
	<img src="images/icons/extrasmall/agt_stop.gif" alt="{gt text="_BOXES_HIDE_HINTS"}" title="{gt text="_BOXES_HIDE_HINTS"}" /> <a class="boxes_link" onclick="javascript:$('boxes_helptext').hide();return false;" >{gt text="_BOXES_HIDE_HINTS"}</a><br />
	<img src="images/icons/extrasmall/agt_reload.gif" alt="{gt text="_BOXES_RESET_ALL"}" title="{gt text="_BOXES_RESET_ALL"}" /> <a href="{modurl modname="Dashboard" func="reset" authid=$authid}" onclick="return confirm('{gt text="_BOXES_REALLY_RESET"}');" >{gt text="_BOXES_RESET_ALL"}</a><br />
</ul>
</div>
<div id="manage_startpage">
{if $editmode}
    <a href="{modurl modname="Dashboard" func="editmode" editmode="0"}" class="button_editmode">{img modname='core' src='utilities.png' set='icons/small' __alt="Turn off Editmode" __title="Turn off Editmode"}</a>
    {if $plugins|@count gt 0}
            <div id="box_new">
                    <form method="POST" action="{modurl modname="Dashboard" type="user" func="addBox}">
                            <select name="box">
                            {foreach from=$plugins item="plugin"}
                                    <option value="{$plugin.name}">{$plugin.title}</option>
                            {/foreach}
                            </select>
                            <input type="hidden" name="dbposition" value="0" />
                            <input type="submit" value="{gt text="Add Box"}" />
                    </form>
            </div>
    {/if}
{else}
<a href="{modurl modname="Dashboard" func="editmode" editmode="1"}">{img modname='core' src='utilities.png' set='icons/small' __alt="Turn on Editmode" __title="Turn on Editmode"}</a>
{/if}
</div>    
<div id="box_list" class="z-clearer">
        {foreach from=$boxes item=box}
                {$box.boxcode}
        {/foreach}
</div>