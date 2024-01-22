<!DOCTYPE html>
<html>
<head>
    <title>رفض الحجز</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
    <p style="text-align: center; font-size: 16px;color:black">تم رفض الحجز الخاص بك</p>
    <table style="width: 100%" dir="rtl">
        <tr>
            <td>حالة الحجز</td>
            <td>{{$info->state->title}}</td>
        </tr>
        <tr>
            <td>تاريخ الحجز</td>
            <td>{{$info->date}}</td>
        </tr>
        <tr>
            <td>فترة الحجز</td>
            <td>{{$info->offerHall->duration->from()}} - {{$info->offerHall->duration->to()}}</td>
        </tr>
        <tr>
            <td>القاعة</td>
            <td>{{$info->hall->title}} - {{$info->hall->facility->title}}</td>
        </tr>
        <tr>
            <td>سبب الرفض</td>
            <td>{{$reason}}</td>
        </tr>
    </table>
    <p style="text-align: right">منصة قاعة</p>
</body>
</html>