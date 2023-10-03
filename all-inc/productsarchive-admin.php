<?php
// Enqueue Scripts & Stylesheet
function productsarchive_admin_enqueue()
{
  wp_enqueue_style('nouislider', 'https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.css');
  wp_enqueue_script('nouislider', 'https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.js', array('jquery'), '15.5.0', true);
    //  For install demo
  wp_enqueue_style('install-demo-style', plugins_url('/admin-assets/css/install-demo.css',__FILE__), null, '1.0', 'all');
  wp_enqueue_script('install-demo-script', plugins_url('/admin-assets/js/install-demo.js',__FILE__), array('jquery'), '1.0', true);
}
add_action('admin_enqueue_scripts', 'productsarchive_admin_enqueue');

// Register a custom option to store the last-installed section value
function productsarchive_register_options()
{
    add_option('last_installed_section', '');
}
add_action('admin_init', 'productsarchive_register_options');

// Settings page
function productsarchive_menu_settings()
{
  // I can add a condition for all main menu assets with the productsarchive_single_sk value
  add_menu_page('Products Archive Settings', 'Products Archive', 'manage_options', 'productsarchive_single_sk', 'productsarchive_settings_cb', 'dashicons-visibility', 57);
  add_action('admin_init', 'productsarchive_settings');
}
add_action('admin_menu', 'productsarchive_menu_settings');

function productsarchive_settings_cb()
{
  // The save button for bottom save
  settings_errors();
  ?>
  <div class="productsarchive-main-settings">
    <form method="POST" action="options.php" class="productsarchive-form">
      <?php settings_fields('productsarchive-group'); ?>
      <?php do_settings_sections('productsarchive_quickview'); ?>
      <?php
      echo '</div><div class="productsarchive-save-btn">';
      submit_button();
      echo '</div>';
      ?>
    </form>
  </div>
  <?php
}

// All custom settings and register all custom controls
function productsarchive_settings()
{
  register_setting(
    'productsarchive-group',
    'productsarchive-nouislider'
  );
  // Settings start
  add_settings_section(
    'productsarchive-settings-sk',
    '',
    'productsarchive_settings_sk',
    'productsarchive_quickview'
  );
}

function productsarchive_settings_sk(){
    $sections = array(
        'demo1' => 'Demo 1',
        'demo2' => 'Demo 2',
        'demo3' => 'Demo 3',
        'demo4' => 'Demo 4',
        'demo5' => 'Demo 5',
        'demo6' => 'Demo 6',
        'demo7' => 'Demo 7'
    );
    ?>
    <div class="grid-container">
    <?php foreach ($sections as $section_id => $section_title): ?>
        <section id="<?php echo esc_attr($section_id); ?>">
            <h2><?php echo esc_html($section_title); ?></h2>
            <button class="install-button" data-installed="false" onclick="simulateLoading(this)">
                <span class="loading-icon"></span>
                <span class="install-text">Install</span>
                <span class="uninstall-text">Uninstall</span>
            </button>
        </section>
        <?php endforeach; ?>
    </div>

    <?php 
    echo '<div id="installed-sections">';
    echo '<h3>Update Installed Sections:</h3>';
    $lastInstalledSection = get_option('last_installed_section', '');
    echo '<p id="last-installed-section">' . esc_html($lastInstalledSection) . '</p>';
    echo '</div>';

    ?>
    <script>var LastInSave = "<?php echo get_option('last_installed_section', ''); ?>";</script>
    <?php
}
// Save the last-installed-section value via AJAX
add_action('wp_ajax_update_last_installed_section', 'update_last_installed_section');
function update_last_installed_section() {
    $last_installed_section = sanitize_text_field($_POST['last_installed_section']);
    update_option('last_installed_section', $last_installed_section);
    wp_die();
}
// can you save section's button with that last-installed-section save value
