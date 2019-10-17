<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="carts_background member_info">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <ul class="member_nav">
                    <li><a href="<?=site_url('member')?>">My Account</a></li>
                    <li class="active"><a href="<?=site_url('member/history')?>">Order History</a></li>
                    <li><a href="<?=site_url('member/wishlist')?>">Wish List</a></li>

                </ul>
            </div>
            <div class="col-lg-10">
                <h1>Order History</h1>
                
                <!-- history box -->
                <div class="history_box">
                    <div class="cart_box_list">
                        <div class="table-responsive-sm">
                        <table>
                            <tr class="header">
                                <td width="10%">Order</td>
                                <td width="15%" class="txt_center">Date</td>
                                <td width="15%" class="text-center">Total</td>
                                <td width="20%" class="text-center">Track</td>
                                <td width="15%" class="text-center">Status</td>
                                <td width="10%" class="text-center">Tax Invoice</td>
                                <td width="15%" class="text-center"></td>
                            </tr>
                            <?php
                            if($orderRow > 0){
                                foreach ($order as $val) {
                                    $_id      = $val['_carts_ID'];
                                    $ss_id    = $val['_carts_SessionID'];
                                    $_delivery_id = $val['_carts_Deliverly'];
                                    $arr_date = explode(" ",$val['_carts_CreateDate']);
                                    
                                    $date     = $this->Object_model->getDateThai($arr_date[0]);
                                    
                                    $carts    = $this->Object_model->getCartsList($ss_id);
                                    $cartsRow = count($carts);

                                    $_item_sum  = 0;
                                    $_price_sum = 0;
                                    $_total_sum = 0;
                                    $_delivery_price = 0;

                                    if($cartsRow > 0){
                                        foreach ($carts as $key => $rs) {
                                            $_item_sum  += $rs['_carts_item_Unit'];
                                            $_price_sum += $rs['_product_Price'] * $rs['_carts_item_Unit'];
                                        }
                                    }

                                    // deliverly
                                    $_delivery_id       = $val['_carts_Deliverly'];
                                    $data_delivery      = $this->Object_model->getDelivery($_delivery_id);
                                    $_delivery_price    = isset($data_delivery[0]['_product_delivery_Price'])?$data_delivery[0]['_product_delivery_Price']:0;
                                    $_total_sum = $_price_sum + $_delivery_price;

                            ?>
                                <tr class="content history_block">
                                    <td><?=$this->Object_model->orderNo($val['_carts_ID'])?></td>
                                    <td><?=$this->Object_model->getDateNumber($val['_carts_CreateDate'])?></td>
                                    <td>฿ <?=$this->Object_model->number_money($_total_sum)?></td>
                                    <td class="link">
                                        <?=$val['_carts_TrackID']?>
                                        <!-- <a href="#">ED000000000TH</a> -->
                                    </td>
                                    <td><?=$this->Object_model->cartsStatus($val['_carts_Step'])?></td>
                                    <td>
                                        <!-- <a href="#">
                                            <img src="<?=base_url('img/payment/icon-download.jpg')?>" alt="download">
                                        </a> -->
                                    </td>
                                    <td class="detail">
                                        <a href="<?=site_url('member/history/'.$_id)?>">Detail</a>
                                    </td>
                                </tr>
                            <?php 
                                }
                            }
                            ?>
                            <!-- <tr class="content history_block">
                                <td>1900012</td>
                                <td>19 มี.ค. 2561</td>
                                <td>฿2,660.00</td>
                                <td class="link"><a href="#">ED000000000TH</a></td>
                                <td>ระหว่างจัดส่ง</td>
                                <td>
                                    <a href="#">
                                        <img src="<?=base_url('img/payment/icon-download.jpg')?>" alt="download">
                                    </a>
                                </td>
                                <td class="detail">
                                    <a href="#">ดูรายละเอียด</a>
                                </td>
                            </tr>
                            <tr class="content history_block">
                                <td>1900012</td>
                                <td>19 มี.ค. 2561</td>
                                <td>฿2,660.00</td>
                                <td class="link"><a href="#">ED000000000TH</a></td>
                                <td>ระหว่างจัดส่ง</td>
                                <td>
                                    <a href="#">
                                        <img src="<?=base_url('img/payment/icon-download.jpg')?>" alt="download">
                                    </a>
                                </td>
                                <td class="detail">
                                    <a href="#">ดูรายละเอียด</a>
                                </td>
                            </tr> -->
                        </table>
                        </div>
                    </div>
                </div>
                <!-- history box -->

            </div>
        </div>
    </div>
</div>
