``` php
function sort_post_in_category_page($query) {
    if (!is_category() && is_tax('product_category')) {
        $query -> set('order', 'ASC');
        $query -> set('orderby', 'menu_order');
    }
}

add_action('pre_get_posts', 'sort_post_in_category_page');
```
