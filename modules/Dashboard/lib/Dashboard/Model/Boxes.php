<?php
/**
 * Downloads
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 */

class Dashboard_Model_Boxes extends Doctrine_Record
{

    public function setTableDefinition()
    {
        $this->setTableName('dashboard_boxes');
        $this->hasColumn('id', 'integer', 4, array(
            'primary' => true,
            'autoincrement' => true
        ));
        $this->hasColumn('userid', 'integer', 8, array(
            'default' => '',
            'notnull' => true
        ));
        $this->hasColumn('dbposition', 'integer', 8, array(
            'default' => '',
            'notnull' => false
        ));
        $this->hasColumn('block', 'integer', 8, array(
            'default' => '',
            'notnull' => false
        ));        
        $this->hasColumn('plugin', 'string', 125, array(
            'default' => '',
            'notnull' => true
        ));  
        $this->hasColumn('page', 'integer', 8, array(
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