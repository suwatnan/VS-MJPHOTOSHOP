<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            MJPHOTOSHOP
        </div>

        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/home') }}">
                <font color="000000">ประเภทผู้ใช้งาน</font> 
                    </a>
                </li>
            </ul>
        <?php
            if(Auth::User()->usertypeID =="2"){//พนักงานอัดรูป
        ?>
            <ul><font color="00FF00"> พนักงานอัดรูป</font></a></ul>
            <ul class="nav" role="tablist"><a href="{{ url('/admin/printphotodetail') }}"> การอัดรูป </a></ul>
            <!--<ul class="nav" role="tablist"><a href="{{ url('/admin/printphoto') }}"> จัดการสถานะ </a></ul>-->
            <!--<ul class="nav" role="tablist"><a href="{{ url('/admin/payment') }}"> ตรวจสอบใบเสร็จ</a></ul>-->
            <ul class="nav" role="tablist"><a href="{{ url('/admin/editpayment') }}"> ใบเสร็จค้างชำระ</a></ul>
            <!--<ul class="nav" role="tablist"><a href="{{ url('/admin/product') }}"> สินค้า</a></ul>
            <ul class="nav" role="tablist"><a href="{{ url('/admin/sizeimage') }}">ขนาดรูป</a></ul>
            <ul class="nav" role="tablist"><a href="{{ url('/admin/paper') }}">กระดาษ</a></ul>
            <ul class="nav" role="tablist"><a href="{{ url('/admin/formatprint') }}">รูปแบบขอบกระดาษ</a></ul>-->
        
        <?php
            }else if(Auth::User()->usertypeID =="3"){//ช่างถ่ายรูป
        ?>
           <ul><font color="00FF00">ช่างถ่ายรูป</font> </a></ul>
           <ul class="nav" role="tablist"><a href="{{ url('/admin/booking') }}">การจองถ่ายรูป</a></ul>
           <ul class="nav" role="tablist"><a href="{{ url('/admin/deposit') }}">ค่ามัดจำ</a></ul>
           <!--<ul class="nav" role="tablist"><a href="{{ url('/admin/receiving') }}">รูปแบบการรับรูป</a></ul>
           <ul class="nav" role="tablist"><a href="{{ url('/admin/formatss') }}">รูปแบบการถ่ายรูป</a></ul>
           <ul class="nav" role="tablist"><a href="{{ url('/admin/timess') }}">เวลาการจอง</a></ul>-->
           
           
        <?php    
            }else if(Auth::User()->usertypeID =="1"){//พนักงานรับorder
        ?>
        
        <?php    
            }else{//5-เจ้าของร้าน
        ?>
        <ul><font color="00FF00">เจ้าของร้าน</font> </a></ul>
        <ul class="nav" role="tablist"><a href="{{ url('/admin/users') }}"> การจัดการผู้ใช้งาน</a></ul>
        <ul class="nav" role="tablist"><a href="{{ url('/admin/product') }}"> จัดการข้อมูลสินค้า</a></ul>
        <ul class="nav" role="tablist"><a href="{{ url('/admin/timess') }}">การจัดเวลาจองถ่ายรูป</a></ul>
        <ul class="nav" role="tablist"><a href="{{ url('/admin/payment') }}"> ตรวจสอบใบเสร็จ</a></ul>
        <ul class="nav" role="tablist"><a href="{{ url('/admin/receiving') }}">การรับรูป</a></ul>
        <ul class="nav" role="tablist"><a href="{{ url('/admin/paper') }}">กระดาษ</a></ul>
        <ul class="nav" role="tablist"><a href="{{ url('/admin/formatprint') }}">รูปแบบขอบกระดาษ</a></ul>
        <ul class="nav" role="tablist"><a href="{{ url('/admin/formatss') }}">รูปแบบการถ่ายรูป</a></ul>
        <ul class="nav" role="tablist"><a href="{{ url('/admin/sizeimage') }}">ขนาดรูป</a></ul>
        <ul class="nav" role="tablist"><a href="{{ url('/admin/printphotodetail') }}"> การอัดรูป </a></ul>
        <ul class="nav" role="tablist"><a href="{{ url('/admin/booking') }}">การจองถ่ายรูป</a></ul>
        
        <?php    
            }
        ?>  
        </div>
    </div>
</div>
