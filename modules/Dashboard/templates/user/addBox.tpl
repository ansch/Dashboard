{* purpose of this template: show output of add box action in user area *}
{include file='user/header.tpl'}
<div class="dashboard-addbox dashboard-addbox">
{gt text='Add box' assign='templateTitle'}
{pagesetvar name='title' value=$templateTitle}
<div class="z-frontendcontainer">
    <h2>{$templateTitle}</h2>

    <p>Please override this template by moving it from <em>/modules/Dashboard/templates/user/addBox.tpl</em> to either your <em>/themes/YourTheme/templates/modules/Dashboard/user/addBox.tpl</em> or <em>/config/templates/Dashboard/user/addBox.tpl</em>.</p>

</div>
</div>
{include file='user/footer.tpl'}
