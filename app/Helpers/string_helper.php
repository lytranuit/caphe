<?php

if (!function_exists('str_slug')) {
    /**
     * Convert string to slug.
     *
     * @param string $string
     * @return mixed
     */
    function str_slug(string $str)
    {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
}

if (!function_exists('str_snake')) {
    /**
     * Convert string to friendly file name.
     *
     * @param string $string
     * @return mixed
     */
    function str_snake(string $string)
    {
        return str_replace(' ', '_', strtolower($string));
    }
}

if (!function_exists('class_basename')) {
    /**
     * Get the class "basename" of the given object / class.
     *
     * @param  string|object $class
     * @return string
     */
    function class_basename($class)
    {
        $class = is_object($class) ? get_class($class) : $class;
        return basename(str_replace('\\', '/', $class));
    }
}

if (!function_exists('str_starts_with')) {
    /**
     * Determine if a given string starts with a given substring.
     *
     * @param  string  $haystack
     * @param  string|array  $needles
     * @return bool
     */
    function str_starts_with($haystack, $needles)
    {
        foreach ((array) $needles as $needle) {
            if ($needle !== '' && substr($haystack, 0, strlen($needle)) === (string) $needle) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('str_studly')) {
    /**
     * Convert a value to studly caps case.
     *
     * @param  string  $value
     * @return string
     */
    function str_studly($value)
    {
        $value = ucwords(str_replace(['-', '_'], ' ', $value));
        return str_replace(' ', '', $value);
    }
}

if (!function_exists('str_contains')) {
    /**
     * Determine if a given string contains a given substring.
     *
     * @param  string  $haystack
     * @param  string|array  $needles
     * @return bool
     */
    function str_contains(string $haystack, $needles)
    {
        foreach ((array) $needles as $needle) {
            if ($needle !== '' && mb_strpos($haystack, $needle) !== false) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('str_camel')) {
    /**
     * Convert a value to camel case.
     *
     * @param  string  $value
     * @return string
     */
    function str_camel($value)
    {
        return lcfirst(str_studly($value));
    }
}

if (!function_exists('str_plural')) {
    /**
     * Get the plural form of an English word.
     *
     * @param  string  $value
     * @return string
     */
    function str_plural($value)
    {
        return plural($value);
    }
}

if (!function_exists('str_plural_studly')) {
    /**
     * Pluralize the last word of an English, studly caps case string.
     *
     * @param  string  $value
     * @return string
     */
    function str_plural_studly($value)
    {
        $parts = preg_split('/(.)(?=[A-Z])/u', $value, -1, PREG_SPLIT_DELIM_CAPTURE);

        $lastWord = array_pop($parts);

        return implode('', $parts) . str_plural($lastWord);
    }
}



if (!function_exists('html_nestable')) {

    function html_nestable($array, $column, $parent, $controller = '')
    {
        $html = "";
        $return = array_filter((array) $array, function ($item) use ($column, $parent) {
            return $item[$column] == $parent;
        });
        ///Bebin Tag
        if ($parent == 0) {
            $id_nestable = "id='nestable'";
        } else {
            $id_nestable = "";
        }
        $html .= '<ol class="dd-list" ' . $id_nestable . '>';
        ///Content
        foreach ($return as $row) {
            $sub_html = "";
            if ($controller == "menu") {
                if ($row['type'] == 1) {
                    $sub_html = "<span class='text-info mr-1'>[Link='" . $row['link'] . "']</span>";
                } elseif ($row['type'] == 2) {
                    $category_id = $row['category_id'];
                    if ($category_id == 0) {
                        $sub_html = "<span class='text-success mr-1'>[Danh mục sản phẩm='Tất cả']</span>";
                    } else {
                        $category_model = model("CategoryModel");
                        $obj = $category_model->find($category_id);
                        $sub_html = "<span class='text-success mr-1'>[Danh mục sản phẩm='" . $obj->name_vi . "']</span>";
                    }
                } elseif ($row['type'] == 3) {
                    $category_id = $row['category_id'];
                    if ($category_id == 0) {
                        $sub_html = "<span class='text-warning mr-1'>[Danh mục tin tức='Tất cả']</span>";
                    } else {
                        $tag_model = model("TagModel");
                        $obj = $tag_model->find($category_id);
                        $sub_html = "<span class='text-warning mr-1'>[Danh mục tin tức='" . $obj->name_vi . "']</span>";
                    }
                } elseif ($row['type'] == 4) {
                    $page_id = $row['category_id'];
                    if ($page_id == 0) {
                        $sub_html = "<span class='text-primary mr-1'>[Trang='Tất cả']</span>";
                    } else {
                        $page_model = model("PageModel");
                        $obj = $page_model->find($page_id);
                        $sub_html = "<span class='text-primary mr-1'>[Trang='" . $obj->title_vi . "']</span>";
                    }
                }
            }
            $html .= '<li class="dd-item" id="menuItem_' . $row['id'] . '" data-id="' . $row['id'] . '">
                            <div class="dd-handle">
                             ' . $sub_html . '
                                <div>' . $row['name_vi'] . '</div>
                                <div class="dd-nodrag btn-group ml-auto">
                                    <a class="btn btn-sm btn-outline-light" href="' . base_url("admin/$controller/edit/" . $row['id']) . '">Edit</a> 
                                    <button class="btn btn-sm btn-outline-light dd-item-delete">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>';
            $html .= html_nestable((array) $array, $column, $row['id'], $controller);
            $html .= '</li>';
        }
        ///End Tag
        $html .= '</ol>';

        return $html;
    }
}


if (!function_exists('current_language')) {

    function current_language()
    {
        $language = \Config\Services::language();
        $short_lang =  $language->getLocale();
        return $short_lang;
    }
}

if (!function_exists('pick_language')) {

    function pick_language($data, $struct = 'name_')
    {
        $language = \Config\Services::language();
        $short_lang =  $language->getLocale();
        $data = (array) $data;
        if (isset($data[$struct . $short_lang]) && $data[$struct . $short_lang] != "") {
            return $struct . $short_lang;
        } else {
            return $struct . 'vi';
        }
    }
}


if (!function_exists('split_string')) {

    function split_string($str, $length)
    {
        $str = strip_tags($str);
        if (strlen($str) > $length) {
            $str = mb_substr($str, 0, $length) . "...";
        }
        return $str;
    }
}






if (!function_exists('url_product_list')) {

    function url_product_list($id)
    {
        $url = base_url("danh-muc");
        if ($id > 0) {
            $category_model = model("CategoryModel");
            $category = $category_model->find($id);
            $url = base_url("danh-muc/" . ($category->slug != '' ? $category->slug : str_slug($category->name_vi)) . "-c$id.html");
        }
        return $url;
    }
}

if (!function_exists('url_news_list')) {

    function url_news_list($id)
    {
        $url = base_url("bang-tin");
        if ($id > 0) {
            $url = base_url("bang-tin?tag_id=$id");
        }
        return $url;
    }
}


if (!function_exists('url_page_list')) {

    function url_page_list($id)
    {
        $url = base_url();
        if ($id > 0) {
            $url = base_url("page/view/$id");
        }
        return $url;
    }
}


if (!function_exists('url_product')) {

    function url_product($id)
    {
        $url = base_url();
        if ($id > 0) {
            $product_model = model("ProductModel");
            $product = $product_model->find($id);
            $url = base_url("san-pham/" . ($product->slug != '' ? $product->slug : str_slug($product->name_vi)) . "-c$id.html");
        }
        return $url;
    }
}

if (!function_exists('url_page')) {

    function url_page($id)
    {
        $url = base_url();
        if ($id > 0) {

            $page_model = model("PageModel");
            $page = $page_model->find($id);
            $url = base_url("page/" . ($page->slug != '' ? $page->slug : str_slug($page->title_vi)) . "-c$id.html");
        }
        return $url;
    }
}

if (!function_exists('url_news')) {

    function url_news($id)
    {
        $url = base_url();
        if ($id > 0) {
            $news_model = model("NewsModel");
            $news = $news_model->find($id);
            $url = base_url("tin-tuc/" . ($news->slug != '' ? $news->slug : str_slug($news->title_vi)) . "-c$id.html");
        }
        return $url;
    }
}

if (!function_exists('url_library')) {

    function url_library($id)
    {
        $url = base_url();
        if ($id > 0) {
            $library_model = model("LibraryModel");
            $library = $library_model->find($id);
            $url = base_url("thu-vien/" . ($library->slug != '' ? $library->slug : str_slug($library->title_vi)) . "-c$id.html");
        }
        return $url;
    }
}
if (!function_exists('sync_cart')) {

    function sync_cart()
    {

        $items = array(
            'details' => array(),
            'count_product' => 0,
            'amount_product' => 0,
            'paid_amount' => 0,
            'service_fee' => -1
        );
        helper('cookie');


        $product_model = model('ProductModel');

        $cart = array();
        if (get_cookie("DATA_CART") && get_cookie("DATA_CART") != "") {
            $cart = json_decode(get_cookie("DATA_CART"), true);
        }
        if (isset($cart['details']) && count($cart['details']) > 0) {
            foreach ($cart['details'] as $key => $item) {
                $data = array();
                if (!isset($item['id']) || !isset($item['qty'])) {
                    continue;
                }
                $qty = $item['qty'];
                $id = $item['id'];

                $product = $product_model->where(array('id' => $id))->asObject()->first();
                $product_model->relation($product, array("image"));
                $price_this = $product->price;
                $product->qty = $qty;
                $product->amount = $qty * $price_this;
                $items['count_product'] += $qty;
                $items['amount_product'] += $qty * $price_this;

                $items['details'][] = $product;
            }
        }

        $items['paid_amount'] = $items['amount_product'];
        //echo "<pre>";
        //print_r($items);
        //die();
        return $items;
    }
}
