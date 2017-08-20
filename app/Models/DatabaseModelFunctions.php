<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseModelFunctions extends Model {

	public static function UsersListFunction(){
		$users = DB::table('users')
            ->join('UserRoles', 'users.role_id', '=', 'UserRoles.UserRoleID')
            ->where('users.is_active', '=', '1')
            ->select('user_id as LoginID','first_name as UserName','UserRoleName','users.created_user_id as CreatedBy','users.created_at as CreatedDate','first_name as UserFullName')
            ->get();

        if( !empty( $users ) ){
			foreach ($users as $object) {
				$CreatedBy = $object->CreatedBy;
				if($CreatedBy!='0'){
						$userrole = DB::table('UserRoles')->select('UserRoleName')->where('UserRoleID', '=', $CreatedBy)->get();
						$object->CreatedBy = $userrole[0]->UserRoleName;
					}else{
					$object->CreatedBy='';
				}
			}
	    	return $users;
	    }
	}
}