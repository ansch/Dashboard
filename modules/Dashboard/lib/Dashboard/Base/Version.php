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

/**
 * Version information base class.
 */
class Dashboard_Base_Version extends Zikula_AbstractVersion
{
    public function getMetaData()
    {
        $meta = array();
        // the current module version
        $meta['version'] = '0.9.0';
        // the displayed name of the module
        $meta['displayname'] = $this->__('Dashboard');
        // the module description
        $meta['description'] = $this->__('Dashboard module generated by ModuleStudio 0.5.4.');
        //! url version of name, should be in lowercase without space
        $meta['url'] = $this->__('dashboard');
        // core requirement
        $meta['core_min'] = '1.3.1'; // requires minimum 1.3.1 or later
        $meta['core_max'] = '1.3.99'; // not ready for 1.4.0 yet

        // define special capabilities of this module
        $meta['capabilities'] = array(
            HookUtil::SUBSCRIBER_CAPABLE => array('enabled' => true) /*,
             HookUtil::PROVIDER_CAPABLE => array('enabled' => true), // TODO: see #15
             'authentication' => array('version' => '1.0'),
             'profile'        => array('version' => '1.0', 'anotherkey' => 'anothervalue'),
             'message'        => array('version' => '1.0', 'anotherkey' => 'anothervalue')
             */
        );

        // permission schema
        // DEBUG: permission schema aspect starts
        $meta['securityschema'] = array(
            'Dashboard::'        => '::',

            'Dashboard:Boxes:'   => 'BoxesID::',
            'Dashboard:Plugins:' => 'PluginsID::'
        );
        // DEBUG: permission schema aspect ends

        return $meta;
    }

    /**
     * Define hook subscriber bundles.
     */
    protected function setupHookBundles()
    {

        $bundle = new Zikula_HookManager_SubscriberBundle($this->name, 'subscriber.dashboard.ui_hooks.boxes', 'ui_hooks', __('dashboard Boxes Display Hooks'));
        // Display hook for view/display templates.
        $bundle->addEvent('display_view', 'dashboard.ui_hooks.boxes.display_view');
        // Display hook for create/edit forms.
        $bundle->addEvent('form_edit', 'dashboard.ui_hooks.boxes.form_edit');
        // Display hook for delete dialogues.
        $bundle->addEvent('form_delete', 'dashboard.ui_hooks.boxes.form_delete');
        // Validate input from an ui create/edit form.
        $bundle->addEvent('validate_edit', 'dashboard.ui_hooks.boxes.validate_edit');
        // Validate input from an ui create/edit form (generally not used).
        $bundle->addEvent('validate_delete', 'dashboard.ui_hooks.boxes.validate_delete');
        // Perform the final update actions for a ui create/edit form.
        $bundle->addEvent('process_edit', 'dashboard.ui_hooks.boxes.process_edit');
        // Perform the final delete actions for a ui form.
        $bundle->addEvent('process_delete', 'dashboard.ui_hooks.boxes.process_delete');
        $this->registerHookSubscriberBundle($bundle);

        $bundle = new Zikula_HookManager_SubscriberBundle($this->name, 'subscriber.dashboard.filter_hooks.boxes', 'filter_hooks', __('dashboard Boxes Filter Hooks'));
        // A filter applied to the given area.
        $bundle->addEvent('filter', 'dashboard.filter_hooks.boxes.filter');
        $this->registerHookSubscriberBundle($bundle);

        $bundle = new Zikula_HookManager_SubscriberBundle($this->name, 'subscriber.dashboard.ui_hooks.plugins', 'ui_hooks', __('dashboard Plugins Display Hooks'));
        // Display hook for view/display templates.
        $bundle->addEvent('display_view', 'dashboard.ui_hooks.plugins.display_view');
        // Display hook for create/edit forms.
        $bundle->addEvent('form_edit', 'dashboard.ui_hooks.plugins.form_edit');
        // Display hook for delete dialogues.
        $bundle->addEvent('form_delete', 'dashboard.ui_hooks.plugins.form_delete');
        // Validate input from an ui create/edit form.
        $bundle->addEvent('validate_edit', 'dashboard.ui_hooks.plugins.validate_edit');
        // Validate input from an ui create/edit form (generally not used).
        $bundle->addEvent('validate_delete', 'dashboard.ui_hooks.plugins.validate_delete');
        // Perform the final update actions for a ui create/edit form.
        $bundle->addEvent('process_edit', 'dashboard.ui_hooks.plugins.process_edit');
        // Perform the final delete actions for a ui form.
        $bundle->addEvent('process_delete', 'dashboard.ui_hooks.plugins.process_delete');
        $this->registerHookSubscriberBundle($bundle);

        $bundle = new Zikula_HookManager_SubscriberBundle($this->name, 'subscriber.dashboard.filter_hooks.plugins', 'filter_hooks', __('dashboard Plugins Filter Hooks'));
        // A filter applied to the given area.
        $bundle->addEvent('filter', 'dashboard.filter_hooks.plugins.filter');
        $this->registerHookSubscriberBundle($bundle);

    }
}

