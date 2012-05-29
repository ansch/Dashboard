{* Purpose of this template: edit view of generic item list content type *}

<div class="z-formrow">
    {formlabel for='Dashboard_objecttype' __text='Object type'}
    {dashboardSelectorObjectTypes assign='allObjectTypes'}
    {formdropdownlist id='Dashboard_objecttype' dataField='objectType' group='data' mandatory=true items=$allObjectTypes}
</div>

<div class="z-formrow">
    {formlabel __text='Sorting'}
    <div>
        {formradiobutton id='Dashboard_srandom' value='random' dataField='sorting' group='data' mandatory=true}
        {formlabel for='Dashboard_srandom' __text='Random'}
        {formradiobutton id='Dashboard_snewest' value='newest' dataField='sorting' group='data' mandatory=true}
        {formlabel for='Dashboard_snewest' __text='Newest'}
        {formradiobutton id='Dashboard_sdefault' value='default' dataField='sorting' group='data' mandatory=true}
        {formlabel for='Dashboard_sdefault' __text='Default'}
    </div>
</div>

<div class="z-formrow">
    {formlabel for='Dashboard_amount' __text='Amount'}
    {formtextinput id='Dashboard_amount' dataField='amount' group='data' mandatory=true maxLength=2}
</div>

<div class="z-formrow">
    {formlabel for='Dashboard_template' __text='Template File'}
    {dashboardSelectorTemplates assign='allTemplates'}
    {formdropdownlist id='Dashboard_template' dataField='template' group='data' mandatory=true items=$allTemplates}
</div>

<div class="z-formrow">
    {formlabel for='Dashboard_filter' __text='Filter (expert option)'}
    {formtextinput id='Dashboard_filter' dataField='filter' group='data' mandatory=false maxLength=255}
    <div class="z-formnote">({gt text='Syntax examples'}: <kbd>name:like:foobar</kbd> {gt text='or'} <kbd>status:ne:3</kbd>)</div>
</div>
