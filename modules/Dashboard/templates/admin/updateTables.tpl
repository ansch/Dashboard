{* purpose of this template: show output of update tables action in admin area *}
{include file='admin/header.tpl'}
<div class="dashboard-updatetables dashboard-updatetables">
{gt text='Update tables' assign='templateTitle'}
{pagesetvar name='title' value=$templateTitle}
<div class="z-admin-content-pagetitle">
    {icon type='options' size='small' __alt='Update tables'}
    <h3>{$templateTitle}</h3>
</div>

    <p>Please override this template by moving it from <em>/modules/Dashboard/templates/admin/updateTables.tpl</em> to either your <em>/themes/YourTheme/templates/modules/Dashboard/admin/updateTables.tpl</em> or <em>/config/templates/Dashboard/admin/updateTables.tpl</em>.</p>

</div>
{include file='admin/footer.tpl'}
