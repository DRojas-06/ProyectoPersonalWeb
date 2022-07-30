<?php
use Elementor\Widget_Base;

if (!defined('ABSPATH')) exit;


class ProjectInformationWidget extends Widget_Base{

  public function get_name(){
    return 'Project Information';
  }

  public function get_title(){
    return 'Project Information';
  }

  public function get_icon(){
    return 'fa fa-camera';
  }

  public function get_categories(){
    return ['general'];
  }
  protected function _register_controls(){

    $this->start_controls_section(
      'section_content',
      [
        'label' => 'Settings',
      ]
    );

    $this->add_control(
      'label_heading',
      [
        'label' => 'Label Heading',
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'My Example Heading'
      ]
    );
		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'ProjectoWebPlugins' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
				'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
    $this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'image',
				'default' => 'large',
				'separator' => 'none',
			]
		);
    $this->add_control(
      'content',
      [
        'label' => 'Content',
        'type' => \Elementor\Controls_Manager::WYSIWYG,
        'default' => 'My Content'
      ]
    );
    $this->end_controls_section();
  }

  protected function render(){
		$settings = $this->get_settings_for_display();

		// Get image url
    ?>
    <div class="grid">
      <div class="grid-item">
        <div class="card" style="display: block; background-color: #e8ebe9; border-radius: 0.4rem;">
          <div class="card-header" style="font-size: 1.5rem; font-weight: 500; color: #3d3d3d; margin-bottom: 1.5rem; text-align: center">
            <?php echo $this->get_render_attribute_string('label_heading'); ?>
            <?php echo $settings['label_heading'] ?>
          </div>
          <div class="card-img" syle="display: flex; justify-content: center;">
            <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>
          </div>
          <div class="card-text" style = "color: #3d3d3d; margin-bottom: 2.5rem;margin-left: 1.5rem; margin-right: 1.5rem line-height: 1.7; ">
            <?php echo $this->get_render_attribute_string('content'); ?>
            <?php echo $settings['content'] ?>
          </div>
        </div>
      </div>
    </div>
    <?php
  }
  protected function _content_template(){
    ?>
		<img src="{{{ settings.image.url }}}">
		<?php
  }

}