{include file="admin\header.tpl"}
{pnsecgenauthkey module="Dashboard" assign=authid}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname="Dashboard" src="Dashboard.png" __alt="Dashboard"}</div>
    <h3>{gt text="Plugin Configuration"}</h3>
    <a href="{modurl modname=Dashboard type=admin func=PluginsReload authid=$authid}">{gt text="Reload Plugin List"}</a>
    <br><br>
	<table class="z-admintable">
        <thead>
            <tr>
                <th>&nbsp;</th>
                <th>{gt text="ID"}</th>
                <th>{gt text="Name"}</th>
                <th>{gt text="Title"}</th>
                <th>{gt text="Size"}</th>
                <th>{gt text="File"}</th>
                {*>th>{gt text="AJAX"}</th*}
                <th>{gt text="Actions"}</th>
            </tr>
        </thead>
        <tbody>
            {foreach item='plugin' from=$plugins}  
                {if $plugin.status eq "delete"}
                <tr class="{cycle values="z-odd,z-even"}">
                        <td align="center">
                            {img src=redled.gif modname=core set=icons/extrasmall __alt="Active" __title="Active"}
                        </td>
                        <td>&nbsp;</td>			
                        <td>{$plugin.name}</td>
                        <td colspan=4><strong>{gt text="Plugin was deleted!"}</strong></td>
                </tr>
                {else}     
                <tr class="{cycle values="z-odd,z-even"}">
                    <td align="center">
                        {if $plugin.status eq "new"}
                        {img modname=Dashboard src=new.gif __alt="Plugin was added" __title="Plugin was added"}
                        {/if}
                        {if $plugin.active eq -1}
                            {img src=redled.gif modname=core set=icons/extrasmall __alt="Module not available" __title="Module not available"}
                            {else}
                                {if $plugin.active eq 1}
                                {img src=greenled.gif modname=core set=icons/extrasmall __alt="Active" __title="Active"}
                                {else}
                                {img src=yellowled.gif modname=core set=icons/extrasmall __alt="Inactive" __title="Inactive"}
                                {/if}
                        {/if}
                    </td>
                    <!-- td align="center"><input type="checkbox" {if $plugin.active eq 1}checked=checked{/if}{$plugin.active}</td-->
                    <td align="center">{$plugin.id}</td>
                    <td>{$plugin.name}</td>
                    <td>{$plugin.title}</td>
                    <td>{$plugin.dbsize}</td>
                    <td>{$plugin.dbfile}</td>
                    {*td>{$plugin.ajax}</td*}
                    <td align="center">
                        {if $plugin.active eq -1}
                            <a href="#">{img modname=core src=button_cancel.gif set=icons/extrasmall __title="Module not available" __alt="Moduele not available"}</a>&nbsp;                                            
                        {else}
                            {if $plugin.active eq 1}
                            <a href="{modurl modname=Dashboard type=admin func=ChangePluginsState state=0 id=$plugin.id authid=$authid}">{img modname=core src=folder_grey.gif set=icons/extrasmall __title="Deactivate" __alt="Deactivate"}</a>&nbsp;					
                            {else}
                            <a href="{modurl modname=Dashboard type=admin func=ChangePluginsState state=1 id=$plugin.id authid=$authid}">{img modname=core src=folder_green.gif set=icons/extrasmall __title="Activate" __alt="Activate"}</a>&nbsp;					
                            {/if}					
                        {/if}
                    </td>    	        
                </tr>    
                {/if}
                {foreachelse}
                    <tr class="z-admintableempty"><td colspan="7">{gt text="No plugins found."}</td></tr>
                {/foreach}
    	</tbody>
    </table>    
</div>    