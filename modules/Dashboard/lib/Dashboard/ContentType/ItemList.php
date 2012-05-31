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
 * Generic item list content plugin implementation class
 */
class Dashboard_ContentType_ItemList extends Dashboard_ContentType_Base_ItemList
{
    // feel free to extend the content type here
}

function Dashboard_Api_ContentTypes_itemlist($args)
{
    return new Dashboard_Api_ContentTypes_itemListPlugin();
}