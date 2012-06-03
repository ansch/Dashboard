{* purpose of this template: show output of switch position action in user area *}
{include file='user/header.tpl'}
<div class="dashboard-switchposition dashboard-switchposition">
{gt text='Switch position' assign='templateTitle'}
{pagesetvar name='title' value=$templateTitle}
<div class="z-frontendcontainer">
    <h2>{$templateTitle}</h2>

    <p>Please override this template by moving it from <em>/modules/Dashboard/templates/user/switchPosition.tpl</em> to either your <em>/themes/YourTheme/templates/modules/Dashboard/user/switchPosition.tpl</em> or <em>/config/templates/Dashboard/user/switchPosition.tpl</em>.</p>

</div>
</div>
{include file='user/footer.tpl'}
