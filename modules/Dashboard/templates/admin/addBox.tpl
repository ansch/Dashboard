{* purpose of this template: show output of add box action in admin area *}
{include file='admin/header.tpl'}
<div class="dashboard-addbox dashboard-addbox">
{gt text='Add box' assign='templateTitle'}
{pagesetvar name='title' value=$templateTitle}
<div class="z-admin-content-pagetitle">
    {icon type='options' size='small' __alt='Add box'}
    <h3>{$templateTitle}</h3>
</div>

    <p>Please override this template by moving it from <em>/modules/Dashboard/templates/admin/addBox.tpl</em> to either your <em>/themes/YourTheme/templates/modules/Dashboard/admin/addBox.tpl</em> or <em>/config/templates/Dashboard/admin/addBox.tpl</em>.</p>

</div>
{include file='admin/footer.tpl'}
