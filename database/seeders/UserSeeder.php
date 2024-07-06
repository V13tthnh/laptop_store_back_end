<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            'full_name' => 'Đinh Viết Thành',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('Abc@123'),
            'birthday' => '03/05/11',
            'gender' => 'Nam',
            'phone' => '0123456789',
            'status' => 1
        ]);

        DB::table('users')->insert([
            'full_name' => 'Trần thành nghĩa',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('Abc@123'),
            'birthday' => '03/05/11',
            'gender' => 'Nữ',
            'phone' => '0111222333',
            'status' => 1
        ]);

        DB::table('users')->insert([
            'full_name' => 'Trần Văn Nhân Viên',
            'email' => 'employee1@gmail.com',
            'password' => Hash::make('Abc@123'),
            'birthday' => '03/05/11',
            'gender' => 'Nam',
            'phone' => '0111222333',
            'status' => 1
        ]);

        DB::table('users')->insert([
            'full_name' => 'Trần Thị Khách Hàng',
            'email' => 'customer1@gmail.com',
            'password' => Hash::make('Abc@123'),
            'birthday' => '03/05/11',
            'gender' => 'Nam',
            'phone' => '0111222333',
            'status' => 1
        ]);

        DB::table('users')->insert([
            'full_name' => 'Nguyên Văn A',
            'email' => 'customer2@gmail.com',
            'password' => Hash::make('Abc@123'),
            'birthday' => '03/05/11',
            'gender' => 'Nam',
            'phone' => '0111222333',
            'status' => 1
        ]);

        DB::table('users')->insert([
            'full_name' => 'Nguyên Văn B',
            'email' => 'customer33@gmail.com',
            'password' => Hash::make('Abc@123'),
            'birthday' => '03/05/11',
            'gender' => 'Nam',
            'phone' => '0111222333',
            'status' => 1
        ]);


        Role::create(['name' => 'admin']);
        Role::create(['name' => 'employee']);
        Role::create(['name' => 'customer']);

        Permission::create(['name' => 'thêm danh mục']);
        Permission::create(['name' => 'sửa danh mục']);
        Permission::create(['name' => 'xóa danh mục']);

        Permission::create(['name' => 'thêm sản phẩm']);
        Permission::create(['name' => 'sửa sản phẩm']);
        Permission::create(['name' => 'xóa sản phẩm']);

        Permission::create(['name' => 'thêm nhà cung cấp']);
        Permission::create(['name' => 'sửa nhà cung cấp']);
        Permission::create(['name' => 'xóa nhà cung cấp']);

        Permission::create(['name' => 'thêm thương hiệu']);
        Permission::create(['name' => 'sửa thương hiệu']);
        Permission::create(['name' => 'xóa thương hiệu']);

        Permission::create(['name' => 'thêm thông số']);
        Permission::create(['name' => 'sửa thông số']);
        Permission::create(['name' => 'xóa thông số']);

        Permission::create(['name' => 'thêm khách hàng']);
        Permission::create(['name' => 'sửa khách hàng']);
        Permission::create(['name' => 'xóa khách hàng']);

        Permission::create(['name' => 'thêm đơn nhập']);
        Permission::create(['name' => 'sửa đơn nhập']);
        Permission::create(['name' => 'duyệt đơn']);

        Permission::create(['name' => 'thêm địa chỉ']);
        Permission::create(['name' => 'sửa địa chỉ']);
        Permission::create(['name' => 'xóa địa chỉ']);

        Permission::create(['name' => 'thêm nhân viên']);
        Permission::create(['name' => 'sửa nhân viên']);
        Permission::create(['name' => 'xóa nhân viên']);

        Permission::create(['name' => 'thêm vai trò']);
        Permission::create(['name' => 'sửa vai trò']);
        Permission::create(['name' => 'xóa vai trò']);

        Permission::create(['name' => 'thêm quyền']);
        Permission::create(['name' => 'sửa quyền']);
        Permission::create(['name' => 'xóa quyền']);

        Permission::create(['name' => 'thêm banner']);
        Permission::create(['name' => 'sửa banner']);
        Permission::create(['name' => 'xóa banner']);

        Permission::create(['name' => 'thêm khuyến mãi']);
        Permission::create(['name' => 'sửa khuyến mãi']);
        Permission::create(['name' => 'xóa khuyến mãi']);


        $user1 = User::find(1);
        $user1->assignRole('admin');

        $user2 = User::find(2);
        $user2->assignRole('admin');

        $user2 = User::find(3);
        $user2->assignRole('employee');

        $user2 = User::find(4);
        $user2->assignRole('customer');

        $user2 = User::find(5);
        $user2->assignRole('customer');

        $user2 = User::find(6);
        $user2->assignRole('customer');
    }
}
