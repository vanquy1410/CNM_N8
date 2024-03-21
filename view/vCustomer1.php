<?php
    include_once("controller/cCustomer.php");
    class VCustomer{
        function viewAllCustomers(){
            $p = new CCustomer();
            $tbl = $p -> getAllCustomers();
            showCustomer($tbl);
        }
    }

    function showCustomer($tbl){
        if($tbl){
            if(mysqli_num_rows($tbl) >0){
                $dem=0;
                echo '<table class="prod_tbl"> <tr>';
                if ($row = mysqli_fetch_assoc($tbl)){

                    while($row = mysqli_fetch_assoc($tbl)){
                        if($row["trangThai"] == 1){
                            echo "
                            <h4>Thông tin Khách hàng</h4>
                            <p><a href='./themthongtin.html' style='color: red'> Chỉnh sửa</a></p>
                          <form action='#'>
                              <div class='row'>
                                  <div class='col-lg-8 col-md-6'>
                                    <p><b>Họ và Tên khách hàng:</b> ".$row["HoTen"]."<br>                                      
                                       <b>Điện thoại:</b> ".$row["SoDienThoai"]."<br>
                                       <b>E-mail:</b> ".$row["Email"]."<br>
                                       <b>Địa chỉ:</b> ".$row["DiaChi"]."</p>
                                       <br><br>
                                
                                 <h4>Thông tin sản phẩm</h4>
                                 <div class='checkout__input__checkbox'>
                                     <label>Giao hàng tiết kiệm: 15.000
                                           <input type='checkbox'>
                                           <span class='checkmark'></span>
                                     </label>
                                 </div>
                                 <div class='checkout__input__checkbox'>
                                     <label>Giao hàng nhanh: 30.000
                                           <input type='checkbox'>
                                           <span class='checkmark'></span>
                                      </label>
                                  </div>
          
                                    <p><b>Tên sản phẩm:</b> Mặt nạ<br>
                                       <b>Số lượng:</b> x1<br>
                                       <b>Thành tiền:</b> đ<br>
          
                                  </div>
                          
                                  <div class='col-lg-4 col-md-6'>
                                      <div class='checkout__order'>
                                          <h4>Đơn hàng của bạn</h4>
                                          <div class='checkout__order__products'>Sản phẩm <span>Thành tiền</span></div>
                                          <ul>
                                              <li>Mặt nạ <span>39.000</span></li>
                                              <li>Kem chống nắng<span>79.000</span></li>
                                              <li>Nước tẩy trang<span>149.000</span></li>
                                          </ul>
                                          <div class='checkout__order__subtotal'>Phí vận chuyển<span>30.000</span></div>
                                          <div class='checkout__order__total'>Tổng tiền<span>307.000</span></div>
                                  
                                          <div class='checkout__input__checkbox'>
                                              <label for='payment'>
                                                  Thanh toán trực tuyến. <a href='./thongtinthanhtoan.html' style='color: palevioletred'>Tại đây!</a>
                                                  <input type='checkbox' id='payment'>
                                                  <span class='checkmark'></span>
                                              </label>
                                          </div>
          
                                          <div class='checkout__input__checkbox'>
                                              <label for='paypal'>
                                                  Thanh toán khi nhận hàng.
                                                  <input type='checkbox' id='paypal'>
                                                  <span class='checkmark'></span>
                                              </label>
                                          </div>
          
                                          <button type='submit' class='site-btn2'>ĐẶT HÀNG</button>
                                      </div>
                                  </div>
                              </div>
                           
                              ";
                        }
                    }
                    
            }
        }else{
            echo"Vui lòng nhập dữ liệu!";
        }
    }
}
?>

