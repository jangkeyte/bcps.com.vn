<?php
define( 'THEME_URL', get_stylesheet_directory() );

/**
 @ Thiết lập $content_width để khai báo kích thước chiều rộng của nội dung
 **/
if ( ! isset( $content_width ) ) {
    /*
     * Nếu biến $content_width chưa có dữ liệu thì gán giá trị cho nó
     */
  $content_width = 1020; // Pixels.
}
/*
* Tạo menu cho theme
*/
register_nav_menu ( 'primary-menu', __('Primary Menu', 'jangkeyte') );

/**
 @ Thiết lập các chức năng sẽ được theme hỗ trợ
 **/
if ( ! function_exists( 'jangkeyte_setup' ) ) {
  function jangkeyte_setup() {
        register_nav_menu( 'menu-top', __('Menu Top') );
        register_nav_menu( 'menu-res', __('Menu Responsive') );
        register_nav_menu( 'menu-bottom', __('Menu Bottom') );
    
    /*
     * Thêm chức năng post thumbnail
     */
    add_theme_support( 'post-thumbnails' );
        add_image_size( 'post-thumbnails', 500, 300, true ); 

  }
}
add_action( 'after_setup_theme', 'jangkeyte_setup' );

/**
 * Cài đặt Theme Widgets
 */
/*
if ( ! function_exists( 'jangkeyte_widgets_init' ) ) {
  function jangkeyte_widgets_init() {
      $sidebar = array(
        'name' => __( 'Home Pages', 'jangkeyte' ),
        'id' => 'sidebar-home-jk',
        'description'   => __( 'sidebar-home-jk', 'jangkeyte' ),
        'before_widget' => '<div class="textwidget">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3><div class="widget-content">',
      );
    register_sidebar( $sidebar );

      $sidebar = array(
        'name' => __( 'Sidebar', 'jangkeyte' ),
        'id' => 'sidebar-main-jk',
        'description'   => __( 'sidebar-main-jk', 'jangkeyte' ),
        'before_widget' => '<div class="textwidget">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3><div class="widget-content">',
      );
    register_sidebar( $sidebar );

    $sidebar = array(
        'name' => __( 'Product', 'jangkeyte' ),
        'id' => 'sidebar-product-jk',
        'description'   => __( 'sidebar-product-jk', 'jangkeyte' ),
        'before_widget' => '<div class="textwidget">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3><div class="widget-content">',
      );
    register_sidebar( $sidebar );
    
    $sidebar = array(
        'name' => __( 'Service', 'jangkeyte' ),
        'id' => 'sidebar-service-jk',
        'description'   => __( 'sidebar-service-jk', 'jangkeyte' ),
        'before_widget' => '<div class="col-md-6 col-xs-12"><div class="service text-right sm-left">',
        'after_widget' => '</p></div></div>',
        'before_title' => '<h3 class="title"><a class="smooth" title="">',
        'after_title' => '</a></h3><p>',
      );
    register_sidebar( $sidebar );
    
      $sidebar = array(
        'name' => __( 'Footer', 'jangkeyte' ),
        'id' => 'sidebar-footer-jk',
        'description'   => __( 'sidebar-footer-jk', 'jangkeyte' ),
        'before_widget' => '<div class="col-xs-12 col-sm-6 col-md-3">',
        'after_widget' => '</div>',
        'before_title' => '<div class="title_footer"><h3>',
        'after_title' => '</h3></div>',
      );
    register_sidebar( $sidebar );
  }
}
add_action( 'widgets_init', 'jangkeyte_widgets_init' );
*/

/**
 * Cài đặt jangkeyte Styles and Scripts
 */
if ( ! function_exists( 'jangkeyte_scripts' ) ) {
  function jangkeyte_scripts() {

    $uri     = get_template_directory_uri();
    $theme   = wp_get_theme( get_template() );
    $version = $theme->get( 'Version' );

    // Load current theme styles.css file.
    wp_enqueue_style( 'jangkeyte-style', THEME_URL, array(), $version, 'all' );

    // Load custom jangkeyte styles.
    wp_enqueue_style( 'jangkeyte-reset', $uri . '/assets/css/normalize.css', array(), $version, 'all' );
    wp_enqueue_style( 'bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', array(), $version, 'all' );
    wp_enqueue_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), $version, 'all' );
    wp_enqueue_style( 'jangkeyte-main', $uri . '/assets/css/jangkeyte.css', array(), $version, 'all' );
    
    // Enqueue theme scripts.
    wp_enqueue_script( 'jquery-js', '//code.jquery.com/jquery-1.11.0.min.js', array(), $version, true );
    wp_enqueue_script( 'jquery-migrate-js', '//code.jquery.com/jquery-migrate-1.2.1.min.js', array(), $version, true );
    wp_enqueue_script( 'bootstrap-js', '//cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array(), $version, true );
    wp_enqueue_script( 'jangkeyte-js', $uri . '/assets/js/jangkeyte.js', array(), $version, true );
  }
}
add_action( 'wp_enqueue_scripts', 'jangkeyte_scripts', 100 );


/**
 * Đăng ký banner
 */
if ( ! function_exists( 'jangkeyte_banner_register' ) ) {
  function jangkeyte_banner_register() { 
      $labels = array(
          'name' => _x('Ảnh bìa','jangkeyte'),
          'singular_name' => _x('Ảnh bìa','jangkeyte'),
          'add_new' => _x('Thêm ảnh bìa','jangkeyte'),
          'add_new_item' => _x('Thêm ảnh mới','jangkeyte'),
          'edit_item' => _x('Sửa ảnh bìa','jangkeyte'),
          'new_item' => _x('Thêm ảnh bìa mới','jangkeyte'),
          'all_items' => _x('Tất cả ảnh bìa','jangkeyte'),
          'view_item' => _x('Xem ảnh bìa','jangkeyte'),
          'search_item' => _x('Tìm ảnh bìa','jangkeyte'),
          'not_found' => _x('Hiện tại chưa có ảnh nào','jangkeyte'),
          'not_found_in_trash' => _x('Không có ảnh nào trong thùng rác','jangkeyte'),
          'menu_name' => _x('Ảnh bìa','jangkeyte')
      );
      
      $args = array(
          'labels' => $labels,
          'public' => true,
          'has_archive' => true,
          'rewrite' => true,
          'supports' => array('title', 'thumbnail', 'excerpt'),
          'menu_position' => 4,
          'menu_icon' => 'dashicons-slides',
      );      
      register_post_type( 'banner', $args);

      register_taxonomy( 'banner_cat', 'banner', array( 'hierarchical' => true, 'label' => _x('Hệ thống ảnh bìa','jangkeyte'), 'rewrite' => array( 'slug' => __('he-thong-banner') ) ) );

      flush_rewrite_rules();
  }
}
add_action( 'init', 'jangkeyte_banner_register' );

/**
 * Đăng ký việc làm
 */
if ( ! function_exists( 'jangkeyte_job' ) ) {
  function jangkeyte_job() { 

    /* Biến $label chứa các tham số thiết lập tên hiển thị của Taxonomy */
      $labels = array(
          'name' => _x('Việc làm','jangkeyte'),
          'singular_name' => _x('Việc làm','jangkeyte'),
          'add_new' => _x('Thêm mới','jangkeyte'),
          'add_new_item' => _x('Thêm việc làm mới','jangkeyte'),
          'edit_item' => _x('Sửa việc làm','jangkeyte'),
          'new_item' => _x('Thêm việc làm mới','jangkeyte'),
          'all_items' => _x('Tất cả việc làm','jangkeyte'),
          'view_item' => _x('Xem việc làm','jangkeyte'),
          'search_item' => _x('Tìm việc làm','jangkeyte'),
          'not_found' => _x('Hiện tại chưa có việc làm nào','jangkeyte'),
          'not_found_in_trash' => _x('Không có việc làm nào trong thùng rác','jangkeyte'),
          'menu_name' => _x('Việc làm','jangkeyte')
      );

      /* Biến $args khai báo các tham số trong custom taxonomy cần tạo */
      $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-clipboard',
        'rewrite' => array('slug' => 'viec-lam', 'with_front' => false),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_position' => 5,
      );

      /* slug-post-type rất quan trọng, có thể đặt tùy ý nhưng không có dấu cách, ký tự,... */
      register_post_type( 'job', $args);

      /* Hàm register_taxonomy để khởi tạo taxonomy */
      register_taxonomy( 'job_type', 'job', array( 'hierarchical' => true, 'label' => __('Hình thức làm việc','jangkeyte'), 'rewrite' => array( 'slug' => __('hinh_thuc') ) ) );

      /* Hàm register_taxonomy để khởi tạo taxonomy */
      register_taxonomy( 'sector', 'job', array( 'hierarchical' => true, 'label' => __('Ngành nghề','jangkeyte'), 'rewrite' => array( 'slug' => __('nganh_nghe') ) ) );

      /* Hàm register_taxonomy để khởi tạo taxonomy */
      register_taxonomy( 'offered_salary', 'job', array( 'hierarchical' => true, 'label' => __('Mức lương','jangkeyte'), 'rewrite' => array( 'slug' => __('muc_luong') ) ) );

      /* Hàm register_taxonomy để khởi tạo taxonomy */
      register_taxonomy( 'skill', 'job', array( 'hierarchical' => true, 'label' => __('Kỹ năng', 'jangkeyte'), 'rewrite' => array( 'slug' => __('ky_nang') ) ) );

      /* Hàm register_taxonomy để khởi tạo taxonomy */
      register_taxonomy( 'location', 'job', array( 'hierarchical' => true, 'label' => __('Khu vực', 'jangkeyte'), 'rewrite' => array( 'slug' => __('khu_vuc') ) ) );

      /* Hàm register_taxonomy để khởi tạo taxonomy */
      register_taxonomy( 'level', 'job', array( 'hierarchical' => true, 'label' => __('Cấp độ', 'jangkeyte'), 'rewrite' => array( 'slug' => __('cap_do') ) ) );

      flush_rewrite_rules();
  }
}
add_action( 'init', 'jangkeyte_job' );

/**
 * Đăng ký nhà tuyển dụng
 */
if ( ! function_exists( 'jangkeyte_employer' ) ) {
  function jangkeyte_employer() { 

    /* Biến $label chứa các tham số thiết lập tên hiển thị của Taxonomy */
      $labels = array(
          'name' => _x('Nhà tuyển dụng','jangkeyte'),
          'singular_name' => _x('Nhà tuyển dụng','jangkeyte'),
          'add_new' => _x('Thêm mới','jangkeyte'),
          'add_new_item' => _x('Thêm nhà tuyển dụng mới','jangkeyte'),
          'edit_item' => _x('Sửa nhà tuyển dụng','jangkeyte'),
          'new_item' => _x('Thêm nhà tuyển dụng mới','jangkeyte'),
          'all_items' => _x('Tất cả nhà tuyển dụng','jangkeyte'),
          'view_item' => _x('Xem nhà tuyển dụng','jangkeyte'),
          'search_item' => _x('Tìm nhà tuyển dụng','jangkeyte'),
          'not_found' => _x('Hiện tại chưa có nhà tuyển dụng nào','jangkeyte'),
          'not_found_in_trash' => _x('Không có nhà tuyển dụng nào trong thùng rác','jangkeyte'),
          'menu_name' => _x('Nhà tuyển dụng','jangkeyte')
      );

      /* Biến $args khai báo các tham số trong custom taxonomy cần tạo */
      $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-bank',
        'rewrite' => array('slug' => 'nha-tuyen-dung', 'with_front' => false),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_position' => 6,
      );

      /* slug-post-type rất quan trọng, có thể đặt tùy ý nhưng không có dấu cách, ký tự,... */
      register_post_type( 'employer', $args);

      /* Hàm register_taxonomy để khởi tạo taxonomy */
      //register_taxonomy( 'employer_cat', 'employer', array( 'hierarchical' => true, 'label' => _x('Danh mục nhà tuyển dụng','jangkeyte'), 'rewrite' => array( 'slug' => __('employers') ) ) );

      flush_rewrite_rules();
  }
}
add_action( 'init', 'jangkeyte_employer' );

/**
 * Đăng ký ứng viên
 */
if ( ! function_exists( 'jangkeyte_candidate' ) ) {
  function jangkeyte_candidate() { 

    /* Biến $label chứa các tham số thiết lập tên hiển thị của Taxonomy */
      $labels = array(
          'name' => _x('Ứng viên','jangkeyte'),
          'singular_name' => _x('Nhà ứng viên','jangkeyte'),
          'add_new' => _x('Thêm mới','jangkeyte'),
          'add_new_item' => _x('Thêm ứng viên mới','jangkeyte'),
          'edit_item' => _x('Sửa ứng viên','jangkeyte'),
          'new_item' => _x('Thêm ứng viên mới','jangkeyte'),
          'all_items' => _x('Tất cả ứng viên','jangkeyte'),
          'view_item' => _x('Xem ứng viên','jangkeyte'),
          'search_item' => _x('Tìm ứng viên','jangkeyte'),
          'not_found' => _x('Hiện tại chưa có ứng viên nào','jangkeyte'),
          'not_found_in_trash' => _x('Không có ứng viên nào trong thùng rác','jangkeyte'),
          'menu_name' => _x('Ứng viên','jangkeyte')
      );

      /* Biến $args khai báo các tham số trong custom taxonomy cần tạo */
      $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-admin-users',
        'rewrite' => array('slug' => 'ung-vien', 'with_front' => false),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_position' => 7,
      );

      /* slug-post-type rất quan trọng, có thể đặt tùy ý nhưng không có dấu cách, ký tự,... */
      register_post_type( 'candidate', $args);

      /* Hàm register_taxonomy để khởi tạo taxonomy */
      //register_taxonomy( 'candidate_cat', 'candidate', array( 'hierarchical' => true, 'label' => _x('Danh mục ứng viên','jangkeyte'), 'rewrite' => array( 'slug' => __('candidates') ) ) );

      /* Hàm register_taxonomy để khởi tạo taxonomy */
      //register_taxonomy( 'skill', 'candidate', array( 'hierarchical' => true, 'label' => _x('Kỹ năng','jangkeyte'), 'rewrite' => array( 'slug' => __('skills') ) ) );

      flush_rewrite_rules();
  }
}
add_action( 'init', 'jangkeyte_candidate' );

/**
 * Đăng ký gói dịch vụ
 */
if ( ! function_exists( 'jangkeyte_package' ) ) {
  function jangkeyte_package() { 

    /* Biến $label chứa các tham số thiết lập tên hiển thị của Taxonomy */
      $labels = array(
          'name' => _x('Gói dịch vụ','jangkeyte'),
          'singular_name' => _x('Gói dịch vụ','jangkeyte'),
          'add_new' => _x('Thêm mới','jangkeyte'),
          'add_new_item' => _x('Thêm gói dịch vụ mới','jangkeyte'),
          'edit_item' => _x('Sửa gói dịch vụ','jangkeyte'),
          'new_item' => _x('Thêm gói dịch vụ mới','jangkeyte'),
          'all_items' => _x('Tất cả gói dịch vụ','jangkeyte'),
          'view_item' => _x('Xem gói dịch vụ','jangkeyte'),
          'search_item' => _x('Tìm gói dịch vụ','jangkeyte'),
          'not_found' => _x('Hiện tại chưa có gói dịch vụ nào','jangkeyte'),
          'not_found_in_trash' => _x('Không có gói dịch vụ nào trong thùng rác','jangkeyte'),
          'menu_name' => _x('Gói dịch vụ','jangkeyte')
      );

      /* Biến $args khai báo các tham số trong custom taxonomy cần tạo */
      $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-grid-view',
        'rewrite' => array('slug' => 'goi-dich-vu', 'with_front' => false),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_position' => 8,
      );

      /* slug-post-type rất quan trọng, có thể đặt tùy ý nhưng không có dấu cách, ký tự,... */
      register_post_type( 'package', $args);

      /* Hàm register_taxonomy để khởi tạo taxonomy */
      //register_taxonomy( 'candidate_cat', 'candidate', array( 'hierarchical' => true, 'label' => _x('Danh mục ứng viên','jangkeyte'), 'rewrite' => array( 'slug' => __('candidates') ) ) );

      /* Hàm register_taxonomy để khởi tạo taxonomy */
      //register_taxonomy( 'skill', 'candidate', array( 'hierarchical' => true, 'label' => _x('Kỹ năng','jangkeyte'), 'rewrite' => array( 'slug' => __('skills') ) ) );

      flush_rewrite_rules();
  }
}
add_action( 'init', 'jangkeyte_package' );

/**
 * Đăng ký câu hỏi thường gặp
 */
if ( ! function_exists( 'jangkeyte_faq' ) ) {
  function jangkeyte_faq() { 

    /* Biến $label chứa các tham số thiết lập tên hiển thị của Taxonomy */
      $labels = array(
          'name' => _x('Câu hỏi thường gặp','jangkeyte'),
          'singular_name' => _x('Câu hỏi thường gặp','jangkeyte'),
          'add_new' => _x('Thêm mới','jangkeyte'),
          'add_new_item' => _x('Thêm câu hỏi mới','jangkeyte'),
          'edit_item' => _x('Sửa câu hỏi','jangkeyte'),
          'new_item' => _x('Thêm câu hỏi mới','jangkeyte'),
          'all_items' => _x('Tất cả câu hỏi','jangkeyte'),
          'view_item' => _x('Xem câu hỏi','jangkeyte'),
          'search_item' => _x('Tìm câu hỏi','jangkeyte'),
          'not_found' => _x('Hiện tại chưa có câu hỏi nào','jangkeyte'),
          'not_found_in_trash' => _x('Không có câu hỏi nào trong thùng rác','jangkeyte'),
          'menu_name' => _x('Câu hỏi thường gặp','jangkeyte')
      );

      /* Biến $args khai báo các tham số trong custom taxonomy cần tạo */
      $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-info',
        'rewrite' => array('slug' => 'cau-hoi-thuong-gap', 'with_front' => false),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_position' => 9,
      );

      /* slug-post-type rất quan trọng, có thể đặt tùy ý nhưng không có dấu cách, ký tự,... */
      register_post_type( 'faq', $args);

      /* Hàm register_taxonomy để khởi tạo taxonomy */
      register_taxonomy( 'faq_cat', 'faq', array( 'hierarchical' => true, 'label' => _x('Danh mục câu hỏi','jangkeyte'), 'rewrite' => array( 'slug' => __('faqs') ) ) );

      flush_rewrite_rules();
  }
}
add_action( 'init', 'jangkeyte_faq' );

/**
 * Thêm vai trò người dùng
 */
add_role( 'employer', 'Nhà tuyển dụng', get_role( 'contributor' )->capabilities );
add_role( 'candidate', 'Ứng viên', get_role( 'subscriber' )->capabilities );


/**
 * Thay đổi footer admin
 */
if ( ! function_exists( 'remove_footer_admin' ) ) {
  function remove_footer_admin () {
      echo 'Thiết kế và phát triển bởi </span>Kha Thiết Giang</span> wwww.jangkeyte.com';
  }
}
add_filter('admin_footer_text', 'remove_footer_admin');

/**
 * Thêm mục tóm tắt .
 *
 * @see get_object_taxonomies()
 */
add_post_type_support( 'page', 'excerpt' );

/**
 * Thêm nút soạn thảo văn bản ẩn
 */
function ilc_mce_buttons($buttons){
  array_push($buttons,
     "backcolor",
     "anchor",
     "hr",
     "sub",
     "sup",
     "fontselect",
     "fontsizeselect",
     "styleselect",
     "cleanup"
);
  return $buttons;
}
add_filter("mce_buttons", "ilc_mce_buttons");

/**
 * Thêm định dạng file của cho phép tải lên
 */
function add_mime_types($mime_types){
     $mime_types['webp'] = 'image/webp'; //Thêm định dạng file hình ảnh webp
    return $mime_types;
}
add_filter('upload_mimes', 'add_mime_types', 1, 1);

/**
 * Đưa trình soạn thảo về phiên bản classic
 */
add_filter('use_block_editor_for_post', '__return_false');

/**
 * Ẩn đi các menu admin đối với user thường
 */
function jangkeyte_admin_menus() {
   if(get_current_user_id() != 1){    
     remove_menu_page( 'edit-comments.php' ); // Menu Phản hồi
     remove_menu_page( 'plugins.php' ); // Menu Plugins
     remove_menu_page( 'themes.php' ); // Menu Giao diện
     remove_menu_page( 'upload.php' ); // Menu Thư viện
     remove_menu_page( 'users.php' ); // Menu Thành viên
     remove_menu_page( 'tools.php' ); // Menu Công cụ
     remove_menu_page( 'options-general.php' ); // Menu Cài đặt
     remove_menu_page( 'edit.php?post_type=acf-field-group' ); // Menu ACF
     remove_menu_page( 'wpcf7' ); // Menu Contact Form 7
     remove_menu_page( 'itsec' ); // Menu iTheme Security
     remove_menu_page( 'wpseo_redirects' ); // Menu Chuyển hướng
     remove_menu_page( 'profile.php' ); // Menu Hồ sơ
   }
}
add_action( 'admin_menu', 'jangkeyte_admin_menus' );
