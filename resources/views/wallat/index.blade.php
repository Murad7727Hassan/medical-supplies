@extends(Auth::user()->type == 0 ? 'layouts.main' : 'layouts.app')
@section('title', ' المحفضه')
@section('content')

    @include('alerts.errors')
    @include('alerts.success')

    <!-- Display Error
@if($errors->any())
        {!! implode('', $errors->all('<div class="text-center"><mark class=" text-danger h4">:message !!</mark></div>')) !!}
    @endif -->



    <!-- Page Title -->
    <div class="pagetitle px-5 pt-5">
        <h1>ادارة المحفظة</h1>
    </div>
    <!-- End Page Title -->

    <div class="row px-5 pt-3">
        <div class="col-4 ">
            <div class="row shadow  p-3 mx-2 fs-4 rounded align-items-center bg-white">
                <div class="col-10">
                    <p class="fs-5 text-secondary my-0">الرصيد الحالي:
                        <span class="mx-3 fs-3 text-success">{{  $wallet->balance }}$</span>
                    </p>
                </div>
                <div class="col-2">
                    <i class="bi bi-cash-stack text-success"></i>
                </div>
            </div>
        </div>
{{--        <div class="col-4 ">--}}
{{--            <div class="row shadow  p-3 mx-2 fs-4 rounded align-items-center">--}}
{{--                <div class="col-10">--}}
{{--                    <p class="fs-5 text-secondary my-0">اجمالي العمليات:--}}
{{--                        <span class="mx-3 fs-3 text-black">{{  $wallet->balance }}</span>--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--                <div class="col-2">--}}
{{--                    <i class="bi bi-credit-card-2-back-fill text-primary"></i>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-4 ">--}}
{{--            <div class="row shadow  p-3 mx-2 fs-4 rounded align-items-center">--}}
{{--                <div class="col-10">--}}
{{--                    <p class="fs-5 text-secondary my-0">اجمالي المنتجات المباعة:--}}
{{--                        <span class="mx-3 fs-3 text-black">{{  $wallet->balance }}</span>--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--                <div class="col-2">--}}
{{--                    <i class="bi bi-credit-card-2-back-fill"></i>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

    <section class="section profile min-vh-100 overflow-hidden p-5">
        <div class="bg-white py-3 px-5 shadow rounded">

            <div class="mt-3">
                <div class="row fs-5 fw-bold p-2 rounded border-bottom mb-2">
                    <div class="col-1">
                        الرقم
                    </div>
                    <div class="col-7 ">
                        <div class="row">
                            <div class="col-9 ">
                                الوصف
                            </div>
                            <div class="col-3">
                                الفاتورة
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        التاريخ
                    </div>
                    <div class="col-1">
                        <div class="row fs-5">
                            <div class="col-6">
                                المبلغ
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ( $transactions as $transaction)
                    <div class="row fs-5 shadow-sm p-2 rounded text-primary mb-2">
                        <div class="col-1">
                            {{ $transaction->id }}
                        </div>
                        <div class="col-7 ">
                            <div class="row">
                                @if($transaction->type=='deposit')

                                    <div class="col-9">
                                        تم ايداع مبلغ في حسابك بفاتورة رقم
                                    </div>
                                    <div class="col-3">
                                        {{ $loop->index + 125 }}
                                    </div>
                                @else
                                    <div class="col-9">
                                        تم سحب مبلغ من حسابك بفاتورة رقم
                                    </div>
                                    <div class="col-3">
                                        125
                                    </div>
                                @endif

                            </div>
                        </div>
                        <div class="col-2">
                            {{ $transaction->created_at->diffForHumans() }}
                        </div>
                        <div class="col-2">
                            <div class="row fs-5">
                                <div class="col-6">
                                    {{ $transaction->amount }}
                                </div>
                                <div class="col-6">
                                    <i class="bi bi-plus-circle-fill "></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if(count($transactions) == 0)
                    <p class="text-center fs-4 mt-5">لا يوجد اي عمليات</p>
                @endif
            </div>

    </section>
    </div>
@endsection
