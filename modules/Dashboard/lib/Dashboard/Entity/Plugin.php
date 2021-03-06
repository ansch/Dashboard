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
 * This is the concrete entity class for plugin entities.
 * @ORM\Entity(repositoryClass="Dashboard_Entity_Repository_Plugin")
 * @ORM\Table(name="dashboard_plugin")
 * @ORM\HasLifecycleCallbacks
 */
class Dashboard_Entity_Plugin extends Dashboard_Entity_Base_Plugin
{
    // feel free to add your own methods here



    /**
     * Post-Process the data after the entity has been constructed by the entity manager.
     *
     * @ORM\PostLoad
     * @see Dashboard_Entity_Base_Plugin::performPostLoadCallback()
     * @return void.
     */
    public function postLoadCallback()
    {
        $this->performPostLoadCallback();
    }

    /**
     * Pre-Process the data prior to an insert operation.
     *
     * @ORM\PrePersist
     * @see Dashboard_Entity_Base_Plugin::performPrePersistCallback()
     * @return void.
     */
    public function prePersistCallback()
    {
        $this->performPrePersistCallback();
    }

    /**
     * Post-Process the data after an insert operation.
     *
     * @ORM\PostPersist
     * @see Dashboard_Entity_Base_Plugin::performPostPersistCallback()
     * @return void.
     */
    public function postPersistCallback()
    {
        $this->performPostPersistCallback();
    }

    /**
     * Pre-Process the data prior a delete operation.
     *
     * @ORM\PreRemove
     * @see Dashboard_Entity_Base_Plugin::performPreRemoveCallback()
     * @return void.
     */
    public function preRemoveCallback()
    {
        $this->performPreRemoveCallback();
    }

    /**
     * Post-Process the data after a delete.
     *
     * @ORM\PostRemove
     * @see Dashboard_Entity_Base_Plugin::performPostRemoveCallback()
     * @return void
     */
    public function postRemoveCallback()
    {
        $this->performPostRemoveCallback();
    }

    /**
     * Pre-Process the data prior to an update operation.
     *
     * @ORM\PreUpdate
     * @see Dashboard_Entity_Base_Plugin::performPreUpdateCallback()
     * @return void.
     */
    public function preUpdateCallback()
    {
        $this->performPreUpdateCallback();
    }

    /**
     * Post-Process the data after an update operation.
     *
     * @ORM\PostUpdate
     * @see Dashboard_Entity_Base_Plugin::performPostUpdateCallback()
     * @return void.
     */
    public function postUpdateCallback()
    {
        $this->performPostUpdateCallback();
    }

    /**
     * Pre-Process the data prior to a save operation.
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     * @see Dashboard_Entity_Base_Plugin::performPreSaveCallback()
     * @return void.
     */
    public function preSaveCallback()
    {
        $this->performPreSaveCallback();
    }

    /**
     * Post-Process the data after a save operation.
     *
     * @ORM\PostPersist
     * @ORM\PostUpdate
     * @see Dashboard_Entity_Base_Plugin::performPostSaveCallback()
     * @return void.
     */
    public function postSaveCallback()
    {
        $this->performPostSaveCallback();
    }

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
     * @return Dashboard_Entity_Validator_Plugins
     */
    public function get_validator()
    {
        return $this->_validator;
    }

    /**
     * Set _validator.
     *
     * @param Dashboard_Entity_Validator_Plugins $_validator.
     *
     * @return void
     */
    public function set_validator(Dashboard_Entity_Validator_Plugins $_validator = null)
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
    public function getboxsize()
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
    public function setboxsize($boxsize)
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
    public function getpluginfile()
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
    public function setpluginfile($pluginfile)
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
    
}
