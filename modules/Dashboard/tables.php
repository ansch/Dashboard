<?php

/**
 * Populate tables array for the module
 *
 * @return       array       The table information.
 */
function dashboard_tables()
{
    // Initialise table array
    $table = array();
    $table['dashboard_boxx'] = 'dashboard_boxx';
    // Columns for tables
    $table['dashboard_boxx_column'] = array (
    			'id'					=> 'id',
    			'userid'				=> 'userid',
    			'boxorder'                              => 'boxorder',
    			'block'					=> 'block',
    			'plugin'				=> 'plugin',
    			'page'					=> 'page'
    			);
    // column definition        			
    $table['dashboard_boxx_column_def'] = array (
    			'id'					=> "I AUTOINCREMENT PRIMARY",
    			'userid'				=> "I NOTNULL DEFAULT 0",
                        'boxorder'                              => "I NOTNULL DEFAULT 0",
    			'block'					=> "I NOTNULL DEFAULT 0",
    			'plugin'				=> "C(125) NOTNULL DEFAULT ''",
    			'page'					=> "I NOTNULL DEFAULT 1"
    			);

    // Add Index
	$table['dashboard_boxx_column_idx'] = array('useridindex' => array('userid'));    
	    // add standard data fields
    ObjectUtil::addStandardFieldsToTableDefinition ($table['dashboard_boxx_column']);
    ObjectUtil::addStandardFieldsToTableDataDefinition($table['dashboard_boxx_column_def']);	
    			
	// *********************************************************************************
    $table['dashboard_plugin'] = 'dashboard_plugin';

    // Columns for tables
    $columns = array (
    			'id'					=> 'id',
    			'active'				=> 'active',
    			'name'					=> 'name',
    			'title'					=> 'title',
    			'boxsize'				=> 'boxsize',
			'pluginfile'				=> 'pluginfile',
    			'ajax'					=> 'ajax'
    			);	
    // column definition        			
    $columnDef = array (
    			'id'					=> "I PRIMARY AUTO",
    			'active'				=> "I NOTNULL DEFAULT ''",
    			'name'					=> "C(30) NOTNULL DEFAULT ''",
    			'title'					=> "C(250) NOTNULL DEFAULT ''",
    			'boxsize'				=> "I NOTNULL DEFAULT ''",
    			'pluginfile'				=> "C(255) NOTNULL DEFAULT ''",
    			'ajax'					=> "I NOTNULL DEFAULT ''"
    			); 
	    // add standard data fields
  // ObjectUtil::addStandardFieldsToTableDefinition ($columns);
  // ObjectUtil::addStandardFieldsToTableDataDefinition($columnDef);
   
    $table['dashboard_plugin_primary_key_column'] = 'id';
    
    $table['dashboard_plugin_column'] = $columns;
    $table['dashboard_plugin_column_def'] = $columnDef;
    			
    // Add Index
	//$table['dashboard_plugin_column_idx'] = array('useridindex' => array('userid')); 
	

	    
	// Return table information
	return $table;
}
