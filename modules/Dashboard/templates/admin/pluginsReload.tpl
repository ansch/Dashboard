{* purpose of this template: show output of plugins reload action in admin area *}
{include file='admin/header.tpl'}
<div class="dashboard-pluginsreload dashboard-pluginsreload">
{gt text='Plugins reload' assign='templateTitle'}
{pagesetvar name='title' value=$templateTitle}
<div class="z-admin-content-pagetitle">
    {icon type='options' size='small' __alt='Plugins reload'}
    <h3>{$templateTitle}</h3>
</div>

    <p>Please override this template by moving it from <em>/modules/Dashboard/templates/admin/pluginsReload.tpl</em> to either your <em>/themes/YourTheme/templates/modules/Dashboard/admin/pluginsReload.tpl</em> or <em>/config/templates/Dashboard/admin/pluginsReload.tpl</em>.</p>

</div>
{include file='admin/footer.tpl'}
