<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'         => '1',
                'title'      => 'user_management_access',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '2',
                'title'      => 'permission_create',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '3',
                'title'      => 'permission_edit',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '4',
                'title'      => 'permission_show',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '5',
                'title'      => 'permission_delete',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '6',
                'title'      => 'permission_access',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '7',
                'title'      => 'role_create',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '8',
                'title'      => 'role_edit',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '9',
                'title'      => 'role_show',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '10',
                'title'      => 'role_delete',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '11',
                'title'      => 'role_access',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '17',
                'title'      => 'test_repo_access',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '18',
                'title'      => 'issue_create',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '19',
                'title'      => 'issue_edit',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '20',
                'title'      => 'issue_show',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '21',
                'title'      => 'issue_delete',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '22',
                'title'      => 'issue_access',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '23',
                'title'      => 'time_management_access',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '24',
                'title'      => 'time_work_type_create',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '25',
                'title'      => 'time_work_type_edit',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '26',
                'title'      => 'time_work_type_show',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '27',
                'title'      => 'time_work_type_delete',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '28',
                'title'      => 'time_work_type_access',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '29',
                'title'      => 'time_project_create',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '30',
                'title'      => 'time_project_edit',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '31',
                'title'      => 'time_project_show',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '32',
                'title'      => 'time_project_delete',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '33',
                'title'      => 'time_project_access',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '34',
                'title'      => 'time_entry_create',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '35',
                'title'      => 'time_entry_edit',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '36',
                'title'      => 'time_entry_show',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '37',
                'title'      => 'time_entry_delete',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '38',
                'title'      => 'time_entry_access',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '39',
                'title'      => 'time_report_create',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '40',
                'title'      => 'time_report_edit',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '41',
                'title'      => 'time_report_show',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '42',
                'title'      => 'time_report_delete',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '43',
                'title'      => 'time_report_access',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '44',
                'title'      => 'client_create',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '45',
                'title'      => 'client_edit',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '46',
                'title'      => 'client_show',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '47',
                'title'      => 'client_delete',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '48',
                'title'      => 'client_access',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '49',
                'title'      => 'bugs_repo_create',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '50',
                'title'      => 'bugs_repo_edit',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '51',
                'title'      => 'bugs_repo_show',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '52',
                'title'      => 'bugs_repo_delete',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '53',
                'title'      => 'bugs_repo_access',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '54',
                'title'      => 'test_case_create',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '55',
                'title'      => 'test_case_edit',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '56',
                'title'      => 'test_case_show',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '57',
                'title'      => 'test_case_delete',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '58',
                'title'      => 'test_case_access',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '59',
                'title'      => 'task_create',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '60',
                'title'      => 'task_edit',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '61',
                'title'      => 'task_show',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '62',
                'title'      => 'task_delete',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
            [
                'id'         => '63',
                'title'      => 'task_access',
                'created_at' => '2019-09-19 03:19:25',
                'updated_at' => '2019-09-19 03:19:25',
            ],
        ];

        Permission::insert($permissions);
    }
}
