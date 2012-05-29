{* purpose of this template: build the Form to edit an instance of plugins *}
{include file='user/header.tpl'}
{pageaddvar name='javascript' value='modules/Dashboard/javascript/Dashboard_editFunctions.js'}
{pageaddvar name='javascript' value='modules/Dashboard/javascript/Dashboard_validation.js'}

{if $mode eq 'edit'}
    {gt text='Edit plugins' assign='templateTitle'}
{elseif $mode eq 'create'}
    {gt text='Create plugins' assign='templateTitle'}
{else}
    {gt text='Edit plugins' assign='templateTitle'}
{/if}
<div class="dashboard-plugins dashboard-edit">
{pagesetvar name='title' value=$templateTitle}
<div class="z-frontendcontainer">
    <h2>{$templateTitle}</h2>
{form cssClass='z-form'}
    {* add validation summary and a <div> element for styling the form *}
    {dashboardFormFrame}
    {formsetinitialfocus inputId='active'}

    <fieldset>
        <legend>{gt text='Content'}</legend>
        <div class="z-formrow">
            {formlabel for='active' __text='Active' mandatorysym='1'}
            {formintinput group='plugins' id='active' mandatory=true __title='Enter the active of the plugins' maxLength=11 cssClass='required validate-digits'}
            {dashboardValidationError id='active' class='required'}
            {dashboardValidationError id='active' class='validate-digits'}
        </div>
        <div class="z-formrow">
            {formlabel for='name' __text='Name' mandatorysym='1'}
            {formtextinput group='plugins' id='name' mandatory=true readOnly=false __title='Enter the name of the plugins' textMode='singleline' maxLength=30 cssClass='required'}
            {dashboardValidationError id='name' class='required'}
        </div>
        <div class="z-formrow">
            {formlabel for='title' __text='Title' mandatorysym='1'}
            {formtextinput group='plugins' id='title' mandatory=true readOnly=false __title='Enter the title of the plugins' textMode='singleline' maxLength=250 cssClass='required'}
            {dashboardValidationError id='title' class='required'}
        </div>
        <div class="z-formrow">
            {formlabel for='dbsize' __text='Dbsize' mandatorysym='1'}
            {formintinput group='plugins' id='dbsize' mandatory=true __title='Enter the dbsize of the plugins' maxLength=11 cssClass='required validate-digits'}
            {dashboardValidationError id='dbsize' class='required'}
            {dashboardValidationError id='dbsize' class='validate-digits'}
        </div>
        <div class="z-formrow">
            {formlabel for='dbfile' __text='Dbfile' mandatorysym='1'}
            {formtextinput group='plugins' id='dbfile' mandatory=true readOnly=false __title='Enter the dbfile of the plugins' textMode='singleline' maxLength=255 cssClass='required'}
            {dashboardValidationError id='dbfile' class='required'}
        </div>
        <div class="z-formrow">
            {formlabel for='ajax' __text='Ajax' mandatorysym='1'}
            {formintinput group='plugins' id='ajax' mandatory=true __title='Enter the ajax of the plugins' maxLength=11 cssClass='required validate-digits'}
            {dashboardValidationError id='ajax' class='required'}
            {dashboardValidationError id='ajax' class='validate-digits'}
        </div>
    </fieldset>

    {if $mode ne 'create'}
        {include file='user/include_standardfields_edit.tpl' obj=$plugins}
    {/if}

    {* include display hooks *}
    {if $mode eq 'create'}
        {notifydisplayhooks eventname='dashboard.ui_hooks.plugins.form_edit' id=null assign='hooks'}
    {else}
        {notifydisplayhooks eventname='dashboard.ui_hooks.plugins.form_edit' id=$plugins.id assign='hooks'}
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
                {formcheckbox group='plugins' id='repeatcreation' readOnly=false}
            </div>
        </fieldset>
    {/if}

    {* include possible submit actions *}
    <div class="z-buttons z-formbuttons">
    {if $mode eq 'edit'}
        {formbutton id='btnUpdate' commandName='update' __text='Update plugins' class='z-bt-save'}
      {if !$inlineUsage}
        {gt text='Really delete this plugins?' assign='deleteConfirmMsg'}
        {formbutton id='btnDelete' commandName='delete' __text='Delete plugins' class='z-bt-delete z-btred' confirmMessage=$deleteConfirmMsg}
      {/if}
    {elseif $mode eq 'create'}
        {formbutton id='btnCreate' commandName='create' __text='Create plugins' class='z-bt-ok'}
    {else}
        {formbutton id='btnUpdate' commandName='update' __text='OK' class='z-bt-ok'}
    {/if}
        {formbutton id='btnCancel' commandName='cancel' __text='Cancel' class='z-bt-cancel'}
    </div>
  {/dashboardFormFrame}
{/form}

</div>
</div>
{include file='user/footer.tpl'}

{icon type='edit' size='extrasmall' assign='editImageArray'}
{icon type='delete' size='extrasmall' assign='deleteImageArray'}

<script type="text/javascript" charset="utf-8">
/* <![CDATA[ */
    var editImage = '<img src="{{$editImageArray.src}}" width="16" height="16" alt="" />';
    var removeImage = '<img src="{{$deleteImageArray.src}}" width="16" height="16" alt="" />';

    document.observe('dom:loaded', function() {

        dashboardAddCommonValidationRules('plugins', '{{if $mode eq 'create'}}{{else}}{{$plugins.id}}{{/if}}');

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
