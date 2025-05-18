<!DOCTYPE html>

<html dir={{ session('lang')=='en'?"ltr":"rtl" }} lang="{{ app()->getLocale() }}">

<head>
 <title>{{ __('index.app_name') }}</title>
</head>

<body dir={{ session('lang')=='en'?"ltr":"rtl" }} >
    <h3>{{ __('order.orderDate') }} : {{ $data["تاريخ الطلب"] }}</h3>
    <h3>{{ __('order.orderNum') }} : {{ $data["رقم الطلب"] }}</h3>
    --------------------------------------------------             
    <h4>{{ __('order.product') }}</h4>
    <table dir={{ session('lang')=='en'?"ltr":"rtl" }} >
        <tr style="padding:10px;">
            <td >{{ __('order.proName') }}</td>
            <td> </td>
            <td> </td>
            <td >{{ __('order.proQuan') }}</td>
            <td> </td>
            <td> </td>
            <td >{{ __('order.proPrice') }}</td>
            <td> </td>
            <td> </td>
            <td >{{ __('order.prototalPrice') }}</td>
        </tr>
    @foreach ($data["الطلب"] as $item)
        @if($item["name"]=="vat")
            @break
        @endif
        <tr>
            <td><p>{{ $item["name"] }}</p></td>
            <td> </td>
            <td> </td>
            <td><p>{{ $item["quantity"] }}</p></td>
            <td> </td>
            <td> </td>
            <td><p dir={{ session('lang')=='en'?"ltr":"rtl" }}>{{ ($item["unit_amount"]/1000) }} OMR</p></td>
            <td> </td>
            <td> </td>
            <td><p dir={{ session('lang')=='en'?"ltr":"rtl" }}>{{ ($item["unit_amount"]/1000)*$item["quantity"] }} OMR</p></td>
        </tr>
    @endforeach
    </table>
    --------------------------------------------------   
    <h4>{{ __('order.invId') }} : &nbsp;&nbsp;&nbsp; {{ $data["اشعار الدفع"] }}</h4>
    <h4 dir={{ session('lang')=='en'?"ltr":"rtl" }}>{{ __('confirmOrder.vat') }} : &nbsp;&nbsp;&nbsp; {{ $data["الضريبة"] }} OMR</h4>
    <h4 dir={{ session('lang')=='en'?"ltr":"rtl" }}>{{ __('confirmOrder.delivery') }} : &nbsp;&nbsp;&nbsp; {{ $data["التوصيل"] }} OMR</h4>
    <h4 dir={{ session('lang')=='en'?"ltr":"rtl" }}>{{ __('order.total') }} : &nbsp;&nbsp;&nbsp; {{ $data["السعر النهائي"] }} OMR</h4>
    --------------------------------------------------
    <br>
    <p>{{ __('order.email') }} : &nbsp;&nbsp;&nbsp; {{ $data["الحساب"] }}</p>
    <p>{{ __('order.first_name') }} : &nbsp;&nbsp;&nbsp; {{ $data["الأسم الأول"] }}</p>
    <p>{{ __('order.last_name') }} : &nbsp;&nbsp;&nbsp; {{ $data["الكنية"] }}</p>
    <p>{{ __('order.phone') }} : &nbsp;&nbsp;&nbsp; {{ $data["رقم الهاتف"] }}</p>
    <p>{{ __('order.city') }} : &nbsp;&nbsp;&nbsp; {{ $data["المدينة"] }}</p>
    <p>{{ __('order.address') }} : &nbsp;&nbsp;&nbsp; {{ $data["العنوان"] }}</p>
    <p>{{ __('order.notes') }} : &nbsp;&nbsp;&nbsp; {{ $data["ملاحظات"] }}</p>
    <br>
    <table dir={{ session('lang')=='en'?"ltr":"rtl" }}>
    <tr>
        <td>
            <a href="https://wa.me/message/UHQFIUY6L7AHC1"><img width="50" height="50" src="https://img.icons8.com/color/100/whatsapp--v1.png" alt="whatsapp--v1"/></a>
        </td>
        <td>
            <a href="https://awtaralsultanate.com/"><img width="50" height="50" src="https://img.icons8.com/stickers/100/domain.png" alt="web site"/></a>
        </td>
    </tr>
    </table>
</body>
</html>