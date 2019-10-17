<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="carts_background member_info">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <ul class="member_nav">
                    <li class="active"><a href="<?=site_url('member')?>">My Account</a></li>
                    <li><a href="<?=site_url('member/history')?>">Order History</a></li>
                    <li><a href="<?=site_url('member/wishlist')?>">Wish List</a></li>
                </ul>
            </div>
            <div class="col-lg-10">
                <h1>My Account</h1>
                <!-- <div class="level">- <?=$user['_register_Rank']?> Member -</div> -->
                <div id="member_info"></div>

                <div id="member_bill"></div>
            </div>
        </div>
    </div>
</div>
<script>
js_member_info_view();
js_member_bill_view();
</script>