<?php
    define('PUBLIC_ROUTES',[
        'admin/user/login' => [
            'controller'    => 'Usuario',
            'action'        => 'login'
        ],
        'admin/user/login/validate' => [
            'controller'    => 'Usuario',
            'action'        => 'loginValidate'
        ],
        'admin/user/logout' => [
            'controller'    => 'Usuario',
            'action'        => 'logout'
        ],
    ]);

    define('ROUTERS',[
        'admin' => [
            'controller'    => 'Admin',
            'action'        => 'index'
        ],

        // acciones para las configuraciones generales
        'admin/json/general' => [
            'controller'    => 'General',
            'action'        => 'paginate'
        ],
        'admin/general' => [
            'controller'    => 'General',
            'action'        => 'index'
        ],
        'admin/general/form' => [
            'controller'    => 'General',
            'action'        => 'form'
        ],
        'admin/general/create' => [
            'controller'    => 'General',
            'action'        => 'create'
        ],
        'admin/general/update' => [
            'controller'    => 'General',
            'action'        => 'update'
        ],
        'admin/general/delete' => [
            'controller'    => 'General',
            'action'        => 'delete'
        ],

        // acciones con los sucursales
        'admin/json/sucursal' => [
            'controller'    => 'Sucursal',
            'action'        => 'paginate'
        ],
        'admin/sucursal' => [
            'controller'    => 'Sucursal',
            'action'        => 'index'
        ],
        'admin/sucursal/form' => [
            'controller'    => 'Sucursal',
            'action'        => 'form'
        ],
        'admin/sucursal/create' => [
            'controller'    => 'Sucursal',
            'action'        => 'create'
        ],
        'admin/sucursal/update' => [
            'controller'    => 'Sucursal',
            'action'        => 'update'
        ],
        'admin/sucursal/delete' => [
            'controller'    => 'Sucursal',
            'action'        => 'delete'
        ],

        // acciones con los empleados
        'admin/json/empleado' => [
            'controller'    => 'Empleado',
            'action'        => 'paginate'
        ],
        'admin/empleado' => [
            'controller'    => 'Empleado',
            'action'        => 'index'
        ],
        'admin/empleado/form' => [
            'controller'    => 'Empleado',
            'action'        => 'form'
        ],
        'admin/empleado/create' => [
            'controller'    => 'Empleado',
            'action'        => 'create'
        ],
        'admin/empleado/update' => [
            'controller'    => 'Empleado',
            'action'        => 'update'
        ],
        'admin/empleado/delete' => [
            'controller'    => 'Empleado',
            'action'        => 'delete'
        ],

        // acciones con los usuarios
        'admin/json/usuario' => [
            'controller'    => 'Usuario',
            'action'        => 'paginate'
        ],
        'admin/usuario' => [
            'controller'    => 'Usuario',
            'action'        => 'index'
        ],
        'admin/usuario/form' => [
            'controller'    => 'Usuario',
            'action'        => 'form'
        ],
        'admin/usuario/create' => [
            'controller'    => 'Usuario',
            'action'        => 'create'
        ],
        'admin/usuario/update' => [
            'controller'    => 'Usuario',
            'action'        => 'update'
        ],
        'admin/usuario/delete' => [
            'controller'    => 'Usuario',
            'action'        => 'delete'
        ],

        // acciones con los empleados
        'admin/json/tipodocumento' => [
            'controller'    => 'TipoDocumento',
            'action'        => 'paginate'
        ],
        'admin/tipodocumento' => [
            'controller'    => 'TipoDocumento',
            'action'        => 'index'
        ],
        'admin/tipodocumento/form' => [
            'controller'    => 'TipoDocumento',
            'action'        => 'form'
        ],
        'admin/tipodocumento/create' => [
            'controller'    => 'TipoDocumento',
            'action'        => 'create'
        ],
        'admin/tipodocumento/update' => [
            'controller'    => 'TipoDocumento',
            'action'        => 'update'
        ],
        'admin/tipodocumento/delete' => [
            'controller'    => 'TipoDocumento',
            'action'        => 'delete'
        ],













        // aciones con los articulos
        'admin/json/articulo' => [
            'controller'    => 'Articulo',
            'action'        => 'paginate'
        ],
        'admin/articulo' => [
            'controller'    => 'Articulo',
            'action'        => 'index'
        ],
        'admin/articulo/form' => [
            'controller'    => 'Articulo',
            'action'        => 'form'
        ],
        'admin/articulo/create' => [
            'controller'    => 'Articulo',
            'action'        => 'create'
        ],
        'admin/articulo/update' => [
            'controller'    => 'Articulo',
            'action'        => 'update'
        ],
        'admin/articulo/delete' => [
            'controller'    => 'Articulo',
            'action'        => 'delete'
        ],

        // acciones con las categorias
        'admin/json/categoria' => [
            'controller'    => 'Categoria',
            'action'        => 'paginate'
        ],

        'admin/categoria' => [
            'controller'    => 'Categoria',
            'action'        => 'index'
        ],
        'admin/categoria/form' => [
            'controller'    => 'Categoria',
            'action'        => 'form'
        ],
        'admin/categoria/create' => [
            'controller'    => 'Categoria',
            'action'        => 'create'
        ],
        'admin/categoria/update' => [
            'controller'    => 'Categoria',
            'action'        => 'update'
        ],
        'admin/categoria/delete' => [
            'controller'    => 'Categoria',
            'action'        => 'delete'
        ],
        
        // aciones con las unidades de medidas
        'admin/json/unidadmedida' => [
            'controller'    => 'UnidadMedida',
            'action'        => 'paginate'
        ],
        'admin/unidadmedida' => [
            'controller'    => 'UnidadMedida',
            'action'        => 'index'
        ],
        'admin/unidadmedida/form' => [
            'controller'    => 'UnidadMedida',
            'action'        => 'form'
        ],
        'admin/unidadmedida/create' => [
            'controller'    => 'UnidadMedida',
            'action'        => 'create'
        ],
        'admin/unidadmedida/update' => [
            'controller'    => 'UnidadMedida',
            'action'        => 'update'
        ],
        'admin/unidadmedida/delete' => [
            'controller'    => 'UnidadMedida',
            'action'        => 'delete'
        ],








         // aciones con las ingresos
         'admin/json/ingreso' => [
            'controller'    => 'Ingreso',
            'action'        => 'paginate'
        ],
        'admin/ingreso' => [
            'controller'    => 'Ingreso',
            'action'        => 'index'
        ],
        'admin/ingreso/form' => [
            'controller'    => 'Ingreso',
            'action'        => 'form'
        ],
        'admin/ingreso/create' => [
            'controller'    => 'Ingreso',
            'action'        => 'create'
        ],
        'admin/ingreso/update' => [
            'controller'    => 'Ingreso',
            'action'        => 'update'
        ],
        'admin/ingreso/delete' => [
            'controller'    => 'Ingreso',
            'action'        => 'delete'
        ],

         // aciones con las proveedores
         'admin/json/proveedor' => [
            'controller'    => 'Proveedor',
            'action'        => 'paginate'
        ],
        'admin/proveedor' => [
            'controller'    => 'Proveedor',
            'action'        => 'index'
        ],
        'admin/proveedor/form' => [
            'controller'    => 'Proveedor',
            'action'        => 'form'
        ],
        'admin/proveedor/create' => [
            'controller'    => 'Proveedor',
            'action'        => 'create'
        ],
        'admin/proveedor/update' => [
            'controller'    => 'Proveedor',
            'action'        => 'update'
        ],
        'admin/proveedor/delete' => [
            'controller'    => 'Proveedor',
            'action'        => 'delete'
        ],












        // aciones con las ventas
        'admin/json/venta' => [
            'controller'    => 'Venta',
            'action'        => 'paginate'
        ],
        'admin/venta' => [
            'controller'    => 'Venta',
            'action'        => 'index'
        ],
        'admin/venta/form' => [
            'controller'    => 'Venta',
            'action'        => 'form'
        ],
        'admin/venta/create' => [
            'controller'    => 'Venta',
            'action'        => 'create'
        ],
        'admin/venta/update' => [
            'controller'    => 'Venta',
            'action'        => 'update'
        ],
        'admin/venta/delete' => [
            'controller'    => 'Venta',
            'action'        => 'delete'
        ],

        // aciones con las pedidos
        'admin/json/pedido' => [
            'controller'    => 'Pedido',
            'action'        => 'paginate'
        ],
        'admin/pedido' => [
            'controller'    => 'Pedido',
            'action'        => 'index'
        ],
        'admin/pedido/form' => [
            'controller'    => 'Pedido',
            'action'        => 'form'
        ],
        'admin/pedido/create' => [
            'controller'    => 'Pedido',
            'action'        => 'create'
        ],
        'admin/pedido/update' => [
            'controller'    => 'Pedido',
            'action'        => 'update'
        ],
        'admin/pedido/delete' => [
            'controller'    => 'Pedido',
            'action'        => 'delete'
        ],

        // aciones con las clientes
        'admin/json/cliente' => [
            'controller'    => 'Cliente',
            'action'        => 'paginate'
        ],
        'admin/cliente' => [
            'controller'    => 'Cliente',
            'action'        => 'index'
        ],
        'admin/cliente/form' => [
            'controller'    => 'Cliente',
            'action'        => 'form'
        ],
        'admin/cliente/create' => [
            'controller'    => 'Cliente',
            'action'        => 'create'
        ],
        'admin/cliente/update' => [
            'controller'    => 'Cliente',
            'action'        => 'update'
        ],
        'admin/cliente/delete' => [
            'controller'    => 'Cliente',
            'action'        => 'delete'
        ],

        // aciones con las tipo creditos
        'admin/json/credito' => [
            'controller'    => 'Credito',
            'action'        => 'paginate'
        ],
        'admin/credito' => [
            'controller'    => 'Credito',
            'action'        => 'index'
        ],
        'admin/credito/form' => [
            'controller'    => 'Credito',
            'action'        => 'form'
        ],
        'admin/credito/create' => [
            'controller'    => 'Credito',
            'action'        => 'create'
        ],
        'admin/credito/update' => [
            'controller'    => 'Credito',
            'action'        => 'update'
        ],
        'admin/credito/delete' => [
            'controller'    => 'Credito',
            'action'        => 'delete'
        ],
        // aciones con las tipo deudapendientes
        'admin/json/deudapendiente' => [
            'controller'    => 'DeudaPendiente',
            'action'        => 'paginate'
        ],
        'admin/deudapendiente' => [
            'controller'    => 'DeudaPendiente',
            'action'        => 'index'
        ],
        'admin/deudapendiente/form' => [
            'controller'    => 'DeudaPendiente',
            'action'        => 'form'
        ],
        'admin/deudapendiente/create' => [
            'controller'    => 'DeudaPendiente',
            'action'        => 'create'
        ],
        'admin/deudapendiente/update' => [
            'controller'    => 'DeudaPendiente',
            'action'        => 'update'
        ],
        'admin/deudapendiente/delete' => [
            'controller'    => 'DeudaPendiente',
            'action'        => 'delete'
        ],

    ]);