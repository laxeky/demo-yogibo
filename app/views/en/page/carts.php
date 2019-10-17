<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="carts_background">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-md-12 col-lg-8">
                <!-- nav order -->
                <div class="carts_nav">
                    <div class="carts_point active">
                        <div class="point"></div>
                        <div class="text active">Shopping Cart</div>
                    </div>

                    <div class="carts_point step2">
                        <div class="point"></div>
                        <div class="text">Billing & Shipping</div>
                    </div>

                    <div class="carts_point step3">
                        <div class="point"></div>
                        <div class="text">Payment</div>
                    </div>

                    <div class="carts_point step4">
                        <div class="point"></div>
                        <div class="text">Summary</div>
                    </div>

                </div>
                <!-- nav order -->
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class="row">
            <div class="col-lg-9">
                <h1>Shopping cart <span id="item_carts"></span></h1>
                <input type="hidden" name="txt_SelectTransport" id="txt_SelectTransport" value="<?=$txt_SelectTransport?>">
                <div id="id_load_carts" class="cart_box_list"></div>

                <div class="transport_way">    
                    <h1>Shipping Method</h1>
                    <div class="transport_box_flex">

                        <?php
                        if($deliveryRow > 0){
                            foreach ($delivery as $key => $val) {
                                $id_transport = $val['_product_delivery_ID'];
                                if($this->session->userdata('session_carts_delivery') == $val['_product_delivery_ID']){
                                    $_check = "checked";
                                }else{
                                    $_check = "";
                                }
                        ?>

                        <div class="transport_block">
                            <input type="radio" name="txt_Tranparent" id="txt_Tranparent<?=$id_transport?>" value="<?=$val['_product_delivery_ID']?>" onclick="js_carts_transport(this.value);"  <?=$_check?> >
                            <label for="txt_Tranparent<?=$id_transport?>">
                                <?=$val['_product_delivery_Title']?> (<span>฿</span> <?=$this->Object_model->number_money($val['_product_delivery_Price'])?>)
                                <br>
                                <?=$val['_product_delivery_Description']?>
                            </label>
                        </div>

                        <?php 
                            }
                        }
                        ?>
                        
                    </div>
                </div>

            </div>
            <div class="col-lg-3" id="carts_summary"></div>

        </div>
        <div class="row">
            <div class="col">
                <div class="carts_line">
                    <a href="<?=site_url('products')?>">
                        <input class="bnt_product_back" type="button" name="carts_product" value="< Continue Shopping">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// load carts list
js_carts_list();
</script>