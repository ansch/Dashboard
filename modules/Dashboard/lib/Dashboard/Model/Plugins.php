<?php
/**
 * Downloads
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 */

class Dashboard_Model_Plugins extends Doctrine_Record
{

    public function setTableDefinition()
    {
        $this->setTableName('dashboard_plugins');
        $this->hasColumn('id', 'integer', 4, array(
            'primary' => true,
            'autoincrement' => true
        ));
        $this->hasColumn('active', 'integer', 8, array(
            'default' => '',
            'notnull' => true
        ));
        $this->hasColumn('name', 'string', 30, array(
            'default' => '',
            'notnull' => true
        ));        
        $this->hasColumn('title', 'string', 250, array(
            'default' => '',
            'notnull' => true
        ));
        $this->hasColumn('dbsize', 'integer', 8, array(
            'default' => '',
            'notnull' => true
        ));        
        $this->hasColumn('dbfile', 'string', 255, array(
            'default' => '',
            'notnull' => true
        ));
        $this->hasColumn('ajax', 'integer', 8, array(
            'default' => '',
            'notnull' => true
        ));  
        $this->hasColumn('createdUserId', 'integer', 11, array(
            'type' => 'integer',
            'length' => 11,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'default' => '',
            'notnull' => true,
            'autoincrement' => false,
        )); 
        $this->hasColumn('updatedUserId', 'integer', 11, array(
            'type' => 'integer',
            'length' => 11,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'default' => '',
            'notnull' => true,
            'autoincrement' => false,
        )); 
        $this->hasColumn('createdDate', 'datetime', array(
            'type' => 'datetime',
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'default' => '',
            'notnull' => true,
            'autoincrement' => false,
        ));  
        $this->hasColumn('updatedDate', 'datetime', array(
            'type' => 'datetime',
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'default' => '',
            'notnull' => true,
            'autoincrement' => false,
        )); 
    }
    
 //   public function setUp()
 //   {
 //       $this->actAs('Zikula_Doctrine_Template_StandardFields');
 //   }

}