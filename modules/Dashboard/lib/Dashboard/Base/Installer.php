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
 * Installer base class
 */
class Dashboard_Base_Installer extends Zikula_AbstractInstaller
{
    /**
     * Install the Dashboard application.
     *
     * @return boolean True on success, or false.
     */
    public function install()
    {
        // create all tables from according entity definitions
        try {
            DoctrineHelper::createSchema($this->entityManager, $this->listEntityClasses());
        } catch (Exception $e) {
            if (System::isDevelopmentMode()) {
                LogUtil::registerError($this->__('Doctrine Exception: ') . $e->getMessage());
            }
            return LogUtil::registerError($this->__f('An error was encountered while creating the tables for the %s module.', array($this->getName())));
        }

        // set up all our vars with initial values
        $this->setVar('AllowCustomizing', 1);

        // create the default data for Dashboard
        $this->createDefaultData();

        // register persistent event handlers
        $this->registerPersistentEventHandlers();

        // register hook subscriber bundles
        HookUtil::registerSubscriberBundles($this->version->getHookSubscriberBundles());

        // initialisation successful
        return true;
    }

    /**
     * Upgrade the Dashboard application from an older version.
     *
     * If the upgrade fails at some point, it returns the last upgraded version.
     *
     * @param integer $oldversion Version to upgrade from.
     *
     * @return boolean True on success, false otherwise.
     */
    public function upgrade($oldversion)
    {
        /*
         // Upgrade dependent on old version number
         switch ($oldversion) {
         case 1.0.0:
         // do something
         // ...
         // update the database schema
         try {
         DoctrineHelper::updateSchema($this->entityManager, $this->listEntityClasses());
         } catch (Exception $e) {
         if (System::isDevelopmentMode()) {
         LogUtil::registerError($this->__('Doctrine Exception: ') . $e->getMessage());
         }
         return LogUtil::registerError($this->__f('An error was encountered while dropping the tables for the %s module.', array($this->getName())));
         }
         }
         */

        // update successful
        return true;
    }

    /**
     * Uninstall Dashboard.
     *
     * @return boolean True on success, false otherwise.
     */
    public function uninstall()
    {
        // delete stored object workflows
        $result = Zikula_Workflow_Util::deleteWorkflowsForModule($this->getName());
        if ($result === false) {
            return LogUtil::registerError($this->__f('An error was encountered while removing stored object workflows for the %s module.', array($this->getName())));
        }

        try {
            DoctrineHelper::dropSchema($this->entityManager, $this->listEntityClasses());
        } catch (Exception $e) {
            if (System::isDevelopmentMode()) {
                LogUtil::registerError($this->__('Doctrine Exception: ') . $e->getMessage());
            }
            return LogUtil::registerError($this->__f('An error was encountered while dropping the tables for the %s module.', array($this->getName())));
        }

        // unregister persistent event handlers
        EventUtil::unregisterPersistentModuleHandlers('Dashboard');

        // unregister hook subscriber bundles
        HookUtil::unregisterSubscriberBundles($this->version->getHookSubscriberBundles());

        // remove all module vars
        $this->delVars();

        // deletion successful
        return true;
    }

    /**
     * Build array with all entity classes for Dashboard.
     *
     * @return array list of class names.
     */
    protected function listEntityClasses()
    {
        $classNames = array();
        $classNames[] = 'Dashboard_Entity_Boxx';
        $classNames[] = 'Dashboard_Entity_Plugin';

        return $classNames;
    }
    /**
     * Create the default data for Dashboard.
     *
     * @return void
     */
    protected function createDefaultData()
    {
        // Ensure that tables are cleared
        $this->entityManager->transactional(function ($entityManager)
        {
            $entityManager->getRepository('Dashboard_Entity_Boxx')->truncateTable();
            $entityManager->getRepository('Dashboard_Entity_Plugin')->truncateTable();
        }
        );

        // Insertion successful
        return true;
    }

    /**
     * Register persistent event handlers.
     * These are listeners for external events of the core and other modules.
     */
    protected function registerPersistentEventHandlers()
    {
        // core
        EventUtil::registerPersistentModuleHandler('Dashboard', 'api.method_not_found', array('Dashboard_Listener_Core', 'apiMethodNotFound'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'core.preinit', array('Dashboard_Listener_Core', 'preInit'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'core.init', array('Dashboard_Listener_Core', 'init'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'core.postinit', array('Dashboard_Listener_Core', 'postInit'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'controller.method_not_found', array('Dashboard_Listener_Core', 'controllerMethodNotFound'));

        // installer
        EventUtil::registerPersistentModuleHandler('Dashboard', 'installer.module.installed', array('Dashboard_Listener_Installer', 'moduleInstalled'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'installer.module.upgraded', array('Dashboard_Listener_Installer', 'moduleUpgraded'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'installer.module.uninstalled', array('Dashboard_Listener_Installer', 'moduleUninstalled'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'installer.subscriberarea.uninstalled', array('Dashboard_Listener_Installer', 'subscriberAreaUninstalled'));

        // modules
        EventUtil::registerPersistentModuleHandler('Dashboard', 'module_dispatch.postloadgeneric', array('Dashboard_Listener_ModuleDispatch', 'postLoadGeneric'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'module_dispatch.preexecute', array('Dashboard_Listener_ModuleDispatch', 'preExecute'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'module_dispatch.postexecute', array('Dashboard_Listener_ModuleDispatch', 'postExecute'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'module_dispatch.custom_classname', array('Dashboard_Listener_ModuleDispatch', 'customClassname'));

        // mailer
        EventUtil::registerPersistentModuleHandler('Dashboard', 'module.mailer.api.sendmessage', array('Dashboard_Listener_Mailer', 'sendMessage'));

        // page
        EventUtil::registerPersistentModuleHandler('Dashboard', 'pageutil.addvar_filter', array('Dashboard_Listener_Page', 'pageutilAddvarFilter'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'system.outputfilter', array('Dashboard_Listener_Page', 'systemOutputfilter'));

        // errors
        EventUtil::registerPersistentModuleHandler('Dashboard', 'setup.errorreporting', array('Dashboard_Listener_Errors', 'setupErrorReporting'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'systemerror', array('Dashboard_Listener_Errors', 'systemError'));

        // theme
        EventUtil::registerPersistentModuleHandler('Dashboard', 'theme.preinit', array('Dashboard_Listener_Theme', 'preInit'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'theme.init', array('Dashboard_Listener_Theme', 'init'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'theme.load_config', array('Dashboard_Listener_Theme', 'loadConfig'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'theme.prefetch', array('Dashboard_Listener_Theme', 'preFetch'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'theme.postfetch', array('Dashboard_Listener_Theme', 'postFetch'));

        // view
        EventUtil::registerPersistentModuleHandler('Dashboard', 'view.init', array('Dashboard_Listener_View', 'init'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'view.postfetch', array('Dashboard_Listener_View', 'postFetch'));

        // user login
        EventUtil::registerPersistentModuleHandler('Dashboard', 'module.users.ui.login.started', array('Dashboard_Listener_UserLogin', 'started'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'module.users.ui.login.veto', array('Dashboard_Listener_UserLogin', 'veto'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'module.users.ui.login.succeeded', array('Dashboard_Listener_UserLogin', 'succeeded'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'module.users.ui.login.failed', array('Dashboard_Listener_UserLogin', 'failed'));

        // user logout
        EventUtil::registerPersistentModuleHandler('Dashboard', 'module.users.ui.logout.succeeded', array('Dashboard_Listener_UserLogout', 'succeeded'));

        // user
        EventUtil::registerPersistentModuleHandler('Dashboard', 'user.gettheme', array('Dashboard_Listener_User', 'getTheme'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'user.account.create', array('Dashboard_Listener_User', 'create'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'user.account.update', array('Dashboard_Listener_User', 'update'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'user.account.delete', array('Dashboard_Listener_User', 'delete'));

        // registration
        EventUtil::registerPersistentModuleHandler('Dashboard', 'module.users.ui.registration.started', array('Dashboard_Listener_UserRegistration', 'started'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'module.users.ui.registration.succeeded', array('Dashboard_Listener_UserRegistration', 'succeeded'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'module.users.ui.registration.failed', array('Dashboard_Listener_UserRegistration', 'failed'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'user.registration.create', array('Dashboard_Listener_UserRegistration', 'create'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'user.registration.update', array('Dashboard_Listener_UserRegistration', 'update'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'user.registration.delete', array('Dashboard_Listener_UserRegistration', 'delete'));

        // users module
        EventUtil::registerPersistentModuleHandler('Dashboard', 'module.users.config.updated', array('Dashboard_Listener_Users', 'configUpdated'));

        // group
        EventUtil::registerPersistentModuleHandler('Dashboard', 'group.create', array('Dashboard_Listener_Group', 'create'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'group.update', array('Dashboard_Listener_Group', 'update'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'group.delete', array('Dashboard_Listener_Group', 'delete'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'group.adduser', array('Dashboard_Listener_Group', 'addUser'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'group.removeuser', array('Dashboard_Listener_Group', 'removeUser'));

        // special purposes and 3rd party api support
        EventUtil::registerPersistentModuleHandler('Dashboard', 'get.pending_content', array('Dashboard_Listener_ThirdParty', 'pendingContentListener'));
        EventUtil::registerPersistentModuleHandler('Dashboard', 'module.content.gettypes', array('Dashboard_Listener_ThirdParty', 'contentGetTypes'));
    }
}
