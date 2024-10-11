<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminHelper
{
    // public static function middleware($class)
    // {
    //     $class->middleware('preventBackHistory');
    //     $class->middleware('auth:admin');
    // }

    public function addPermission($role, $newPermissions)
    {
        foreach ($newPermissions as $newPermission) {
            foreach ($newPermission['permissions'] as $permission) {
                $permissionForRole = Permission::updateOrCreate(
                    [
                        'name' => $permission['name'],
                        'route' => $permission['route'],
                        'search_status' => $permission['search_status'],
                        'group_name' => $newPermission['group_name'],
                    ]
                );
                $roleModel = Role::where('name', $role)->first();
                $roleModel->givePermissionTo($permissionForRole);
            }
        }
    }

    public static function datatableDesign($model = null, $permission = null, $route = 'admin.deleteBySelection', $order = ['1', 'desc'])
    {
        $delete = [];
        if (auth()->user()->can($permission)) {
            $delete =
            [

                'text' => __('Delete'),
                'className' => 'btn btn-danger',
                'action' => "function (e, dt, node, config ) {
                    var rowData = dt.rows( { selected: true } ).data();
                    var dataId = [];

                    for (i = 0; i < rowData.length; i++) {
                        dataId[i] = rowData[i]['id'];
                    }

                    if(dataId.length && confirm('".__('Are you sure to delete')." ?')) {
                        $.ajax({
                            type:'POST',
                            url:'".route($route)."',
                            data:{
                                dataId: dataId,
                                permission:'".$permission."',
                                model:'".$model."'
                            },
                            success:function(data){
                                console.log(data);
                                dt.rows({ page: 'current', selected: true }).remove().draw(false);
                                // window.location.reload();
                            },
                            error:function(data){
                                console.log(data);
                                alert('Something went wrong!');
                            }
                        });
                    }
                }",

            ];
        }

        //language setup
        if (Session::get('locale') != 'en') {
        }

        $locale = Session::get('locale') ?? 'en';

        return [
            'dom' => 'lBfrtip',
            // 'serverSide'=> true,
            // 'processing'=> true,
            'order' => [$order],
            'scrollX' => true,
            // "scrollY" => "200px",
            'lengthMenu' => [[10, 20, 40, 50, 100, -1], ['10', '20', '40', '50', '100', 'All']],
            'stateSave' => false,
            'oLanguage' => [
                'sLengthMenu' => '_MENU_',
            ],
            'language' => ['url' => url('datatable_lang/'.$locale.'.json')],
            'columnDefs' => [
                [
                    'targets' => [1],
                    'visible' => false,
                    'searchable' => false,
                ],

                [
                    'className' => 'select-checkbox',
                    'targets' => 0,
                    'orderable' => false,
                ],

                // [
                //     'render'=> 'function(data, type, row, meta){
                //         data = "<div class='."checkbox".'><input type='."checkbox".' class='."dt-checkboxes".'><label></label></div>";

                //        return data;
                //     }',
                //     'checkboxes' => [
                //        'selectRow' => true,
                //        'selectAllRender' => '<div class='."checkbox".'><input type='."checkbox".' class='."dt-checkboxes".'><label></label></div>'
                //     ],
                //     'targets' => [0]
                // ]

            ],
            'select' => [
                'style' => 'multi',
                'selector' => 'td:first-child',
            ],
            // 'buttons' => ['csv', 'excel', 'print', 'reset','pdf','reload'],
            'buttons' => [
                [
                    'extend' => 'selectAll',
                    'text' => __('Select All'),
                    'className' => 'btn btn-alternate',
                ],
                [
                    'extend' => 'selectNone',
                    'text' => __('Deselect All'),
                    'className' => 'btn btn-danger',
                ],

                [
                    'extend' => 'copyHtml5',
                    'text' => __('Copy'),
                    'className' => ' btn btn-primary',
                    'exportOptions' => [
                        'columns' => ':visible:not(:last-child):not(:first-child)',
                        'rows' => ':visible',
                    ],

                ],
                [
                    'extend' => 'print',
                    'className' => ' btn btn-success',
                    'exportOptions' => [
                        'columns' => ':visible:not(:last-child):not(:first-child)',
                        'rows' => ':visible',
                    ],

                ],
                [
                    'extend' => 'pdf',
                    'className' => 'btn-shadow btn btn-alternate',
                    'exportOptions' => [
                        'columns' => ':visible:not(:last-child):not(:first-child)',
                        'rows' => ':visible',
                    ],

                ],
                [
                    'extend' => 'csv',
                    'className' => 'btn-shadow btn btn-info',
                    'exportOptions' => [
                        'columns' => ':visible:not(:last-child):not(:first-child)',
                        'rows' => ':visible',
                    ],

                ],
                [
                    'extend' => 'excel',
                    'className' => 'btn-shadow btn btn-warning',
                    'exportOptions' => [
                        'columns' => ':visible:not(:last-child):not(:first-child)',
                        'rows' => ':visible',
                    ],

                ],
                [
                    'extend' => 'colvis',
                    'className' => 'btn-shadow btn btn-dark',

                ],

                [$delete],

            ],
        ];
    }
}
