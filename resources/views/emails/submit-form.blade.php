<!DOCTYPE html>
<html>
<head>
    <title>ส่งข้อมูล</title>
</head>
<body>
<h1>หน่วยงาน {{$performance['owner']['institution']}} ส่งมาแล้ว</h1>
<p>ชื่อผู้ส่ง: {{$performance['owner']['name']}}</p>
<p>email:{{$performance['owner']['email']}}</p>
<p>เบอร์โทรศัพท์: {{$performance['owner']['tel']}}</p>
<div>เข้าดูที่ :
    <a href="{{route('dashboard.performances.edit',$performance['id'])}}">กดที่นี่</a>
</div>
</body>
</html>