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
 * This is the Account api helper class.
 */
class Dashboard_Api_Account extends Dashboard_Api_Base_Account
{
/**
 * Return an array of items to show in the your account panel
 *
 * @return   array   
 */
    function getall($args)
        {
            $items[] = array('url'     => ModUtil::url('Dashboard', 'user', 'main'),
                        'module'  => 'Dashboard',
                        'title'   => __('Configure your start page'),
                        'icon'    => 'Dashboard.png');

        // Return the items
        return $items; 
    }
}