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
 * @version Generated by ModuleStudio 0.5.4 (http://modulestudio.de) at Sun Jun 03 13:55:33 CEST 2012.
 */
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;

use DoctrineExtensions\Paginate\Paginate;
/**
 * Repository class used to implement own convenience methods for performing certain DQL queries.
 *
 * This is the concrete repository class for plugin entities.
 */
class Dashboard_Entity_Repository_Plugin extends Dashboard_Entity_Repository_Base_Plugin
{
    /**
     * Select with a given where clause and Hydrate to Array.
     *
     * @param string  $where    The where clause to use when retrieving the collection (optional) (default='').
     * @param string  $orderBy  The order-by clause to use when retrieving the collection (optional) (default='').
     * @param boolean $useJoins Whether to include joining related objects (optional) (default=true).
     *
     * @return ArrayCollection collection containing retrieved Dashboard_Entity_Boxx instances
     */
    public function selectWhereToArray($where = '', $orderBy = '', $useJoins = true)
    {
        $query = $this->_intBaseQuery($where, $orderBy, $useJoins);

        return $query->getResult(Query::HYDRATE_ARRAY);
    }  
}