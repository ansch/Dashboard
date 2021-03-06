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

/**
 * Validator class for encapsulating entity validation methods.
 *
 * This is the base validation class for boxx entities.
 */
class Dashboard_Entity_Validator_Base_Boxx extends Dashboard_Validator
{

    /**
     * Performs all validation rules.
     *
     * @return mixed either array with error information or true on success
     */
    public function validateAll()
    {
        $errorInfo = array('message' => '', 'code' => 0, 'debugArray' => array());
        $dom = ZLanguage::getModuleDomain('Dashboard');
        if (!$this->isValidInteger('id')) {
            $errorInfo['message'] = __f('Error! Field value may only contain digits (%s).', array('id'), $dom);
            return $errorInfo;
        }
        if (!$this->isNumberNotLongerThan('id', 9)) {
            $errorInfo['message'] = __f('Error! Length of field value must not be higher than %2$s (%1$s).', array('id', 9), $dom);
            return $errorInfo;
        }
        if (!$this->isValidInteger('userid')) {
            $errorInfo['message'] = __f('Error! Field value may only contain digits (%s).', array('userid'), $dom);
            return $errorInfo;
        }
        if (!$this->isNumberNotEmpty('userid')) {
            $errorInfo['message'] = __f('Error! Field value must not be 0 (%s).', array('userid'), $dom);
            return $errorInfo;
        }
        if (!$this->isNumberNotLongerThan('userid', 11)) {
            $errorInfo['message'] = __f('Error! Length of field value must not be higher than %2$s (%1$s).', array('userid', 11), $dom);
            return $errorInfo;
        }
        if (!$this->isValidInteger('boxorder')) {
            $errorInfo['message'] = __f('Error! Field value may only contain digits (%s).', array('boxorder'), $dom);
            return $errorInfo;
        }
        if (!$this->isNumberNotLongerThan('boxorder', 11)) {
            $errorInfo['message'] = __f('Error! Length of field value must not be higher than %2$s (%1$s).', array('boxorder', 11), $dom);
            return $errorInfo;
        }
        if (!$this->isValidInteger('block')) {
            $errorInfo['message'] = __f('Error! Field value may only contain digits (%s).', array('block'), $dom);
            return $errorInfo;
        }
//        if (!$this->isNumberNotEmpty('block')) {
//            $errorInfo['message'] = __f('Error! Field value must not be 0 (%s).', array('block'), $dom);
//            return $errorInfo;
//        }
        if (!$this->isNumberNotLongerThan('block', 11)) {
            $errorInfo['message'] = __f('Error! Length of field value must not be higher than %2$s (%1$s).', array('block', 11), $dom);
            return $errorInfo;
        }
        if (!$this->isStringNotLongerThan('plugin', 125)) {
            $errorInfo['message'] = __f('Error! Length of field value must not be higher than %2$s (%1$s).', array('plugin', 125), $dom);
            return $errorInfo;
        }
        if (!$this->isStringNotEmpty('plugin')) {
            $errorInfo['message'] = __f('Error! Field value must not be empty (%s).', array('plugin'), $dom);
            return $errorInfo;
        }
        if (!$this->isValidInteger('page')) {
            $errorInfo['message'] = __f('Error! Field value may only contain digits (%s).', array('page'), $dom);
            return $errorInfo;
        }
        if (!$this->isNumberNotEmpty('page')) {
            $errorInfo['message'] = __f('Error! Field value must not be 0 (%s).', array('page'), $dom);
            return $errorInfo;
        }
        if (!$this->isNumberNotLongerThan('page', 11)) {
            $errorInfo['message'] = __f('Error! Length of field value must not be higher than %2$s (%1$s).', array('page', 11), $dom);
            return $errorInfo;
        }
        if (!$this->isStringNotLongerThan('boxdata', 2000)) {
            $errorInfo['message'] = __f('Error! Length of field value must not be higher than %2$s (%1$s).', array('boxdata', 2000), $dom);
            return $errorInfo;
        }
        return true;
    }

    /**
     * Check for unique values.
     *
     * This method determines if there already exist boxes with the same boxx.
     *
     * @param string $fieldName The name of the property to be checked
     * @return boolean result of this check, true if the given boxx does not already exist
     */
    public function isUniqueValue($fieldName)
    {
        if (empty($this->entity[$fieldName])) {
            return false;
        }

        $serviceManager = ServiceUtil::getManager();
        $entityManager = $serviceManager->getService('doctrine.entitymanager');
        $repository = $entityManager->getRepository('Dashboard_Entity_Boxx');

        $excludeid = $this->entity['id'];
        return $repository->detectUniqueState($fieldName, $this->entity[$fieldName], $excludeid);
    }

    /**
     * Get entity.
     *
     * @return Zikula_EntityAccess
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * Set entity.
     *
     * @param Zikula_EntityAccess $entity.
     *
     * @return void
     */
    public function setEntity(Zikula_EntityAccess $entity = null)
    {
        $this->entity = $entity;
    }

}
