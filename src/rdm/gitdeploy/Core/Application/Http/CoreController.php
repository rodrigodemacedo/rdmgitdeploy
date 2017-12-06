<?php namespace RdM\GitDeploy\Core\Application\Http;
use RdM\GitDeploy\Core\Domain\MainConfigSystemInterface;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CoreController
 *
 * @author rodrigo
 */
class CoreController {
    
    /**
     *
     * @var MainConfigSystemInterface 
     */
    private $objMainConfigSystem;
    
    
    
    /**
     * Constructor
     * 
     * @param MainConfigSystemInterface $objMainConfigSystem
     */
    public function __construct(MainConfigSystemInterface $objMainConfigSystem) {
        $this->objMainConfigSystem($objMainConfigSystem);
    }
    
    //
    // PUBLIC INTERFACE
    //
    
    public function deploy(){
        $objCoreService = ServiceFactory::getCoreDeployService();
        $objDeploySystem = $objCoreService->discoverDeploySystem($this->objMainConfigSystem);
        $objOutputCollection = $objDeploySystem->deploy();
        
        return $this->getView()->viewOutputDeploy($objOutputCollection);
    }
    
    //
    // PRIVATE INTERFACE
    //
    
    
    
    //
    // GETTERS AND SETTERS
    //
    
    
}
