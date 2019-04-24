<?php


return [

    #Index
    '/'         => RoutesService::create(indexController::class, 'indexAction'),
    '/index/'         => RoutesService::create(IndexController::class, 'indexAction'),

    #Entidade
    '/entidades/' => RoutesService::create(EntidadesController::class, 'indexAction'),
    '/entidades/create/' => RoutesService::create(EntidadesController::class, 'createAction'),
    '/entidades/save/' => RoutesService::create(EntidadesController::class, 'saveAction'),
    '/entidades/delete/' => RoutesService::create(EntidadesController::class, 'deleteAction'),
    '/entidades/edit/' => RoutesService::create(EntidadesController::class, 'editAction'),

    #traducoes
    '/traducoes/' => RoutesService::create(TraducoesController::class, 'indexAction'),
    '/traducoes/create/' => RoutesService::create(TraducoesController::class, 'createAction'),
    '/traducoes/save/' => RoutesService::create(TraducoesController::class, 'saveAction'),
    '/traducoes/delete/' => RoutesService::create(TraducoesController::class, 'deleteAction'),
    '/traducoes/edit/' => RoutesService::create(TraducoesController::class, 'editAction'),

    #Idiomas
    '/idiomas/' => RoutesService::create(IdiomasController::class, 'indexAction'),
    '/idiomas/create/' => RoutesService::create(IdiomasController::class, 'createAction'),
    '/idiomas/save/' => RoutesService::create(IdiomasController::class, 'saveAction'),
    '/idiomas/delete/' => RoutesService::create(IdiomasController::class, 'deleteAction'),
    '/idiomas/edit/' => RoutesService::create(IdiomasController::class, 'editAction'),

    #Usuarios
    '/usuarios/' => RoutesService::create(UsuariosController::class, 'loginAction'),
    '/usuarios/create/' => RoutesService::create(UsuariosController::class, 'createAction'),
    '/usuarios/save/' => RoutesService::create(UsuariosController::class, 'saveAction'),
    '/usuarios/delete/' => RoutesService::create(UsuariosController::class, 'deleteAction'),
    '/usuarios/edit/' => RoutesService::create(UsuariosController::class, 'editAction'),
    '/usuarios/login/' => RoutesService::create(UsuariosController::class, 'loginAction'),
    '/usuarios/auth/' => RoutesService::create(UsuariosController::class, 'authAction'),

    #CentroCusto
    '/centro-custo/' => RoutesService::create(CentroCustoController::class, 'indexAction'),
    '/centro-custo/create/' => RoutesService::create(CentroCustoController::class, 'createAction'),
    '/centro-custo/save/' => RoutesService::create(CentroCustoController::class, 'saveAction'),
    '/centro-custo/delete/' => RoutesService::create(CentroCustoController::class, 'deleteAction'),
    '/centro-custo/edit/' => RoutesService::create(CentroCustoController::class, 'editAction'),

    #Bancos
    '/bancos/' => RoutesService::create(BancosController::class, 'indexAction'),
    '/bancos/create/' => RoutesService::create(BancosController::class, 'createAction'),
    '/bancos/save/' => RoutesService::create(BancosController::class, 'saveAction'),
    '/bancos/delete/' => RoutesService::create(BancosController::class, 'deleteAction'),
    '/bancos/edit/' => RoutesService::create(BancosController::class, 'editAction'),

    #Contas
    '/contas/' => RoutesService::create(ContasController::class, 'indexAction'),
    '/contas/create/' => RoutesService::create(ContasController::class, 'createAction'),
    '/contas/save/' => RoutesService::create(ContasController::class, 'saveAction'),
    '/contas/delete/' => RoutesService::create(ContasController::class, 'deleteAction'),
    '/contas/edit/' => RoutesService::create(ContasController::class, 'editAction'),
    '/contas/relatorios/contas' => RoutesService::create(ContasController::class, 'relContasAction'),

    #Fluxos
    '/fluxos/' => RoutesService::create(FluxosController::class, 'indexAction'),
    '/fluxos/create/' => RoutesService::create(FluxosController::class, 'createAction'),
    '/fluxos/save/' => RoutesService::create(FluxosController::class, 'saveAction'),
    '/fluxos/delete/' => RoutesService::create(FluxosController::class, 'deleteAction'),
    '/fluxos/edit/' => RoutesService::create(FluxosController::class, 'editAction'),

    #Lancamentos
    '/lancamentos/' => RoutesService::create(LancamentosController::class, 'indexAction'),
    '/lancamentos/create/' => RoutesService::create(LancamentosController::class, 'createAction'),
    '/lancamentos/save/' => RoutesService::create(LancamentosController::class, 'saveAction'),
    '/lancamentos/delete/' => RoutesService::create(LancamentosController::class, 'deleteAction'),
    '/lancamentos/edit/' => RoutesService::create(LancamentosController::class, 'editAction'),



];