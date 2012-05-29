{* purpose of this template: show output of update common settings action in admin area *}
{include file='admin/header.tpl'}
<div class="dashboard-updatecommonsettings dashboard-updatecommonsettings">
{gt text='Update common settings' assign='templateTitle'}
{pagesetvar name='title' value=$templateTitle}
<div class="z-admin-content-pagetitle">
    {icon type='options' size='small' __alt='Update common settings'}
    <h3>{$templateTitle}</h3>
</div>

    <p>Please override this template by moving it from <em>/modules/Dashboard/templates/admin/updateCommonSettings.tpl</em> to either your <em>/themes/YourTheme/templates/modules/Dashboard/admin/updateCommonSettings.tpl</em> or <em>/config/templates/Dashboard/admin/updateCommonSettings.tpl</em>.</p>

</div>
{include file='admin/footer.tpl'}
