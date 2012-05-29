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
 * @version Generated by ModuleStudio 0.5.4 (http://modulestudio.de) at Thu May 03 12:43:34 CEST 2012.
 */

/**
 * This is the Admin api helper class.
 */
class Dashboard_Api_Base_Admin extends Zikula_AbstractApi
{
    /**
     * get available Admin panel links
     *
     * @return array Array of admin links
     */
    public function getlinks()
    {
        $links = array();

        if (SecurityUtil::checkPermission($this->name . '::', '::', ACCESS_READ)) {
            $links[] = array('url'   => ModUtil::url($this->name, 'user', 'main'),
                'text'  => $this->__('Frontend'),
                'title' => $this->__('Switch to user area.'),
                'class' => 'z-icon-es-home');
        }
        if (SecurityUtil::checkPermission($this->name . '::', '::', ACCESS_ADMIN)) {
            $links[] = array('url'   => ModUtil::url($this->name, 'admin', 'view', array('ot' => 'boxes')),
                'text'  => $this->__('Boxes'),
                'title' => $this->__('Boxes list'));
        }
        if (SecurityUtil::checkPermission($this->name . '::', '::', ACCESS_ADMIN)) {
            $links[] = array('url'   => ModUtil::url($this->name, 'admin', 'view', array('ot' => 'plugins')),
                'text'  => $this->__('Plugins'),
                'title' => $this->__('Plugins list'));
        }
        if (SecurityUtil::checkPermission($this->name . '::', '::', ACCESS_ADMIN)) {
            $links[] = array('url'   => ModUtil::url($this->name, 'admin', 'config'),
                'text'  => $this->__('Configuration'),
                'title' => $this->__('Manage settings for this application'));
        }
        return $links;
    }
}
