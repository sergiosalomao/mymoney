<?php
require_once 'cfg.php';

#interfaces Controller
require_once PRESTO_PATH_CONTROLLER . "Interfaces/PRESTO_Tables_Interface.php";
require_once PRESTO_PATH_CONTROLLER . "Interfaces/PRESTO_Forms_Interface.php";
require_once PRESTO_PATH_CONTROLLER . "Interfaces/PRESTO_Forms_Controller.php";

#interfaces Components
require_once PRESTO_PATH_COMPONENTS . "Interfaces/PRESTO_Components_Interface.php";

#controllers
require_once PRESTO_PATH_CONTROLLER . "PRESTO_Request.php";
require_once PRESTO_PATH_CONTROLLER . "PRESTO_Controller.php";
require_once PRESTO_PATH_CONTROLLER . "PRESTO_Database.php";
require_once PRESTO_PATH_CONTROLLER . "PRESTO_Tables.php";
require_once PRESTO_PATH_CONTROLLER . "PRESTO_Layout.php";
require_once PRESTO_PATH_CONTROLLER . "PRESTO_Render.php";
require_once PRESTO_PATH_CONTROLLER . "PRESTO_View.php";
require_once PRESTO_PATH_CONTROLLER . "PRESTO_Forms.php";
require_once PRESTO_PATH_CONTROLLER . "PRESTO_Session.php";

#components
require_once PRESTO_PATH_COMPONENTS ."PRESTO_Components_Title.php";
require_once PRESTO_PATH_COMPONENTS ."PRESTO_Components_InputSearch.php";
require_once PRESTO_PATH_COMPONENTS ."PRESTO_Components_InputText.php";
require_once PRESTO_PATH_COMPONENTS ."PRESTO_Components_InputNumber.php";
require_once PRESTO_PATH_COMPONENTS ."PRESTO_Components_Pagination.php";
require_once PRESTO_PATH_COMPONENTS ."PRESTO_Components_Buttons.php";
require_once PRESTO_PATH_COMPONENTS ."PRESTO_Components_Select.php";

#services
require_once PRESTO_PATH_SERVICES . "RoutesService.php";
require_once PRESTO_PATH_SERVICES . "TranslateService.php";
require_once PRESTO_PATH_SERVICES . "SecurityService.php";
require_once PRESTO_PATH_SERVICES . "DateService.php";
require_once PRESTO_PATH_SERVICES . "NumberService.php";
