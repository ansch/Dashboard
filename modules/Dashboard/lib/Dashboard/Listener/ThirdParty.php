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
 * Event handler implementation class for special purposes and 3rd party api support.
 */
class Dashboard_Listener_ThirdParty
{
    /**
     * Listener for pending content items.
     */
    public static function pendingContentListener(Zikula_Event $event)
    {
        if (!SecurityUtil::checkPermission('Dashboard::', '::', ACCESS_MODERATE)) {
            return;
        }
        /** this is an example implementation from the Users module
         $approvalOrder = ModUtil::getVar('Users', 'moderation_order', UserUtil::APPROVAL_ANY);
         $filter = array('approved_by' => 0);
         if ($approvalOrder == UserUtil::APPROVAL_AFTER) {
         $filter['isverified'] = true;
         }
         $numPendingApproval = ModUtil::apiFunc('Users', 'registration', 'countAll', array('filter' => $filter));

         if (!empty($numPendingApproval)) {
         $collection = new Zikula_Collection_Container('Users');
         $collection->add(new Zikula_Provider_AggregateItem('registrations', __('Registrations pending approval'), $numPendingApproval, 'admin', 'viewRegistrations'));
         $event->getSubject()->add($collection);
         }
         */
    }

    /**
     * Listener for the `module.content.gettypes` event.
     *
     * This event occurs when the Content module is 'searching' for Content plugins.
     * The subject is an instance of Content_Types.
     */
    public static function contentGetTypes(Zikula_Event $event)
    {
        // intended is using the add() method to add a plugin like below
        $types = $event->getSubject();
        $types->add('Dashboard_ContentType_ItemList');
    }
}
