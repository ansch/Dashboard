{* purpose of this template: build the Form to edit an instance of boxx *}
{include file='admin/header.tpl'}
{pageaddvar name='javascript' value='modules/Dashboard/javascript/Dashboard_editFunctions.js'}
{pageaddvar name='javascript' value='modules/Dashboard/javascript/Dashboard_validation.js'}

{if $mode eq 'edit'}
    {gt text='Edit boxx' assign='templateTitle'}
    {assign var='adminPageIcon' value='edit'}
{elseif $mode eq 'create'}
    {gt text='Create boxx' assign='templateTitle'}
    {assign var='adminPageIcon' value='new'}
{else}
    {gt text='Edit boxx' assign='templateTitle'}
    {assign var='adminPageIcon' value='edit'}
{/if}
<div class="dashboard-boxx dashboard-edit">
{pagesetvar name='title' value=$templateTitle}
<div class="z-admin-content-pagetitle">
    {icon type=$adminPageIcon size='small' alt=$templateTitle}
    <h3>{$templateTitle}</h3>
</div>
{form cssClass='z-form'}
    {* add validation summary and a <div> element for styling the form *}
    {dashboardFormFrame}
    {formsetinitialfocus inputId='userid'}

    <fieldset>
        <legend>{gt text='Content'}</legend>
        <div class="z-formrow">
            {formlabel for='userid' __text='Userid' mandatorysym='1'}
            {formintinput group='boxx' id='userid' mandatory=true __title='Enter the userid of the boxx' maxLength=11 cssClass='required validate-digits'}
            {dashboardValidationError id='userid' class='required'}
            {dashboardValidationError id='userid' class='validate-digits'}
        </div>
        <div class="z-formrow">
            {formlabel for='boxorder' __text='Boxorder'}
            {formintinput group='boxx' id='boxorder' mandatory=false __title='Enter the boxorder of the boxx' maxLength=11 cssClass=' validate-digits'}
            {dashboardValidationError id='boxorder' class='validate-digits'}
        </div>
        <div class="z-formrow">
            {formlabel for='block' __text='Block' mandatorysym='1'}
            {formintinput group='boxx' id='block' mandatory=true __title='Enter the block of the boxx' maxLength=11 cssClass='required validate-digits'}
            {dashboardValidationError id='block' class='required'}
            {dashboardValidationError id='block' class='validate-digits'}
        </div>
        <div class="z-formrow">
            {formlabel for='plugin' __text='Plugin' mandatorysym='1'}
            {formtextinput group='boxx' id='plugin' mandatory=true readOnly=false __title='Enter the plugin of the boxx' textMode='singleline' maxLength=125 cssClass='required'}
            {dashboardValidationError id='plugin' class='required'}
        </div>
        <div class="z-formrow">
            {formlabel for='page' __text='Page' mandatorysym='1'}
            {formintinput group='boxx' id='page' mandatory=true __title='Enter the page of the boxx' maxLength=11 cssClass='required validate-digits'}
            {dashboardValidationError id='page' class='required'}
            {dashboardValidationError id='page' class='validate-digits'}
        </div>
        <div class="z-formrow">
            {formlabel for='boxdata' __text='Boxdata'}
            {formtextinput group='boxx' id='boxdata' mandatory=false __title='Enter the boxdata of the boxx' textMode='multiline' rows='6' cols='50' cssClass=''}
        </div>
    </fieldset>

    {if $mode ne 'create'}
        {include file='admin/include_standardfields_edit.tpl' obj=$boxx}
    {/if}

    {* include display hooks *}
    {if $mode eq 'create'}
        {notifydisplayhooks eventname='dashboard.ui_hooks.boxes.form_edit' id=null assign='hooks'}
    {else}
        {notifydisplayhooks eventname='dashboard.ui_hooks.boxes.form_edit' id=$boxx.id assign='hooks'}
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
                {formcheckbox group='boxx' id='repeatcreation' readOnly=false}
            </div>
        </fieldset>
    {/if}

    {* include possible submit actions *}
    <div class="z-buttons z-formbuttons">
    {if $mode eq 'edit'}
        {formbutton id='btnUpdate' commandName='update' __text='Update boxx' class='z-bt-save'}
      {if !$inlineUsage}
        {gt text='Really delete this boxx?' assign='deleteConfirmMsg'}
        {formbutton id='btnDelete' commandName='delete' __text='Delete boxx' class='z-bt-delete z-btred' confirmMessage=$deleteConfirmMsg}
      {/if}
    {elseif $mode eq 'create'}
        {formbutton id='btnCreate' commandName='create' __text='Create boxx' class='z-bt-ok'}
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

        dashboardAddCommonValidationRules('boxx', '{{if $mode eq 'create'}}{{else}}{{$boxx.id}}{{/if}}');

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
