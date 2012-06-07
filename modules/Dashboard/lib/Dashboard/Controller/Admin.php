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
 * This is the Admin controller class providing navigation and interaction functionality.
 */
class Dashboard_Controller_Admin extends Dashboard_Controller_Base_Admin
{
    
        /**
     * @desc    This method updates the list aof available plugins. It is used in admin/pluginConfig.tpl
     *          and calls api->admin->pluginsReload.
     *
     * @return redirect to Dashboard->admin->pluginConfig.
     */    
    public function pluginsReload($args)
        {
        // DEBUG: permission check aspect starts
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Dashboard::', '::', ACCESS_ADMIN));
        // DEBUG: permission check aspect ends

        // parameter specifying which type of objects we are treating
        $objectType = (isset($args['ot']) && !empty($args['ot'])) ? $args['ot'] : $this->request->getGet()->filter('ot', 'plugin', FILTER_SANITIZE_STRING);
        $utilArgs = array('controller' => 'admin', 'action' => 'pluginsReload');
        if (!in_array($objectType, Dashboard_Util_Controller::getObjectTypes('controllerAction', $utilArgs))) {
            $objectType = Dashboard_Util_Controller::getDefaultObjectType('controllerAction', $utilArgs);
        }
        /** TODO: custom logic */    
        $plugins = ModUtil::apiFunc('Dashboard', 'admin', 'pluginsReload');
        if ($plugins !== false) { 
            LogUtil::registerStatus(__("Plugins successfully reloaded."));	
        } else {
            LogUtil::registerError(__("Plugins reloading failed!"));
        }
        SessionUtil::setVar('Dashboard_Plugins', $plugins);
        SessionUtil::setVar('Dashboard_Preloaded', true);
        
        return System::redirect(ModUtil::url('Dashboard', 'admin', 'pluginConfig')); 
    }
    
        /**
     * @desc    Renders the pluginConfig-Part of the Admin-Section.
     *
     * @return admin/pluginConfig.tpl.
     */    
    public function pluginConfig($args)
        {
// DEBUG: permission check aspect starts
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Dashboard::', '::', ACCESS_ADMIN));
// DEBUG: permission check aspect ends

        // parameter specifying which type of objects we are treating
        $objectType = (isset($args['ot']) && !empty($args['ot'])) ? $args['ot'] : $this->request->getGet()->filter('ot', 'plugin', FILTER_SANITIZE_STRING);
        $utilArgs = array('controller' => 'admin', 'action' => 'pluginConfig');
        if (!in_array($objectType, Dashboard_Util_Controller::getObjectTypes('controllerAction', $utilArgs))) {
            $objectType = Dashboard_Util_Controller::getDefaultObjectType('controllerAction', $utilArgs);
        }

        ModUtil::dbInfoLoad('Dashboard');
        
        /** TODO: custom logic */
        $plugins = SessionUtil::getVar('Dashboard_Plugins');
        $preloaded = SessionUtil::getVar('Dashboard_Preloaded');

        SessionUtil::delVar('Dashboard_Plugins');
        SessionUtil::delVar('Dashboard_Preloaded');
	// get the Settings
	$settings = ModUtil::getVar('Dashboard');
	if (!($preloaded === true)) {
                $plugins = Doctrine_Core::getTable('Dashboard_Model_Plugin')->findAll()->toArray();
                //foreach ($plugins as $key=>&$plugin) {
                //            $plugin[status] = '';                    
                //}         
        }

        // Assign to template
        $this->view->assign('settings', $settings);
        $this->view->assign('plugins', $plugins);  

	// Return output
        return $this->view->fetch('admin/pluginConfig.tpl');
    }
    
        /**
     * @desc    Renders the defaultConfig-Part of the Admin-Section.
     *
     * @return admin/defaultConfig.tpl.
     */     
    public function defaultConfig($args)
        {          
        // DEBUG: permission check aspect starts
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Dashboard::', '::', ACCESS_ADMIN));
        // DEBUG: permission check aspect ends

        // parameter specifying which type of objects we are treating
        $objectType = (isset($args['ot']) && !empty($args['ot'])) ? $args['ot'] : $this->request->getGet()->filter('ot', 'plugin', FILTER_SANITIZE_STRING);
        $utilArgs = array('controller' => 'admin', 'action' => 'defaultConfig');
        if (!in_array($objectType, Dashboard_Util_Controller::getObjectTypes('controllerAction', $utilArgs))) {
            $objectType = Dashboard_Util_Controller::getDefaultObjectType('controllerAction', $utilArgs);
        }
        /** TODO: custom logic */
        //$plugins    = ModUtil::apiFunc('Dashboard', 'selection', 'getEntities', array('ot' => 'plugin'));
        // get the Settings            
        $settings = ModUtil::getVar('Dashboard');
        $plugins = ModUtil::apiFunc('Dashboard','user','getOpenPlugins', array ('userid'=>-1));
//        $objectType = 'plugin';
//        $entityClass = 'Dashboard_Entity_' . ucfirst($objectType);
//        $repository = $this->entityManager->getRepository($entityClass);      
//        $where = 'tbl.active = 1';
//        $orderby = '';
//        $plugins = $repository->selectWhere($where,$orderby);
        $boxes = ModUtil::apiFunc('Dashboard','user','getBoxes',array('block'=>0,'userid'=>-1));        
        //$plugins 	= ModUtil::apiFunc('Dashboard','user','filterPlugins',array ('boxes' => $boxes, 'plugin' => $plugins));        

	for ($i=0; $i < count($boxes); $i++) {
	  	$result = ModUtil::apiFunc('Dashboard','user','getBoxCode',array('box'=>$boxes[$i],
                                                                                    'allowEdit' => true,
                                                                                    'admin'	 => true));
		$boxes[$i]['boxcode'] = $result;
	}        

        // assign it to the Form
        $this->view->assign('settings', $settings);
        $this->view->assign('boxes', $boxes);
        $this->view->assign('plugins', $plugins); 
           
        // fetch, process and display template
        return $this->view->fetch('admin/defaultConfig.tpl');
    }

    /**
     * This method is unused a.t.m.
     */
    public function delete($args)
        {
        // DEBUG: permission check aspect starts
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Dashboard::', '::', ACCESS_ADMIN));
        // DEBUG: permission check aspect ends

        // parameter specifying which type of objects we are treating
        $objectType = (isset($args['ot']) && !empty($args['ot'])) ? $args['ot'] : $this->request->getGet()->filter('ot', 'boxx', FILTER_SANITIZE_STRING);
        $utilArgs = array('controller' => 'admin', 'action' => 'delete');
        if (!in_array($objectType, Dashboard_Util_Controller::getObjectTypes('controllerAction', $utilArgs))) {
            $objectType = Dashboard_Util_Controller::getDefaultObjectType('controllerAction', $utilArgs);
        }
        
  	$args['box'] 	= (string) FormUtil::getPassedValue('box');
  	$args['id']  	= (isset ($args['id'])) ? $args['id'] : (int) FormUtil::getPassedValue('id');
  	$args['userid'] = (int) FormUtil::getPassedValue('userid',0);
	if ($args['userid'] <> -1) {
		$args['userid'] = UserUtil::getVar('uid');
	}
        $args['returnfunc'] 	= (isset ($args['returnfunc'])) ? $args['returnfunc'] : (string) FormUtil::getPassedValue('returnfunc');            
        $idFields = array('id');
        // retrieve identifier of the object we wish to delete
        $idValues = Dashboard_Util_Controller::retrieveIdentifier($this->request, $args, $objectType, $idFields);
        $hasIdentifier = Dashboard_Util_Controller::isValidIdentifier($idValues);

        $this->throwNotFoundUnless($hasIdentifier, $this->__('Error! Invalid identifier received.'));

        $entity = ModUtil::apiFunc($this->name, 'selection', 'getEntity', array('ot' => $objectType, 'id' => $idValues));
        $this->throwNotFoundUnless($entity != null, $this->__('No such item.'));
        //todo: (testweiae auch mal rausnehmen
        $args['confirmation'] = true;
        $confirmation = (bool)(isset($args['confirmation']) && !empty($args['confirmation'])) ? $args['confirmation'] : $this->request->getPost()->filter('confirmation', false, FILTER_VALIDATE_BOOLEAN);

        if ($confirmation) {
            //todo:
            //$this->checkCsrfToken();

            // TODO call pre delete validation hooks
            $this->entityManager->remove($entity);
            $this->entityManager->flush();
            $this->registerStatus($this->__('Done! Item deleted.'));
            // TODO call post delete process hooks

            // clear view cache to reflect our changes
            $this->view->clear_cache();

            // redirect to the list of the current object type
            if ($args['returnfunc']) {
            $this->redirect(ModUtil::url($this->name, 'admin', $args['returnfunc'],
                array('ot' => $objectType)));
            } else {
                return System::redirect(System::getBaseUrl());  
            }
        }

        $repository = $this->entityManager->getRepository('Dashboard_Entity_' . ucfirst($objectType));

        // assign the object we loaded above
        $this->view->assign($objectType, $entity)
            ->assign($repository->getAdditionalTemplateParameters('controllerAction', $utilArgs));

        // fetch and return the appropriate template
        return Dashboard_Util_View::processTemplate($this->view, 'admin', $objectType, 'defaultConfig', $args);
    }
    
        /**
     * @desc    De-/Activates a plugin.
     *
     * @param int $args ['id'] T%he ID of the plugin to update.
     * @param int $args ['state'] The state we wish to change the plugin to.
     *
     * @return redirects to dashboard->admin->pluginConfig.
     */
    public function changePluginsState($args)
        {
            // DEBUG: permission check aspect starts
            $this->throwForbiddenUnless(SecurityUtil::checkPermission('Dashboard::', '::', ACCESS_ADMIN));
            // DEBUG: permission check aspect ends

            // parameter specifying which type of objects we are treating
            $objectType = (isset($args['ot']) && !empty($args['ot'])) ? $args['ot'] : $this->request->getGet()->filter('ot', 'plugin', FILTER_SANITIZE_STRING);
            $utilArgs = array('controller' => 'admin', 'action' => 'changePluginsState');
            if (!in_array($objectType, Dashboard_Util_Controller::getObjectTypes('controllerAction', $utilArgs))) {
               $objectType = Dashboard_Util_Controller::getDefaultObjectType('controllerAction', $utilArgs);
            }
            /** TODO: custom logic */
            $id = (int) FormUtil::getPassedValue('id', null, 'GET');
            $state = (int) FormUtil::getPassedValue('state', null, 'GET');
            if (!is_numeric($id)) {
                return LogUtil::registerArgsError(ModUtil::url('Dashboard', 'admin', 'pluginConfig'));
            }
            if (!is_numeric($state)) {
                return LogUtil::registerArgsError(ModUtil::url('Dashboard', 'admin', 'pluginConfig'));
            }
            $obj = array('id'       => $id,
                         'active'   => $state);
            $plugin = Doctrine_Core::getTable('Dashboard_Model_Plugin')->find($obj[id]);
            $plugin->active = $obj[active];
            $plugin->save();

            if ($plugin['active'] == $state) { 
                if ($state == 1) {
                        LogUtil::registerStatus(__("Plugin successfully activated."));
                } else {
                        LogUtil::registerStatus(__("Plugin successfully deactivated."));
                }
            } else {
                if ($state == 1) {
                        LogUtil::registerError(__("Plugins activation failed!"));
                } else {
                        LogUtil::registerError(__("Plugins deactivation failed!"));
                }    	
            }
            return System::redirect(ModUtil::url('Dashboard', 'admin', 'pluginConfig'));     
    }  
    
        /**
     * @desc    The main admin-method. Just redirects to commonSettings
     *
     */    
    public function main()
        {
            return $this->commonSettings();
    }
    
        /**
     * @desc    Renders the commonSettings-Part of the Admin-Section.
     *
     * @return admin/commonSettings.tpl.
     */        
    public function commonSettings()
        {
        // DEBUG: permission check aspect starts
        $this->throwForbiddenUnless(SecurityUtil::checkPermission($this->name . '::', '::', ACCESS_ADMIN));
        // DEBUG: permission check aspect ends
        
        // Create new Form reference
        $view = FormUtil::newForm($this->name, $this);
        
        // Execute form using supplied template and page event handler
        return $view->execute('admin/commonSettings.tpl', new Dashboard_Form_Handler_Admin_Config());        

        // parameter specifying which type of objects we are treating
        //$objectType = (isset($args['ot']) && !empty($args['ot'])) ? $args['ot'] : $this->request->getGet()->filter('ot', 'boxx', FILTER_SANITIZE_STRING);
        //$utilArgs = array('controller' => 'admin', 'action' => 'commonSettings');
        //if (!in_array($objectType, Dashboard_Util_Controller::getObjectTypes('controllerAction', $utilArgs))) {
//            $objectType = Dashboard_Util_Controller::getDefaultObjectType('controllerAction', $utilArgs);
//        }
        /** TODO: custom logic */

        // return template
//        return $this->view->fetch('admin/commonSettings.tpl');
        
        // start a new pnRender display instance
           // $render = & pnRender::getInstance('UserDashBoard',false);

            // get the Settings
            //$settings = pnModGetVar('UserDashBoard');

            // assign it to the Form
            //$render->assign('settings', $settings);

            // fetch, process and display template
            //return $render->fetch('UserDashBoard_admin_CommonSettings.htm');
    }
    
        /**
     * @desc    Update the common settings of Dashboard which are stored as ModVars.
     *
     * @param array $settings The settings-Array passed by admin/commonSettings.tpl via update-Button.
     *
     * @return redirects to Dashboard->admin->main.
     */
    public function updateCommonSettings($args)
        {
        // security check
        if (!SecurityUtil::checkPermission('Dashboard::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // get settings from form - do before authid check
        $settings = FormUtil::getPassedValue('settings', null, 'POST');

        // if this form wasnt posted to redirect back
        if ($settings === NULL) {
            return System::redirect(ModUtil::url('Dashboard', 'admin', 'main'));
        }

        // confirm the forms auth key
        if (!SecurityUtil::confirmAuthKey()) {
            return LogUtil::registerAuthidError();
        }	

        // Write the vars
        $configvars = ModUtil::getVar('Dashboard');
        foreach($settings as $key => $value) {
            $oldvalue = ModUtil::getVar('Dashboard',$key);
            if ($value != $oldvalue) {
                ModUtil::setVar('Dashboard',$key, $value);
            }
        }    

        return System::redirect(ModUtil::url('Dashboard', 'admin', 'main'));    
    } 

    /**
     * @desc    This method adds a new user-box and is triggered at admin/defaultConfig.tpl.
     * 
     * @param int     $args['box']     Name of the Box.
     * @param int     $args['block']   unused so far.
     * @param int     $args['page']    unused so far.
     * @param int     $args['userid']  Identifier of the user, -1 = defaultConfig in this case.
     * @param int     $args['boxorder']   Postion of the new box, set to 0 by default 
     * @return boolean.
     */    
    public function addBox($args)
        {
        // DEBUG: permission check aspect starts
        $this->throwForbiddenUnless(SecurityUtil::checkPermission('Dashboard::', '::', ACCESS_ADMIN));
        // DEBUG: permission check aspect ends

        // parameter specifying which type of objects we are treating
        $objectType = (isset($args['ot']) && !empty($args['ot'])) ? $args['ot'] : $this->request->getGet()->filter('ot', 'boxx', FILTER_SANITIZE_STRING);
        $utilArgs = array('controller' => 'admin', 'action' => 'addBox');
        if (!in_array($objectType, Dashboard_Util_Controller::getObjectTypes('controllerAction', $utilArgs))) {
            $objectType = Dashboard_Util_Controller::getDefaultObjectType('controllerAction', $utilArgs);
        }
        /** TODO: custom logic */
        // Get Parameter
        $box 	= FormUtil::getPassedValue('box');
        $block 	= FormUtil::getPassedValue('block',0);
        $page 	= FormUtil::getPassedValue('page',1);
        $boxorder 	= (int)FormUtil::getPassedValue('boxorder');
        if (!isset($box) || ($box == '')) {
            return System::redirect(ModUtil::url('Dashboard','admin','defaultConfig'));
        }
        $userid = -1;
        // Add new box
        $result = ModUtil::apiFunc('Dashboard','user','addBox',array('userid' => $userid, 
                                                                    'box' 	=> $box, 
                                                                    'boxorder'=> $boxorder,
                                                                    'block' 	=> $block,
                                                                    'page' 	=> $page));
        if (!$result) {
                LogUtil::registerError(__('Add Error occurrred!'));
        } else {
                LogUtil::registerStatus(__('Box was added.'));
        }        
        // Clean order values
        ModUtil::apiFunc('Dashboard','user','cleanOrder',array('userid' => $userid,
                                                                'block' => $block,
                                                                'page' 	=> $page));
        // Redirect to main page
        return System::redirect(ModUtil::url('Dashboard','admin','defaultConfig'));        
     
    } 

    /**
     * @desc    Unused a.t.m.
     * 
     * @param 
     * 
     * @return 
     */ 
    public function updateTables ()
        {
            if (DBUtil::createTable('userdashboard_plugins')) {
                    prayer("Table userdashboard_plugins angelegt");
            } else {
                    prayer("Table userdashboard_plugins anlegen fehlgeschlagen");
            }
    }

    /**
     * @desc set caching to false for all admin functions
     * @return      null
     */
    public function postInitialize()
        {
        $this->view->setCaching(false);
    }    
}