{* purpose of this template: build the Form to edit an instance of plugin *}
{include file='admin/header.tpl'}
{pageaddvar name='javascript' value='modules/Dashboard/javascript/Dashboard_editFunctions.js'}
{pageaddvar name='javascript' value='modules/Dashboard/javascript/Dashboard_validation.js'}

{if $mode eq 'edit'}
    {gt text='Edit plugin' assign='templateTitle'}
    {assign var='adminPageIcon' value='edit'}
{elseif $mode eq 'create'}
    {gt text='Create plugin' assign='templateTitle'}
    {assign var='adminPageIcon' value='new'}
{else}
    {gt text='Edit plugin' assign='templateTitle'}
    {assign var='adminPageIcon' value='edit'}
{/if}
<div class="dashboard-plugin dashboard-edit">
{pagesetvar name='title' value=$templateTitle}
<div class="z-admin-content-pagetitle">
    {icon type=$adminPageIcon size='small' alt=$templateTitle}
    <h3>{$templateTitle}</h3>
</div>
{form cssClass='z-form'}
    {* add validation summary and a <div> element for styling the form *}
    {dashboardFormFrame}
    {formsetinitialfocus inputId='active'}

    <fieldset>
        <legend>{gt text='Content'}</legend>
        <div class="z-formrow">
            {formlabel for='active' __text='Active' mandatorysym='1'}
            {formintinput group='plugin' id='active' mandatory=true __title='Enter the active of the plugin' maxLength=11 cssClass='required validate-digits'}
            {dashboardValidationError id='active' class='required'}
            {dashboardValidationError id='active' class='validate-digits'}
        </div>
        <div class="z-formrow">
            {formlabel for='name' __text='Name' mandatorysym='1'}
            {formtextinput group='plugin' id='name' mandatory=true readOnly=false __title='Enter the name of the plugin' textMode='singleline' maxLength=30 cssClass='required'}
            {dashboardValidationError id='name' class='required'}
        </div>
        <div class="z-formrow">
            {formlabel for='title' __text='Title' mandatorysym='1'}
            {formtextinput group='plugin' id='title' mandatory=true readOnly=false __title='Enter the title of the plugin' textMode='singleline' maxLength=250 cssClass='required'}
            {dashboardValidationError id='title' class='required'}
        </div>
        <div class="z-formrow">
            {formlabel for='boxsize' __text='Boxsize' mandatorysym='1'}
            {formintinput group='plugin' id='boxsize' mandatory=true __title='Enter the boxsize of the plugin' maxLength=11 cssClass='required validate-digits'}
            {dashboardValidationError id='boxsize' class='required'}
            {dashboardValidationError id='boxsize' class='validate-digits'}
        </div>
        <div class="z-formrow">
            {formlabel for='pluginfile' __text='Pluginfile' mandatorysym='1'}
            {formtextinput group='plugin' id='pluginfile' mandatory=true readOnly=false __title='Enter the pluginfile of the plugin' textMode='singleline' maxLength=255 cssClass='required'}
            {dashboardValidationError id='pluginfile' class='required'}
        </div>
        <div class="z-formrow">
            {formlabel for='ajax' __text='Ajax' mandatorysym='1'}
            {formintinput group='plugin' id='ajax' mandatory=true __title='Enter the ajax of the plugin' maxLength=11 cssClass='required validate-digits'}
            {dashboardValidationError id='ajax' class='required'}
            {dashboardValidationError id='ajax' class='validate-digits'}
        </div>
    </fieldset>

    {if $mode ne 'create'}
        {include file='admin/include_standardfields_edit.tpl' obj=$plugin}
    {/if}

    {* include display hooks *}
    {if $mode eq 'create'}
        {notifydisplayhooks eventname='dashboard.ui_hooks.plugins.form_edit' id=null assign='hooks'}
    {else}
        {notifydisplayhooks eventname='dashboard.ui_hooks.plugins.form_edit' id=$plugin.id assign='hooks'}
    {/if}
    {if is_array($hooks) && isset($hooks[0])}
        <fieldset>
            <legend>{gt text='Hooks'}</legend>
            {foreach key='hookName' item='hook' from=$hooks}
            <div class="z-formrow">
                {$hook}
            </div>
            {/foreach}
        </fieldset>
    {/if}

    {* include return control *}
    {if $mode eq 'create'}
        <fieldset>
            <legend>{gt text='Return control'}</legend>
            <div class="z-formrow">
                {formlabel for='repeatcreation' __text='Create another item after save'}
                {formcheckbox group='plugin' id='repeatcreation' readOnly=false}
            </div>
        </fieldset>
    {/if}

    {* include possible submit actions *}
    <div class="z-buttons z-formbuttons">
    {if $mode eq 'edit'}
        {formbutton id='btnUpdate' commandName='update' __text='Update plugin' class='z-bt-save'}
      {if !$inlineUsage}
        {gt text='Really delete this plugin?' assign='deleteConfirmMsg'}
        {formbutton id='btnDelete' commandName='delete' __text='Delete plugin' class='z-bt-delete z-btred' confirmMessage=$deleteConfirmMsg}
      {/if}
    {elseif $mode eq 'create'}
        {formbutton id='btnCreate' commandName='create' __text='Create plugin' class='z-bt-ok'}
    {else}
        {formbutton id='btnUpdate' commandName='update' __text='OK' class='z-bt-ok'}
    {/if}
        {formbutton id='btnCancel' commandName='cancel' __text='Cancel' class='z-bt-cancel'}
    </div>
  {/dashboardFormFrame}
{/form}

</div>
{include file='admin/footer.tpl'}

{icon type='edit' size='extrasmall' assign='editImageArray'}
{icon type='delete' size='extrasmall' assign='deleteImageArray'}

<script type="text/javascript" charset="utf-8">
/* <![CDATA[ */
    var editImage = '<img src="{{$editImageArray.src}}" width="16" height="16" alt="" />';
    var removeImage = '<img src="{{$deleteImageArray.src}}" width="16" height="16" alt="" />';

    document.observe('dom:loaded', function() {

        dashboardAddCommonValidationRules('plugin', '{{if $mode eq 'create'}}{{else}}{{$plugin.id}}{{/if}}');

        // observe button events instead of form submit
        var valid = new Validation('{{$__formid}}', {onSubmit: false, immediate: true, focusOnError: false});
        {{if $mode ne 'create'}}
            var result = valid.validate();
        {{/if}}

        $('{{if $mode eq 'create'}}btnCreate{{else}}btnUpdate{{/if}}').observe('click', function(event) {
            var result = valid.validate();
            if (!result) {
                // validation error, abort form submit
                Event.stop(event);
            } else {
                // hide form buttons to prevent double submits by accident
                $$('div.z-formbuttons input').each(function(btn) {
                    btn.hide();
                });
            }
            return result;
        });

        Zikula.UI.Tooltips($$('.dashboardFormTooltips'));
    });

/* ]]> */
</script>
