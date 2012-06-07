{pngetstatusmsg|pnvarprephtmldisplay}
{pnajaxheader prototype="1" scriptaculous="1" lightbox="1"}

<h3>{gt text="_BOXES_WELCOME_USER"}, {$boxes_uname|userprofilelink}</h3>
<div id="boxes_helplink" class="boxes_small">
    <a onclick="javascript:$('boxes_helplink').hide();$('boxes_helptext').removeClassName('box_hidden');return false;" class="boxes_link">{gt text="_BOXES_CUSTOMIZE_LINK"}</a>
</div>
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
<div id="box_list">
    {foreach from=$boxes item=box}
            {$box.boxcode}
    {/foreach}
</div>

<div class="boxes_newcontent_line"></div>

{if $templates|@count gt 0}
    <h3>{gt text="_BOXES_ADD_NEW_BOX"}</h3>
	<div id="box_new" class="box box_big">
            <div class="box_title">
                    {gt text="_BOXES_NEW_BOX_TITLE"}
            </div>
            <div class="box_content">
                <p>
                    {gt text="_BOXES_ADD_CONTENT_TEXT"}
                </p>
                    <p class="box_important">
                        {gt text="_BOXES_CHOOSE_CONTENT"}
                        <form method="POST" action="{modurl modname="Dashboard" type="user" func="addBox}">
                                <select name="box">
                                {foreach from=$templates item="template"}
                                        <option value="{$template.name}">{$template.title}</option>
                                {/foreach}
                                </select>
                                <input type="hidden" name="boxorder" value="0" />
                                <input type="submit" value="{gt text="_BOXES_ADD"}" />
                        </form>
                    </p>
            </div>
	</div>
{/if}


