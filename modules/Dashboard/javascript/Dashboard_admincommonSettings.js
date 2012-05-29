Event.observe(window, 'load', Dasboard_commonSettings_init, false);

function Dasboard_commonSettings_init()
{
    Event.observe('AllowCustomizing_yes', 'click', AllowCustomizing_onchange, false);
    Event.observe('AllowCustomizing_no', 'click', AllowCustomizing_onchange, false);

    if ( $('AllowCustomizing_yes').checked) {
        $('AllowCustomizing_container').hide();
    }
}


function AllowCustomizing_onchange()
{
    radioswitchdisplaystate('AllowCustomizing', 'AllowCustomizing_container', false);
}
