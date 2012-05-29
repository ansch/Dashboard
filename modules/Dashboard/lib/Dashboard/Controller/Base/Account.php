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
 * Account controller class.
 */
class Dashboard_Controller_Base_Account extends Zikula_AbstractController
{
    /**
     * Post initialise.
     *
     * Run after construction.
     *
     * @return void
     */
    protected function postInitialize()
    {
        // Set caching to true by default.
        $this->view->setCaching(Zikula_View::CACHE_ENABLED);
    }

    /**
     * This method is the default function, and is called whenever the application's
     * Account area is called without defining arguments.
     *
     * @return mixed Output.
     */
    public function main($args)
    {
        // DEBUG: permission check aspect starts
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Dashboard::', '::', ACCESS_OVERVIEW));
        // DEBUG: permission check aspect ends

    }
}
