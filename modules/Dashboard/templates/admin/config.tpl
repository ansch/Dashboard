{* purpose of this template: module configuration *}
{include file='admin/header.tpl'}
<div class="dashboard-config">
{gt text='Settings' assign='templateTitle'}
{pagesetvar name='title' value=$templateTitle}
<div class="z-admin-content-pagetitle">
    {icon type='config' size='small' __alt='Settings'}
    <h3>{$templateTitle}</h3>
</div>

    {form cssClass='z-form'}


        {* add validation summary and a <div> element for styling the form *}
        {dashboardFormFrame}
        {formsetinitialfocus inputId='AllowCustomizing'}
            <fieldset>
                <legend>{gt text='Here you can manage all basic settings for this application.'}</legend>

                <div class="z-formrow">
                    {formlabel for='AllowCustomizing' __text='Allow customizing'}
                    {formintinput id='AllowCustomizing' group='config' maxLength=255 width=20em __title='Enter this setting. Only digits are allowed.'}
                </div>
            </fieldset>

            <div class="z-buttons z-formbuttons">
                {formbutton commandName='save' __text='Update configuration' class='z-bt-save'}
                {formbutton commandName='cancel' __text='Cancel' class='z-bt-cancel'}
            </div>
        {/dashboardFormFrame}
    {/form}
</div>
{include file='admin/footer.tpl'}
