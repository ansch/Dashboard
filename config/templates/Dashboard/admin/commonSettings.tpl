{include file="admin\header.tpl"}
{ajaxheader modname=Dashboard filename=Dashboard_admincommonSettings.js noscriptaculous=true effects=true}
<div class="z-admincontainer">
    <div class="z-adminpageicon">{img modname="Dashboard" src="Dashboard.png" __alt="Dashboard"}</div>
    <h3>{gt text="Common Settings"}</h3>
    {form cssClass='z-form'}

            {* add validation summary and a <div> element for styling the form *}
            {dashboardFormFrame}
                        <fieldset>
                            <legend>{gt text="<strong>External</strong> Start page settings for <strong>not logged in</strong> Users"}</legend>
                            <div class="z-formrow">
                                {formlabel for="ExternalStartpage" __text="Start module"}                                    
                                {dashboardmoduleselector id='ExternalStartpage' group='config'}
                                <em class="z-formnote">{gt text="('index.php' points to this)"}</em>                            
                            </div>
                            <div class="z-formrow">
                                {formlabel for="ExternalStarttype" __text="Start function type"}
                                {formtextinput id='ExternalStarttype' size='10' maxLength='10' group='config'}
                            </div>
                            <div class="z-formrow">
                                {formlabel for="ExternalStartfunc" __text="Start function"}
                                {formtextinput id='ExternalStartfunc' size='20' maxLength='40' group='config'}
                            </div>
                            <div class="z-formrow">
                                {formlabel for="ExternalStartargs" __text="Start function arguments"}
                                {formtextinput id='ExternalStartargs' size='20' maxLength='60' group='config'}                            
                                <em class="z-formnote">{gt text="(Separate by commas, e.g., x=5,y=2)"}</em>
                            </div>
                        </fieldset>    
                        <fieldset>
                            <legend>{gt text="<strong>Internal</strong> Start page settings for <strong>logged in</strong> Users"}</legend>
                            <div class="z-formrow">
                                {formlabel for='AllowCustomizing' __text='Allow User to customize their startpage'}
                                <div id="AllowCustomizing">                      
                                    {formradiobutton id='AllowCustomizing_yes' dataField='AllowCustomizing' value="1" group='config' groupName='AllowCustomizing'} {*checked="checked"*}
                                    {formlabel for="AllowCustomizing_yes" __text='Yes'}
                                    {formradiobutton id='AllowCustomizing_no' dataField='AllowCustomizing' value="0"  group='config' groupName='AllowCustomizing'}
                                    {formlabel for='AllowCustomizing_no' __text='No'}
                                </div>
                            </div>			
                                <div id="AllowCustomizing_container">
                                    <div class="z-formrow" id="InternalStartpage">
                                        {formlabel for="InternalStartpage" __text="Start module"}                                    
                                        {dashboardmoduleselector id='InternalStartpage' group='config'}
                                        <em class="z-formnote">{gt text="('index.php' points to this)"}</em>
                                    </div>

                                    <div class="z-formrow" id="InternalStarttypeRow">
                                        {formlabel for="InternalStarttype" __text="Start function type"}
                                        {formtextinput id='InternalStarttype' size='10' maxLength='10' group='config'}
                                    </div>
                                    <div class="z-formrow" id="InternalStartfuncRow">
                                        {formlabel for="InternalStartfunc" __text="Start function"}
                                        {formtextinput id='InternalStartfunc' size='20' maxLength='40' group='config'}                                    
                                    </div>
                                    <div class="z-formrow" id="InternalStartargsRow">                                 
                                        {formlabel for="InternalStartargs" __text="Start function arguments"}
                                        {formtextinput id='InternalStartargs' size='20' maxLength='60' group='config'}                                     
                                        <em class="z-formnote">{gt text="(Separate by commas, e.g., x=5,y=2)"}</em>
                                    </div>
                        </div>				 
                        </fieldset>    			
            <div class="z-formbuttons">
                {formbutton commandName='save' __text='Update configuration' class='z-bt-save'}
                {formbutton commandName='cancel' __text='Cancel' class='z-bt-cancel'}            
            </div>
            {/dashboardFormFrame}
        {/form}
</div>    
    