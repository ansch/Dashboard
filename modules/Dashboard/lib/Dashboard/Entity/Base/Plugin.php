<?php
/**
 * Dashboard.
 *
 * @copyright André Schöne
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License
 * @package Dashboard
 * @author André Schöne <andre.schoene@onlinehome.de>.
 * @link http://www.schoenes-neue-welt.de
 * @link http://zikula.org
 * @version Generated by ModuleStudio 0.5.4 (http://modulestudio.de) at Thu Jun 07 13:38:24 CEST 2012.
 */

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use DoctrineExtensions\StandardFields\Mapping\Annotation as ZK;

/**
 * Entity class that defines the entity structure and behaviours.
 *
 * This is the base entity class for plugin entities.
 *
 * @abstract
 */
abstract class Dashboard_Entity_Base_Plugin extends Zikula_EntityAccess
{

    /**
     * @var string The tablename this object maps to
     */
    protected $_objectType = 'plugin';

    /**
     * @var array List of primary key field names
     */
    protected $_idFields = array();

    /**
     * @var Dashboard_Entity_Validator_Plugin The validator for this entity
     */
    protected $_validator = null;

    /**
     * @var boolean Whether this entity supports unique slugs
     */
    protected $_hasUniqueSlug = false;

    /**
     * @var array List of available item actions
     */
    protected $_actions = array();



    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", unique=true)
     * @var integer $id.
     */
    protected $id = 0;


    /**
     * @ORM\Column(type="bigint")
     * @var bigint $active.
     */
    protected $active = 0;


    /**
     * @ORM\Column(length=30)
     * @var string $name.
     */
    protected $name = '';


    /**
     * @ORM\Column(length=250)
     * @var string $title.
     */
    protected $title = '';


    /**
     * @ORM\Column(type="bigint")
     * @var bigint $boxsize.
     */
    protected $boxsize = 1;


    /**
     * @ORM\Column(length=255)
     * @var string $pluginfile.
     */
    protected $pluginfile = '';


    /**
     * @ORM\Column(type="bigint")
     * @var bigint $ajax.
     */
    protected $ajax = 0;


    /**
     * @ORM\Column(type="integer")
     * @ZK\StandardFields(type="userid", on="create")
     * @var integer $createdUserId.
     */
    protected $createdUserId;

    /**
     * @ORM\Column(type="integer")
     * @ZK\StandardFields(type="userid", on="update")
     * @var integer $updatedUserId.
     */
    protected $updatedUserId;

    /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     * @var datetime $createdDate.
     */
    protected $createdDate;

    /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="update")
     * @var datetime $updatedDate.
     */
    protected $updatedDate;



    /**
     * Constructor.
     * Will not be called by Doctrine and can therefore be used
     * for own implementation purposes. It is also possible to add
     * arbitrary arguments as with every other class method.
     */
    public function __construct()
    {
        $this->id = 1;
        $this->active = 1;
        $this->ajax = 1;
        $this->_idFields = array('id');
        $this->initValidator();
        $this->_hasUniqueSlug = false;
    }

    /**
     * Get _object type.
     *
     * @return string
     */
    public function get_objectType()
    {
        return $this->_objectType;
    }

    /**
     * Set _object type.
     *
     * @param string $_objectType.
     *
     * @return void
     */
    public function set_objectType($_objectType)
    {
        $this->_objectType = $_objectType;
    }


    /**
     * Get _id fields.
     *
     * @return array
     */
    public function get_idFields()
    {
        return $this->_idFields;
    }

    /**
     * Set _id fields.
     *
     * @param array $_idFields.
     *
     * @return void
     */
    public function set_idFields(array $_idFields = Array())
    {
        $this->_idFields = $_idFields;
    }


    /**
     * Get _validator.
     *
     * @return Dashboard_Entity_Validator_Plugin
     */
    public function get_validator()
    {
        return $this->_validator;
    }

    /**
     * Set _validator.
     *
     * @param Dashboard_Entity_Validator_Plugin $_validator.
     *
     * @return void
     */
    public function set_validator(Dashboard_Entity_Validator_Plugin $_validator = null)
    {
        $this->_validator = $_validator;
    }


    /**
     * Get _has unique slug.
     *
     * @return boolean
     */
    public function get_hasUniqueSlug()
    {
        return $this->_hasUniqueSlug;
    }

    /**
     * Set _has unique slug.
     *
     * @param boolean $_hasUniqueSlug.
     *
     * @return void
     */
    public function set_hasUniqueSlug($_hasUniqueSlug)
    {
        $this->_hasUniqueSlug = $_hasUniqueSlug;
    }


    /**
     * Get _actions.
     *
     * @return array
     */
    public function get_actions()
    {
        return $this->_actions;
    }

    /**
     * Set _actions.
     *
     * @param array $_actions.
     *
     * @return void
     */
    public function set_actions(array $_actions = Array())
    {
        $this->_actions = $_actions;
    }



    /**
     * Get id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id.
     *
     * @param integer $id.
     *
     * @return void
     */
    public function setId($id)
    {
        if ($id != $this->id) {
            $this->id = $id;
        }
    }

    /**
     * Get active.
     *
     * @return bigint
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set active.
     *
     * @param bigint $active.
     *
     * @return void
     */
    public function setActive($active)
    {
        if ($active != $this->active) {
            $this->active = $active;
        }
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name.
     *
     * @param string $name.
     *
     * @return void
     */
    public function setName($name)
    {
        if ($name != $this->name) {
            $this->name = $name;
        }
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title.
     *
     * @param string $title.
     *
     * @return void
     */
    public function setTitle($title)
    {
        if ($title != $this->title) {
            $this->title = $title;
        }
    }

    /**
     * Get boxsize.
     *
     * @return bigint
     */
    public function getBoxsize()
    {
        return $this->boxsize;
    }

    /**
     * Set boxsize.
     *
     * @param bigint $boxsize.
     *
     * @return void
     */
    public function setBoxsize($boxsize)
    {
        if ($boxsize != $this->boxsize) {
            $this->boxsize = $boxsize;
        }
    }

    /**
     * Get pluginfile.
     *
     * @return string
     */
    public function getPluginfile()
    {
        return $this->pluginfile;
    }

    /**
     * Set pluginfile.
     *
     * @param string $pluginfile.
     *
     * @return void
     */
    public function setPluginfile($pluginfile)
    {
        if ($pluginfile != $this->pluginfile) {
            $this->pluginfile = $pluginfile;
        }
    }

    /**
     * Get ajax.
     *
     * @return bigint
     */
    public function getAjax()
    {
        return $this->ajax;
    }

    /**
     * Set ajax.
     *
     * @param bigint $ajax.
     *
     * @return void
     */
    public function setAjax($ajax)
    {
        if ($ajax != $this->ajax) {
            $this->ajax = $ajax;
        }
    }


    /**
     * Get created user id.
     *
     * @return integer[]
     */
    public function getCreatedUserId()
    {
        return $this->createdUserId;
    }

    /**
     * Set created user id.
     *
     * @param integer[] $createdUserId.
     *
     * @return void
     */
    public function setCreatedUserId($createdUserId)
    {
        $this->createdUserId = $createdUserId;
    }

    /**
     * Get updated user id.
     *
     * @return integer[]
     */
    public function getUpdatedUserId()
    {
        return $this->updatedUserId;
    }

    /**
     * Set updated user id.
     *
     * @param integer[] $updatedUserId.
     *
     * @return void
     */
    public function setUpdatedUserId($updatedUserId)
    {
        $this->updatedUserId = $updatedUserId;
    }

    /**
     * Get created date.
     *
     * @return datetime[]
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set created date.
     *
     * @param datetime[] $createdDate.
     *
     * @return void
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    /**
     * Get updated date.
     *
     * @return datetime[]
     */
    public function getUpdatedDate()
    {
        return $this->updatedDate;
    }

    /**
     * Set updated date.
     *
     * @param datetime[] $updatedDate.
     *
     * @return void
     */
    public function setUpdatedDate($updatedDate)
    {
        $this->updatedDate = $updatedDate;
    }




    /**
     * Initialise validator and return it's instance.
     *
     * @return Dashboard_Entity_Validator_Plugin The validator for this entity.
     */
    public function initValidator()
    {
        if (!is_null($this->_validator)) {
            return $this->_validator;
        }
        $this->_validator = new Dashboard_Entity_Validator_Plugin($this);
        return $this->_validator;
    }

    /**
     * Start validation and raise exception if invalid data is found.
     *
     * @return void.
     */
    public function validate()
    {
        $result = $this->initValidator()->validateAll();
        if (is_array($result)) {
            throw new Zikula_Exception($result['message'], $result['code'], $result['debugArray']);
        }
    }

    /**
     * Return entity data in JSON format.
     *
     * @return string JSON-encoded data.
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

    /**
     * Collect available actions for this entity.
     */
    protected function prepareItemActions()
    {
        if (!empty($this->_actions)) {
            return;
        }

        $currentType = FormUtil::getPassedValue('type', 'user', 'GETPOST', FILTER_SANITIZE_STRING);
        $currentFunc = FormUtil::getPassedValue('func', 'main', 'GETPOST', FILTER_SANITIZE_STRING);
        $dom = ZLanguage::getModuleDomain('Dashboard');
        if ($currentType == 'admin') {
            if (in_array($currentFunc, array('main', 'view'))) {
                    $this->_actions[] = array(
                        'url' => array('type' => 'user', 'func' => 'display', 'arguments' => array('ot' => 'plugin', 'id' => $this['id'])),
                        'icon' => 'preview',
                        'linkTitle' => __('Open preview page', $dom),
                        'linkText' => __('Preview', $dom)
                    );
                    $this->_actions[] = array(
                        'url' => array('type' => 'admin', 'func' => 'display', 'arguments' => array('ot' => 'plugin', 'id' => $this['id'])),
                        'icon' => 'display',
                        'linkTitle' => str_replace('"', '', $this['name']),
                        'linkText' => __('Details', $dom)
                    );
            }

            if (in_array($currentFunc, array('main', 'view', 'display'))) {
                if (SecurityUtil::checkPermission('Dashboard::', '.*', ACCESS_EDIT)) {

                    $this->_actions[] = array(
                        'url' => array('type' => 'admin', 'func' => 'edit', 'arguments' => array('ot' => 'plugin', 'id' => $this['id'])),
                        'icon' => 'edit',
                        'linkTitle' => __('Edit', $dom),
                        'linkText' => __('Edit', $dom)
                    );
                    $this->_actions[] = array(
                        'url' => array('type' => 'admin', 'func' => 'edit', 'arguments' => array('ot' => 'plugin', 'astemplate' => $this['id'])),
                        'icon' => 'saveas',
                        'linkTitle' => __('Reuse for new item', $dom),
                        'linkText' => __('Reuse', $dom)
                    );
                }
                if (SecurityUtil::checkPermission('Dashboard::', '.*', ACCESS_DELETE)) {
                    $this->_actions[] = array(
                        'url' => array('type' => 'admin', 'func' => 'delete', 'arguments' => array('ot' => 'plugin', 'id' => $this['id'])),
                        'icon' => 'delete',
                        'linkTitle' => __('Delete', $dom),
                        'linkText' => __('Delete', $dom)
                    );
                }
            }
            if ($currentFunc == 'display') {
                    $this->_actions[] = array(
                        'url' => array('type' => 'admin', 'func' => 'view', 'arguments' => array('ot' => 'plugin')),
                        'icon' => 'back',
                        'linkTitle' => __('Back to overview', $dom),
                        'linkText' => __('Back to overview', $dom)
                    );
            }
        }
        if ($currentType == 'user') {
            if (in_array($currentFunc, array('main', 'view'))) {
                    $this->_actions[] = array(
                        'url' => array('type' => 'user', 'func' => 'display', 'arguments' => array('ot' => 'plugin', 'id' => $this['id'])),
                        'icon' => 'display',
                        'linkTitle' => str_replace('"', '', $this['name']),
                        'linkText' => __('Details', $dom)
                    );
            }

            if (in_array($currentFunc, array('main', 'view', 'display'))) {
                if (SecurityUtil::checkPermission('Dashboard::', '.*', ACCESS_EDIT)) {

                    $this->_actions[] = array(
                        'url' => array('type' => 'user', 'func' => 'edit', 'arguments' => array('ot' => 'plugin', 'id' => $this['id'])),
                        'icon' => 'edit',
                        'linkTitle' => __('Edit', $dom),
                        'linkText' => __('Edit', $dom)
                    );
                    $this->_actions[] = array(
                        'url' => array('type' => 'user', 'func' => 'edit', 'arguments' => array('ot' => 'plugin', 'astemplate' => $this['id'])),
                        'icon' => 'saveas',
                        'linkTitle' => __('Reuse for new item', $dom),
                        'linkText' => __('Reuse', $dom)
                    );
                }
                if (SecurityUtil::checkPermission('Dashboard::', '.*', ACCESS_DELETE)) {
                    $this->_actions[] = array(
                        'url' => array('type' => 'user', 'func' => 'delete', 'arguments' => array('ot' => 'plugin', 'id' => $this['id'])),
                        'icon' => 'delete',
                        'linkTitle' => __('Delete', $dom),
                        'linkText' => __('Delete', $dom)
                    );
                }
            }
            if ($currentFunc == 'display') {
                    $this->_actions[] = array(
                        'url' => array('type' => 'user', 'func' => 'view', 'arguments' => array('ot' => 'plugin')),
                        'icon' => 'back',
                        'linkTitle' => __('Back to overview', $dom),
                        'linkText' => __('Back to overview', $dom)
                    );
            }
        }
    }




    /**
     * Post-Process the data after the entity has been constructed by the entity manager.
     * The event happens after the entity has been loaded from database or after a refresh call.
     *
     * Restrictions:
     *     - no access to entity manager or unit of work apis
     *     - no access to associations (not initialised yet)
     *
     * @see Dashboard_Entity_Plugin::postLoadCallback()
     * @return boolean true if completed successfully else false.
     */
    protected function performPostLoadCallback()
    {
        // echo 'loaded a record ...';

        $currentType = FormUtil::getPassedValue('type', 'user', 'GETPOST', FILTER_SANITIZE_STRING);
        $currentFunc = FormUtil::getPassedValue('func', 'main', 'GETPOST', FILTER_SANITIZE_STRING);

        $this['id'] = (int) ((isset($this['id']) && !empty($this['id'])) ? DataUtil::formatForDisplay($this['id']) : 0);
        $this['active'] = (int) ((isset($this['active']) && !empty($this['active'])) ? DataUtil::formatForDisplay($this['active']) : 0);
    if ($currentFunc != 'edit') {
        $this['name'] = ((isset($this['name']) && !empty($this['name'])) ? DataUtil::formatForDisplayHTML($this['name']) : '');
    }
    if ($currentFunc != 'edit') {
        $this['title'] = ((isset($this['title']) && !empty($this['title'])) ? DataUtil::formatForDisplayHTML($this['title']) : '');
    }
        $this['boxsize'] = (int) ((isset($this['boxsize']) && !empty($this['boxsize'])) ? DataUtil::formatForDisplay($this['boxsize']) : 0);
    if ($currentFunc != 'edit') {
        $this['pluginfile'] = ((isset($this['pluginfile']) && !empty($this['pluginfile'])) ? DataUtil::formatForDisplayHTML($this['pluginfile']) : '');
    }
        $this['ajax'] = (int) ((isset($this['ajax']) && !empty($this['ajax'])) ? DataUtil::formatForDisplay($this['ajax']) : 0);
        $this->prepareItemActions();
        return true;
    }

    /**
     * Pre-Process the data prior to an insert operation.
     * The event happens before the entity managers persist operation is executed for this entity.
     *
     * Restrictions:
     *     - no access to entity manager or unit of work apis
     *     - no identifiers available if using an identity generator like sequences
     *     - Doctrine won't recognize changes on relations which are done here
     *       if this method is called by cascade persist
     *     - no creation of other entities allowed
     *
     * @see Dashboard_Entity_Plugin::prePersistCallback()
     * @return boolean true if completed successfully else false.
     */
    protected function performPrePersistCallback()
    {
        // echo 'inserting a record ...';
        $this->validate();
        return true;
    }

    /**
     * Post-Process the data after an insert operation.
     * The event happens after the entity has been made persistant.
     * Will be called after the database insert operations.
     * The generated primary key values are available.
     *
     * Restrictions:
     *     - no access to entity manager or unit of work apis
     *
     * @see Dashboard_Entity_Plugin::postPersistCallback()
     * @return boolean true if completed successfully else false.
     */
    protected function performPostPersistCallback()
    {
        // echo 'inserted a record ...';
        return true;
    }

    /**
     * Pre-Process the data prior a delete operation.
     * The event happens before the entity managers remove operation is executed for this entity.
     *
     * Restrictions:
     *     - no access to entity manager or unit of work apis
     *     - will not be called for a DQL DELETE statement
     *
     * @see Dashboard_Entity_Plugin::preRemoveCallback()
     * @return boolean true if completed successfully else false.
     */
    protected function performPreRemoveCallback()
    {
/*        // delete workflow for this entity
        $result = Zikula_Workflow_Util::deleteWorkflow($this);
        if ($result === false) {
            $dom = ZLanguage::getModuleDomain('Dashboard');
            return LogUtil::registerError(__('Error! Could not remove stored workflow.', $dom));
        }*/
        return true;
    }

    /**
     * Post-Process the data after a delete.
     * The event happens after the entity has been deleted.
     * Will be called after the database delete operations.
     *
     * Restrictions:
     *     - no access to entity manager or unit of work apis
     *     - will not be called for a DQL DELETE statement
     *
     * @see Dashboard_Entity_Plugin::postRemoveCallback()
     * @return boolean true if completed successfully else false.
     */
    protected function performPostRemoveCallback()
    {
        // echo 'deleted a record ...';
        return true;
    }

    /**
     * Pre-Process the data prior to an update operation.
     * The event happens before the database update operations for the entity data.
     *
     * Restrictions:
     *     - no access to entity manager or unit of work apis
     *     - will not be called for a DQL UPDATE statement
     *     - changes on associations are not allowed and won't be recognized by flush
     *     - changes on properties won't be recognized by flush as well
     *     - no creation of other entities allowed
     *
     * @see Dashboard_Entity_Plugin::preUpdateCallback()
     * @return boolean true if completed successfully else false.
     */
    protected function performPreUpdateCallback()
    {
        // echo 'updating a record ...';
        $this->validate();
        return true;
    }

    /**
     * Post-Process the data after an update operation.
     * The event happens after the database update operations for the entity data.
     *
     * Restrictions:
     *     - no access to entity manager or unit of work apis
     *     - will not be called for a DQL UPDATE statement
     *
     * @see Dashboard_Entity_Plugin::postUpdateCallback()
     * @return boolean true if completed successfully else false.
     */
    protected function performPostUpdateCallback()
    {
        // echo 'updated a record ...';
        return true;
    }

    /**
     * Pre-Process the data prior to a save operation.
     * This combines the PrePersist and PreUpdate events.
     * For more information see corresponding callback handlers.
     *
     * @see Dashboard_Entity_Plugin::preSaveCallback()
     * @return boolean true if completed successfully else false.
     */
    protected function performPreSaveCallback()
    {
        // echo 'saving a record ...';
        $this->validate();
        return true;
    }

    /**
     * Post-Process the data after a save operation.
     * This combines the PostPersist and PostUpdate events.
     * For more information see corresponding callback handlers.
     *
     * @see Dashboard_Entity_Plugin::postSaveCallback()
     * @return boolean true if completed successfully else false.
     */
    protected function performPostSaveCallback()
    {
        // echo 'saved a record ...';
        return true;
    }

}
