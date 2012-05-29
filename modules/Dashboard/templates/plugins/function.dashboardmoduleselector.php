<?php

function smarty_function_dashboardmoduleselector($params, $view)
{
    return $view->registerPlugin('Dashboard_Form_Plugin_ModuleSelector', $params);
}
