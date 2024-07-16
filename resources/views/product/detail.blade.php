@extends('layout')

@section('css')

@endsection

@section('main-content')
<section class="py-5">
    <div class="container">
        <div class="row gx-5">
            <aside class="col-lg-6">
                <div class="border rounded-4 mb-3 d-flex justify-content-center">
                    <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="#">
                        <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit"
                            src="/{{ $product->firstImage->url }}" />
                    </a>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    @foreach ($product->images as $image)
                        <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image"
                            href="#" class="item-thumb">
                            <img width="60" height="60" class="rounded-2" src="/{{$image->url}}" />
                        </a>
                    @endforeach
                </div>
                <!-- thumbs-wrap.// -->
                <!-- gallery-wrap .end// -->
            </aside>
            <main class="col-lg-6">
                <div class="ps-lg-3">
                    <h4 class="title text-dark">
                        {{$product->name}} <br />

                    </h4>
                    <div class="d-flex flex-row my-3">
                        <div class="text-warning mb-1 me-2">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span class="ms-1">
                                {{$product->overrate}}
                            </span>
                        </div>
                        <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>0 đơn hàng</span>
                        <span class="text-success ms-2">{{$product->quantity > 0 ? 'Còn hàng' : 'Hết hàng'}}</span>
                    </div>

                    <div class="mb-3">
                        <span class="h5">{{$product->unit_price}}</span>

                    </div>


                    <div class="row">

                        <dt class="col-3">Danh mục:</dt>
                        <dd class="col-9">{{$product->category->name}}</dd>

                        <dt class="col-3">Thương hiệu</dt>
                        <dd class="col-9">{{$product->brand->name}}</dd>
                    </div>
                    <hr />
                </div>
            </main>
        </div>
    </div>
</section>
<!-- content -->
<section class="bg-light border-top py-4">
    <div class="container">
        <div class="row gx-4">
            <div class="col-lg-8 mb-4">
                <div class="border rounded-2 px-3 py-2 bg-white">
                    <!-- Pills navs -->
                    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                        <li class="nav-item d-flex" role="presentation">
                            <a class="nav-link d-flex align-items-center justify-content-center w-100 active"
                                id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab"
                                aria-controls="ex1-pills-1" aria-selected="true">Thông số</a>
                        </li>
                    </ul>
                    <!-- Pills navs -->

                    <!-- Pills content -->
                    <div class="tab-content" id="ex1-content">
                        <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel"
                            aria-labelledby="ex1-tab-1">
                            <table class="table border mt-3 mb-2">
                                <tr>
                                    <th class="py-2">Công nghệ CPU:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[0]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Số nhân:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[1]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Số luồng:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[2]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Tốc độ CPU:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[3]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Tốc độ tối đa:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[4]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Bộ nhớ đệm:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[5]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">RAM:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[6]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Loại RAM:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[7]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Tốc độ bus RAM:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[8]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Hỗ trợ RAM tối đa:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[9]->value}}
                                    </td>
                                </tr>

                                <tr>
                                    <th class="py-2">Ổ cứng:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[10]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Màn hình:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[11]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Độ phân giải:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[12]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Tần số quét:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[13]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Độ phủ màu:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[14]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Công nghệ màn hình:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[15]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Card màn hình:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[16]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Công nghệ âm thanh:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[17]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Cổng giao tiếp:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[18]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Kết nối không dây:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[19]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Khe đọc thẻ nhớ:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[20]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Webcam:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[21]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Đèn bàn phím:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[22]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Tính năng khác:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[23]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">kích thước trọng lượng:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[24]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Chất liệu:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[25]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Thông tin pin:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[26]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Công suất bộ sạc:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[27]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Hệ điều hành:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[28]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Màu sắc:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[29]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Bảo hành:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[30]->value}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="py-2">Ngày ra mắt:</th>
                                    <td class="py-2">
                                        {{$product->productSpecificationDetails[31]->value}}
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>
                    <!-- Pills content -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
