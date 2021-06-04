<?php

namespace App\Controllers;


class Cart extends BaseController
{
    public function index()
    {
        $this->data['cart'] = sync_cart();
        // print_r($this->data['cart']);
        // die();
        return view($this->data['content'], $this->data);
    }

    public function checkout()
    {
        $this->data['cart'] = sync_cart();
        return view($this->data['content'], $this->data);
    }
    function complete()
    {
        $cart = sync_cart();
        if (isset($_POST) && count($_POST) && count($cart['details'])) {
            $sale_model = model("SaleModel");
            $sale_line_model = model("SaleLineModel");
            $array = $_POST;
            // echo "<pre>";
            // print_r($cart['details']);
            // die();
            $array['amount'] = $cart['amount_product'];
            $array['service_fee'] = $cart['service_fee'] > 0 ? $cart['service_fee'] : 0;
            $array['total_amount'] = $cart['paid_amount'];
            $array['is_send'] = 0;
            // $array['data_fz'] = json_encode($cart);
            // $data = $this->sale_model->create_object($array);
            // // echo "<pre>";
            // // print_r($data);
            // // die();
            // $order_id = $this->sale_model->insert($data);
            // $this->sale_model->where("id", $order_id)->update(array("code" => "FOZ-$order_id"));

            ///UPDATE SIMBA
            $array['order_date'] = date("Y-m-d H:i:s");
            // $array['delivery_date'] = date("Y-m-d");
            $array['code'] = "CF" . date("YmdHisz");



            $obj = $sale_model->create_object($array);
            $sale_model->insert($obj);
            $order_id = $sale_model->getInsertID();


            foreach ($cart['details'] as $row) {
                ///UPDATE SIMBA
                $data_up = array(
                    'order_id' => $order_id,
                    'quantity' => $row->qty,
                    'product_id' => $row->id
                );
                $sale_line_model->insert($data_up);
            }
            /////////////////
            helper('cookie');
            delete_cookie("DATA_CART");

            $this->data['cart'] = $cart;
            return view($this->data['content'], $this->data);
        } else {
            return redirect()->to(base_url());
        }
    }
}
