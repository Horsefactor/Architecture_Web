<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'home', '_controller' => 'App\\Controller\\ProjectController::index'], null, null, null, false, false, null]],
        '/main/account' => [[['_route' => 'account', '_controller' => 'App\\Controller\\ProjectController::account'], null, null, null, false, false, null]],
        '/main/Annonce' => [[['_route' => 'Annonce', '_controller' => 'App\\Controller\\ProjectController::Annonce'], null, null, null, false, false, null]],
        '/main/my_posts' => [[['_route' => 'my_posts', '_controller' => 'App\\Controller\\ProjectController::show_my_posts'], null, null, null, false, false, null]],
        '/main/Search' => [[['_route' => 'search_posts', '_controller' => 'App\\Controller\\ProjectController::showSearch'], null, null, null, false, false, null]],
        '/main/delete_account' => [[['_route' => 'delete_account', '_controller' => 'App\\Controller\\ProjectController::delete_account'], null, null, null, false, false, null]],
        '/main/newCategory' => [[['_route' => 'new_category', '_controller' => 'App\\Controller\\ProjectController::newCat'], null, null, null, false, false, null]],
        '/main/newPost' => [[['_route' => 'new_post', '_controller' => 'App\\Controller\\ProjectController::newPost'], null, null, null, false, false, null]],
        '/handleSearch' => [[['_route' => 'handleSearch', '_controller' => 'App\\Controller\\ProjectController::handleSearch'], null, null, null, false, false, null]],
        '/security/registration' => [[['_route' => 'security_registration', '_controller' => 'App\\Controller\\SecurityController::registration'], null, null, null, false, false, null]],
        '/security/login' => [[['_route' => 'security_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'security_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/authentication_token' => [[['_route' => 'authentication_token'], null, ['POST' => 0], null, false, false, null]],
        '/api/authentication_token' => [[['_route' => 'api_authentication_token'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/main/([^/]++)(?'
                    .'|/(?'
                        .'|delete(*:196)'
                        .'|edit(?'
                            .'|Cat(*:214)'
                            .'|(*:222)'
                            .'|_my_data(*:238)'
                        .')'
                    .')'
                    .'|(*:248)'
                .')'
                .'|/api(?'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:292)'
                    .'|/(?'
                        .'|docs(?:\\.([^/]++))?(*:323)'
                        .'|c(?'
                            .'|ontexts/(.+)(?:\\.([^/]++))?(*:362)'
                            .'|ategories(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:400)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:438)'
                                .')'
                            .')'
                        .')'
                        .'|annonces(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:478)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:516)'
                            .')'
                        .')'
                        .'|users(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:552)'
                            .')'
                            .'|/(?'
                                .'|([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:593)'
                                .')'
                                .'|([^/]++)/annonces(?:\\.([^/]++))?(*:634)'
                            .')'
                        .')'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        196 => [[['_route' => 'delete_post', '_controller' => 'App\\Controller\\ProjectController::delete_post'], ['id'], null, null, false, false, null]],
        214 => [[['_route' => 'cat_edit', '_controller' => 'App\\Controller\\ProjectController::newCat'], ['id'], null, null, false, false, null]],
        222 => [[['_route' => 'post_edit', '_controller' => 'App\\Controller\\ProjectController::newPost'], ['id'], null, null, false, false, null]],
        238 => [[['_route' => 'data_edit', '_controller' => 'App\\Controller\\SecurityController::registration'], ['id'], null, null, false, false, null]],
        248 => [[['_route' => 'showAnnonce', '_controller' => 'App\\Controller\\ProjectController::show'], ['id'], null, null, false, true, null]],
        292 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        323 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        362 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        400 => [
            [['_route' => 'api_categories_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Category', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_categories_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Category', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        438 => [
            [['_route' => 'api_categories_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Category', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_categories_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Category', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_categories_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Category', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_categories_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Category', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        478 => [
            [['_route' => 'api_annonces_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Annonce', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_annonces_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\Annonce', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        516 => [
            [['_route' => 'api_annonces_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Annonce', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_annonces_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Annonce', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_annonces_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Annonce', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_annonces_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\Annonce', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        552 => [
            [['_route' => 'api_users_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_users_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        593 => [
            [['_route' => 'api_users_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_users_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'delete'], ['id', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_users_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_users_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_item_operation_name' => 'patch'], ['id', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        634 => [
            [['_route' => 'api_users_annonces_get_subresource', '_controller' => 'api_platform.action.get_subresource', '_format' => null, '_api_resource_class' => 'App\\Entity\\Annonce', '_api_subresource_operation_name' => 'api_users_annonces_get_subresource', '_api_subresource_context' => ['property' => 'Annonces', 'identifiers' => [['id', 'App\\Entity\\User', true]], 'collection' => true, 'operationId' => 'api_users_annonces_get_subresource']], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
