{* purpose of this template: build the Form to edit an instance of boxes *}
{include file='user/header.tpl'}
{pageaddvar name='javascript' value='modules/Dashboard/javascript/Dashboard_editFunctions.js'}
{pageaddvar name='javascript' value='modules/Dashboard/javascript/Dashboard_validation.js'}

{if $mode eq 'edit'}
    {gt text='Edit boxes' assign='templateTitle'}
{elseif $mode eq 'create'}
    {gt text='Create boxes' assign='templateTitle'}
{else}
    {gt text='Edit boxes' assign='templateTitle'}
{/if}
<div class="dashboard-boxes dashboard-edit">
{pagesetvar name='title' value=$templateTitle}
<div class="z-frontendcontainer">
    <h2>{$templateTitle}</h2>
{form cssClass='z-form'}
    {* add validation summary and a <div> element for styling the form *}
    {dashboardFormFrame}
    {formsetinitialfocus inputId='userid'}

    <fieldset>
        <legend>{gt text='Content'}</legend>
        <div class="z-formrow">
            {formlabel for='userid' __text='Userid' mandatorysym='1'}
            {formintinput group='boxes' id='userid' mandatory=true __title='Enter the userid of the boxes' maxLength=11 cssClass='required validate-digits'}
            {dashboardValidationError id='userid' class='required'}
            {dashboardValidationError id='userid' class='validate-digits'}
        </div>
        <div class="z-formrow">
            {formlabel for='dbposition' __text='Dbposition' mandatorysym='1'}
            {formintinput group='boxes' id='dbposition' mandatory=true __title='Enter the dbposition of the boxes' maxLength=11 cssClass='required validate-digits'}
            {dashboardValidationError id='dbposition' class='required'}
            {dashboardValidationError id='dbposition' class='validate-digits'}
        </div>
        <div class="z-formrow">
            {formlabel for='block' __text='Block' mandatorysym='1'}
            {formintinput group='boxes' id='block' mandatory=true __title='Enter the block of the boxes' maxLength=11 cssClass='required validate-digits'}
            {dashboardValidationError id='block' class='required'}
            {dashboardValidationError id='block' class='validate-digits'}
        </div>
        <div class="z-formrow">
            {formlabel for='plugin' __text='Plugin' mandatorysym='1'}
            {formtextinput group='boxes' id='plugin' mandatory=true readOnly=false __title='Enter the plugin of the boxes' textMode='singleline' maxLength=125 cssClass='required'}
            {dashboardValidationError id='plugin' class='required'}
        </div>
        <div class="z-formrow">
            {formlabel for='page' __text='Page' mandatorysym='1'}
            {formintinput group='boxes' id='page' mandatory=true __title='Enter the page of the boxes' maxLength=11 cssClass='required validate-digits'}
            {dashboardValidationError id='page' class='required'}
            {dashboardValidationError id='page' class='validate-digits'}
        </div>
    </fieldset>

    {if $mode ne 'create'}
        {include file='user/include_standardfields_edit.tpl' obj=$boxes}
    {/if}

    {* include display hooks *}
    {if $mode eq 'create'}
        {notifydisplayhooks eventname='dashboard.ui_hooks.boxes.form_edit' id=null assign='hooks'}
    {else}
        {notifydisplayhooks eventname='dashboard.ui_hooks.boxes.form_edit' id=$boxes.id assign='hooks'}
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
                {formcheckbox group='boxes' id='repeatcreation' readOnly=false}
            </div>
        </fieldset>
    {/if}

    {* include possible submit actions *}
    <div class="z-buttons z-formbuttons">
    {if $mode eq 'edit'}
        {formbutton id='btnUpdate' commandName='update' __text='Update boxes' class='z-bt-save'}
      {if !$inlineUsage}
        {gt text='Really delete this boxes?' assign='deleteConfirmMsg'}
        {formbutton id='btnDelete' commandName='delete' __text='Delete boxes' class='z-bt-delete z-btred' confirmMessage=$deleteConfirmMsg}
      {/if}
    {elseif $mode eq 'create'}
        {formbutton id='btnCreate' commandName='create' __text='Create boxes' class='z-bt-ok'}
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

        dashboardAddCommonValidationRules('boxes', '{{if $mode eq 'create'}}{{else}}{{$boxes.id}}{{/if}}');

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
