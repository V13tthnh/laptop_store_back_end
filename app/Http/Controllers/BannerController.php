<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateBannerRequest;
use App\Models\Banner;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function index()
    {
        return view('banner.index');
    }

    public function dataTable()
    {
        $banners = Banner::all();
        return Datatables::of($banners)->make(true);
    }



    public function store(StoreUpdateBannerRequest $request)
    {
        $banner = new Banner;
        $banner->name = $request->name;
        $banner->link = $request->link;
        $banner->status = $request->status;
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $file->hashName();
            $path = $file->store('uploads/banners');
            $banner->image_url = $path;
        }
        $banner->save();
        return response()->json([
            'status' => true,
            'message' => "Thêm mới thành công!"
        ], 200);
    }


    public function edit(string $id)
    {
        $banner = Banner::find($id);

        if ($banner == null) {
            return response()->json([
                'error' => 404,
                'message' => "Không có dữ liệu!"
            ]);
        }
        return response()->json([
            'success' => 200,
            'data' => $banner
        ]);
    }


    public function update(StoreUpdateBannerRequest $request, string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return response()->json([
                'error' => 404,
                'message' => "Không có dữ liệu!"
            ]);
        }
        $banner->name = $request->name;
        $banner->link = $request->link;
        $banner->status = $request->status;
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $file->hashName();
            $oldPath = $banner->image_url;
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
            $path = $file->store('uploads/banners');
            $banner->image_url = $path;
        }
        $banner->save();

        return response()->json([
            'status' => true,
            'message' => "Cập nhật thành công!"
        ]);
    }


    public function destroy(string $id)
    {
        $brand = Banner::find($id);
        $brand->delete();

        return response()->json([
            'status' => true,
            'message' => "Xóa thành công."
        ]);
    }
}
