<?php

#Controllers
require_once '../App/source/Controller/Controller.php';
require_once '../App/source/Controller/IndexController.php';
require_once '../App/source/Controller/EntidadesController.php';
require_once '../App/source/Controller/TraducoesController.php';
require_once '../App/source/Controller/IdiomasController.php';
require_once '../App/source/Controller/UsuariosController.php';
require_once '../App/source/Controller/CentroCustoController.php';
require_once '../App/source/Controller/BancosController.php';
require_once '../App/source/Controller/ContasController.php';
require_once '../App/source/Controller/FluxosController.php';
require_once '../App/source/Controller/LancamentosController.php';


#Repository
require_once '../App/source/Models/Repository/EntidadesTable.php';
require_once '../App/source/Models/Repository/TraducoesTable.php';
require_once '../App/source/Models/Repository/IdiomasTable.php';
require_once '../App/source/Models/Repository/UsuariosTable.php';
require_once '../App/source/Models/Repository/CentroCustoTable.php';
require_once '../App/source/Models/Repository/bancosTable.php';
require_once '../App/source/Models/Repository/contasTable.php';
require_once '../App/source/Models/Repository/FluxosTable.php';
require_once '../App/source/Models/Repository/LancamentosTable.php';

#Entity
require_once '../App/source/Models/Entity/Entidades.php';
require_once '../App/source/Models/Entity/Traducoes.php';
require_once '../App/source/Models/Entity/Idiomas.php';
require_once '../App/source/Models/Entity/Usuarios.php';
require_once '../App/source/Models/Entity/CentroCusto.php';
require_once '../App/source/Models/Entity/Bancos.php';
require_once '../App/source/Models/Entity/Contas.php';
require_once '../App/source/Models/Entity/Fluxos.php';
require_once '../App/source/Models/Entity/Lancamentos.php';

#Forms entidades
require_once '../App/source/Forms/entidades/Form_Entidades_Create.php';
require_once '../App/source/Forms/entidades/Form_Entidades_List.php';
require_once '../App/source/Forms/entidades/Form_Entidades_Edit.php';

#Forms traducoes
require_once '../App/source/Forms/traducoes/Form_Traducoes_Create.php';
require_once '../App/source/Forms/traducoes/Form_Traducoes_List.php';
require_once '../App/source/Forms/traducoes/Form_Traducoes_Edit.php';

#Forms idiomas
require_once '../App/source/Forms/idiomas/Form_Idiomas_Create.php';
require_once '../App/source/Forms/idiomas/Form_Idiomas_List.php';
require_once '../App/source/Forms/idiomas/Form_Idiomas_Edit.php';

#Forms usuarios
require_once '../App/source/Forms/Usuarios/Form_Usuarios_Create.php';
require_once '../App/source/Forms/Usuarios/Form_Usuarios_List.php';
require_once '../App/source/Forms/Usuarios/Form_Usuarios_Edit.php';
require_once '../App/source/Forms/Usuarios/Form_Usuarios_login.php';

#Forms centroCusto
require_once '../App/source/Forms/centrocusto/Form_CentroCusto_Create.php';
require_once '../App/source/Forms/centrocusto/Form_CentroCusto_List.php';
require_once '../App/source/Forms/centrocusto/Form_CentroCusto_Edit.php';

#Forms Bancos
require_once '../App/source/Forms/bancos/Form_Bancos_Create.php';
require_once '../App/source/Forms/bancos/Form_Bancos_List.php';
require_once '../App/source/Forms/bancos/Form_Bancos_Edit.php';

#Forms contas
require_once '../App/source/Forms/contas/Form_contas_Create.php';
require_once '../App/source/Forms/contas/Form_contas_List.php';
require_once '../App/source/Forms/contas/Form_contas_Edit.php';

#Forms fluxos
require_once '../App/source/Forms/fluxos/Form_fluxos_Create.php';
require_once '../App/source/Forms/fluxos/Form_fluxos_List.php';
require_once '../App/source/Forms/fluxos/Form_fluxos_Edit.php';


#Forms lancamentos
require_once '../App/source/Forms/lancamentos/Form_lancamentos_Create.php';
require_once '../App/source/Forms/lancamentos/Form_lancamentos_List.php';
require_once '../App/source/Forms/lancamentos/Form_lancamentos_Edit.php';
require_once '../App/source/Forms/lancamentos/Form_Lancamentos_Modal_Options.php';





